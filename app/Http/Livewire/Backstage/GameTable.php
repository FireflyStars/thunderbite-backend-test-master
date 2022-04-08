<?php

namespace App\Http\Livewire\Backstage;

use App\Models\Game;
use App\Models\Prize;

class GameTable extends TableComponent
{
    public $sortField = 'revealed_at';
    public $filter1;
    public $filter2;
    public $filter3;
    public $filter4;

    protected $queryString = [
        'filter1' =>['except' => ''], 
        'filter2' =>['except' => ''],  
        'filter3' =>['except' => ''], 
        'filter4' =>['except' => '']
    ];
    protected $listeners = ['exportGamesToCSV'];

    // export games filtered
    public function exportGamesToCSV(){
        $fileName = 'games.csv';
        $games = Game::filter($this->filter1, $this->filter2, $this->filter3, $this->filter4)->get();
        $columns = array('Campaign', 'PrizeId', 'Account', 'Symbols', 'Points', 'Revealed At');
        return response()->streamDownload(function () use($columns, $games) {
            $file = fopen("php://output", 'w');
            fputcsv($file, $columns);

            foreach ($games as $game) {
                $row['Campaign']    = $game->campaign;
                $row['PrizeId']     = $game->title;
                $row['Account']     = $game->account;
                $row['Symbols']     = $game->symbols;
                $row['Points']      = $game->points;
                $row['Revealed At'] = $game->revealed_at;

                fputcsv($file, array($row['Campaign'], $row['PrizeId'], $row['Account'], $row['Symbols'], $row['Points'], $row['Revealed At']));
            }
            fclose($file);
        }, $fileName);   
    }

    public function render()
    {
        $columns = [
            [
                'title' => 'account',
                'sort' => false,
            ],

            [
                'title' => 'symbols matched',
                'attribute' => 'symbols',
                'sort' => true,
            ],

            [
                'title' => 'points',
                'attribute' => 'points',
                'sort' => true,
            ],
            
            [
                'title' => 'prize_id',
                'attribute' => 'prize_id',
                'sort' => true,
            ],

            [
                'title' => 'Prize Title',
                'attribute' => 'prize_title',
                'sort' => true,
            ],

            [
                'title' => 'revealed at',
                'attribute' => 'revealed_at',
                'sort' => true,
            ],
        ];

        return view('livewire.backstage.table', [
            'columns' => $columns,
            'prizes' => Prize::select('id', 'name')->get(),
            'resource' => 'games',
            'rows' => Game::filter($this->filter1, $this->filter2, $this->filter3, $this->filter4)
                ->where('account', auth()->user()->username)
                ->orderBy($this->sortField, $this->sortAsc ? 'DESC' : 'ASC')
                ->paginate($this->perPage),
        ]);
    }
}
