<?php

namespace App\Http\Middleware;

use App\Models\Campaign;
use Closure;

class SetActiveCampaign
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $activeCampaign = null;

        if (session('activeCampaign')) {
            $activeCampaign = Campaign::find(session('activeCampaign'));

            if ($activeCampaign === null) {
                session()->forget('activeCampaign');
            }
        }

        view()->share('activeCampaign', $activeCampaign);

        return $next($request);
    }
}
