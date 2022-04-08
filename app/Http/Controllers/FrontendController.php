<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Symbol;
use App\Models\Game;

class FrontendController extends Controller
{

    public function loadCampaign(Campaign $campaign)
    {
        if (session()->has('gameId') && Game::find(session()->get('gameId'))->revealed_at =='') {
            Game::find(session()->get('gameId'))->update(['revealed_at'=> now()]);
            return view('frontend.index' ,['spin_limit'=> request()->spins, 'account'=> request()->a]);
        }else{
            session()->flash('error', 'You have alrady played this game');
            return view('frontend.placeholder');
        }
    }
    public function placeholder()
    {
        return view('frontend.placeholder');
    }
}
