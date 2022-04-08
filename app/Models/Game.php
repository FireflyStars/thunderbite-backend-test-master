<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['campaign_id', 'prize_id', 'account', 'revealed_at'];

    protected $dates = [
        'revealed_at',
    ];

    public static function filter($filter1, $filter2, $filter3, $filter4)
    {
        $query = self::query();
        $campaign = Campaign::find(session('activeCampaign'));

        self::filterDates($query, $campaign);

        if ($filter1 != '') {
            $query->where('account', 'like', '%'.$filter1.'%');
        }

        if ($filter2 != '') {
            $query->where('prize_id', $filter2);
        }

        if ($filter3 != '') {
            $query->whereRaw('HOUR(revealed_at) >= '.$filter3);
        }

        if ($filter4 != '') {
            $query->whereRaw('HOUR(revealed_at) <= '.$filter4);
        }

        $query->leftJoin('prizes', 'prizes.id', '=', 'games.prize_id')
            ->join('campaigns', 'campaigns.id', '=', 'games.campaign_id')
            ->select('campaigns.name as campaign','games.id', 'account', 'prize_id', 'points', 'symbols','revealed_at', 'prizes.name as prize_title')
            ->where('games.campaign_id', $campaign->id);

        return $query;
    }

    private static function filterDates($query, $campaign): void
    {
        if (($data = request('date_start')) || ($data = Carbon::now()->subDays(6))) {
            $data = Carbon::parse($data)->setTimezone($campaign->timezone)->toDateTimeString();
            $query->where('games.revealed_at', '>=', $data);
        }
        if (($data = request('date_end')) || ($data = Carbon::now())) {
            $data = Carbon::parse($data)->setTimezone($campaign->timezone)->toDateTimeString();
            $query->where('games.revealed_at', '<=', $data);
        }
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function prize()
    {
        return $this->belongsTo(Prize::class);
    }
}
