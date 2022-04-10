<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Symbol;
use App\Models\SpinLog;
use App\Models\Game;
use App\Models\Prize;

class SlotMachine extends Component
{
    public $board = [];
    public $board_string = '';
    public $total_points = 0;
    public $matched_paylines = [];
    public $spin_limit;    
    /**
     * Generate New Board
     */
    public function generateNewBoard(){
        $symbols = Symbol::select('name', 'image', 'points_3_match', 'points_4_match', 'points_5_match')->get()->toArray();
        $this->board = [];
        $this->board_string = '';

        for($n = 0; $n < 15; $n++){
            $key = mt_rand(0, count($symbols)-1);
            $this->board[] = $symbols[$key];
            if($n == 14)
                $this->board_string .= $symbols[$key]['name'];
            else
                $this->board_string .= $symbols[$key]['name'].'-';
        }
    }

    // generates the matching numbers to the board
    public function generateMatchedNumberToBoard(){
        for($i = 1; $i <= 15; $i++){
            $entries[] = $i;
        }
        return $entries;
    }

    public function spinSlotMachine(){
        if($this->spin_limit > 0){
            $this->spin_limit--;
            $this->generateNewBoard();
            // generate array with all matching numbers to the board
            $entries        = $this->generateMatchedNumberToBoard();
            $multi_board    = array_combine($entries, $this->board);
            $matched_paylines = [];
            $paylines = [
                '1-2-3-4-5',
                '6-7-8-9-10',
                '11-12-13-14-15',
                '1-7-13-9-5',
                '11-7-3-9-15',
                '6-2-3-4-10',
                '6-12-13-14-10',
                '1-2-8-14-15',
                '11-12-8-4-5'
            ];    
            $match_count = 0;
            foreach($paylines as $payline){
                // when two or more symbols are the same next to each other the system gathers them in $connected
                // it also counts how many fields the array connected contains
                // so when looping through the paylines, it resets $connected and $streak when looking through a new payline

                // variables which are used later to determine whether a payline is winning or not
                $previous   = collect(['name'=>'', 'image'=> '', 'points_3_match'=> 0, 'points_4_match'=> 0, 'points_5_match'=> 0]);
                $current    = null;
                $connected  = [];
        
                // score for 3, 4, 5, matches 
                $points_per_match   = 0;
                $matched_symbol     = '';
                $streak = 0;
                $matches = 0;
    
                // takes the payline as a string, splits it at every whitespace and then trims the whitespaces away
                $characters = array_map('trim', explode('-', $payline));
                // loops through all the matching numbers in the recently split payline
                foreach($characters as $number){
                    // using the number as every symbol has been indexed to the number
                    // takes the current symbol
                    $current = $multi_board[$number];
                    // checks if the current symbol is the same as the previous, and if so starts a streak
                    // if not, it resets the streak
                    if($current['name'] == $previous['name']){
                        $connected[]    = $current;
                        $streak         = count($connected) + 1;
                    } else {
                        $connected  = [];
                        $streak     = 0;
                    }
                    // if the streak is 3 symbols in a row
                    if($streak == 3){
                        $points_per_match   = $current['points_3_match'];
                        $matched_symbol     = $current['name'];
                        $matches = 3;
                    }
                    // if the streak is 4 symbols in a row
                    if($streak == 4){
                        $points_per_match   = $current['points_4_match'];
                        $matched_symbol     = $current['name'];
                        $matches = 4;
                    }
                    // if the streak is 4 symbols in a row
                    if($streak == 5){
                        $points_per_match   = $current['points_5_match'];
                        $matched_symbol     = $current['name'];
                        $matches = 5;
                    }
                    // remembers the previous symbol
                    $previous = $multi_board[$number];
                }
    
                // the total score sum
                $this->total_points += $points_per_match;
                
                // which payline that won, and how many symbols in a row it was
                if($points_per_match != 0){
                    $match_count++;
                    // add class to symbol to identify wining line on board
                    foreach ($characters as $number) {
                        switch ($match_count) {
                            case 1:
                                $this->board[intval($number)-1]['class'] = 'border-4 border-rose-600';
                                break;
                            case 2:
                                $this->board[intval($number)-1]['class'] = 'border-4 border-green-600';
                                break;
                            case 3:
                                $this->board[intval($number)-1]['class'] = 'border-4 border-yellow-600';
                                break;
                            case 4:
                                $this->board[intval($number)-1]['class'] = 'border-4 border-orange-600';
                                break;
                            default:
                                break;
                        }
                    }
                    $this->matched_paylines[] = [ 'payline' => $payline, 'symbol' => $matched_symbol, 'points' => $points_per_match ];
                }
                SpinLog::create([
                    'game_id'   => 1,
                    'board'     => $this->board_string,
                    'match'     => $matches,
                    'payline'   => $payline,
                    'points'    => $points_per_match,
                ]);
                
                // resets the $points_per_match
                $points_per_match = 0;
                $matched_symbol = '';
            }
        }else{
            $this->emit('outOfSpins');
            $symbols = '';
            foreach ($this->matched_paylines as $key => $item) {
                if($key == count($this->matched_paylines) - 1 )
                    $symbols .= $item['symbol'];
                else
                    $symbols .= $item['symbol'].', ';
            }
            $game =[
                'symbols'   => $symbols, 
                'points'    => $this->total_points,
            ];
            $prize = Prize::where('campaign_id', session()->get('activeCampaign'))
                            ->where('weight', '<=', $this->total_points)
                            ->orderBy('weight', 'DESC')
                            ->first();
            if( $prize ){
                $game['prize_id'] = $prize->id;
            }
            Game::where( 'id', session()->get('gameId'))->update($game);
            session()->remove('gameId');
        }
    }    

    public function render()
    {
        return view('livewire.frontend.slot-machine');
    }
}
