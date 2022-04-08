<?php

namespace App\Http\Controllers\Backstage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backstage\Campaigns\UpdateRequest;
use App\Models\Campaign;
use App\Models\Game;
use App\Models\Symbol;
use Carbon\Carbon;
use Auth;

class CampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backstage.campaigns.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backstage.campaigns.create', [
            'campaign' => new Campaign(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // Validation
        $data = $this->validate(request(), [
            'name' => 'required|unique:campaigns|max:255',
            'timezone' => 'required',
            'starts_at' => 'required|date_format:d-m-Y H:i:s',
            'ends_at' => 'required|date_format:d-m-Y H:i:s',
        ]);

        //parse dates from campaign's timezone
        $startDate = Carbon::createFromFormat('d-m-Y H:i:s', $data['starts_at'], $data['timezone'])
            ->setTimezone('UTC');
        $data['starts_at'] = $startDate;

        $startDate = Carbon::createFromFormat('d-m-Y H:i:s', $data['ends_at'], $data['timezone'])
            ->setTimezone('UTC');
        $data['ends_at'] = $startDate;

        // Create the campaign
        $campaign = Campaign::create($data);

        // Set message
        session()->flash('success', 'The campaign has been created!');

        // Redirect
        return redirect()->route('backstage.campaigns.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Campaign $campaign
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Campaign $campaign)
    {
        return view('backstage.campaigns.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Campaign $campaign
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Campaign $campaign)
    {
        // Validation
        $data = $this->validate(request(), [
            'name' => 'required|max:255|unique:campaigns,name,'.$campaign->id,
            'timezone' => 'required',
            'starts_at' => 'required|date_format:d-m-Y H:i:s',
            'ends_at' => 'required|date_format:d-m-Y H:i:s',
        ]);

        //parse dates from campaign's timezone
        $startDate = Carbon::createFromFormat('d-m-Y H:i:s', $data['starts_at'], $data['timezone'])->setTimezone('UTC');
        $data['starts_at'] = $startDate;

        $startDate = Carbon::createFromFormat('d-m-Y H:i:s', $data['ends_at'], $data['timezone'])->setTimezone('UTC');
        $data['ends_at'] = $startDate;

        // Update the campaigns data
        $campaign->update($data);

        // Redirect
        session()->flash('success', 'The campaign details have been saved!');

        return redirect()->route('backstage.campaigns.edit', $campaign->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Campaign $campaign
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Campaign $campaign)
    {
        $campaign->forceDelete();

        if (request()->ajax()) {
            return response()->json(['status' => 'success']);
        }

        session()->flash('success', 'The campaign has been removed!');

        return redirect(route('backstage.campaigns.index'));
    }

    public function use(Campaign $campaign)
    {
        $now = Carbon::now();
        if(Carbon::parse($campaign->starts_at)->gt($now)){
            session()->flash('error', 'The campaign did not started yet');
        }else if ( Carbon::parse($campaign->ends_at)->lt($now) ){
            session()->flash('error', 'The campaign already ended');
        }else if( Symbol::count() > 10 ){
            session()->flash('error', 'A maximum of 10 symbols should be existed. but it has '.Symbol::count());
        }else if( Symbol::count() < 6 ){
            session()->flash('error', 'A minimum of 6 symbols should be existed. but it has '.Symbol::count());
        }else if ( Game::where('account', auth()->user()->username)->whereBetween('created_at', [Carbon::now()->startOfDay()->toDateTimeString(), Carbon::now()->endOfDay()->toDateTimeString()])->count() > 0 ){
            session()->flash('error', 'you can only create 1 game per day');
        }else{
            session()->put('activeCampaign', $campaign->id);
            $game = new Game();
            $game->campaign_id = $campaign->id;
            $game->account = auth()->user()->username;
            $game->save();
            session()->put('gameId', $game->id);
        }
        return redirect()->route('backstage.campaigns.index');
    }
}
