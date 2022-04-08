<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Prize;
use Illuminate\Database\Seeder;

class PrizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prize::truncate();

        $campaigns = Campaign::all();

        foreach ($campaigns as $campaign) {
            Prize::insert([
                [
                    'campaign_id' => $campaign->id,
                    'name' => 'Low 1',
                    'level' => 'low',
                    'weight' => '10.00',
                    'starts_at' => now()->startOfDay(),
                    'ends_at' => now()->addDays(7)->endOfDay(),
                ],
                [
                    'campaign_id' => $campaign->id,
                    'name' => 'Low 2',
                    'level' => 'low',
                    'weight' => '20.00',
                    'starts_at' => now()->startOfDay(),
                    'ends_at' => now()->addDays(7)->endOfDay(),
                ],
                [
                    'campaign_id' => $campaign->id,
                    'name' => 'Low 3',
                    'level' => 'low',
                    'weight' => '30.00',
                    'starts_at' => now()->startOfDay(),
                    'ends_at' => now()->addDays(7)->endOfDay(),
                ],
                [
                    'campaign_id' => $campaign->id,
                    'name' => 'Med 1',
                    'level' => 'med',
                    'weight' => '40.00',
                    'starts_at' => now()->startOfDay(),
                    'ends_at' => now()->addDays(7)->endOfDay(),
                ],
                [
                    'campaign_id' => $campaign->id,
                    'name' => 'Med 2',
                    'level' => 'med',
                    'weight' => '50.00',
                    'starts_at' => now()->startOfDay(),
                    'ends_at' => now()->addDays(7)->endOfDay(),
                ],
                [
                    'campaign_id' => $campaign->id,
                    'name' => 'Med 3',
                    'level' => 'med',
                    'weight' => '60.00',
                    'starts_at' => now()->startOfDay(),
                    'ends_at' => now()->addDays(7)->endOfDay(),
                ],
                [
                    'campaign_id' => $campaign->id,
                    'name' => 'High 1',
                    'level' => 'high',
                    'weight' => '70.00',
                    'starts_at' => now()->startOfDay(),
                    'ends_at' => now()->addDays(7)->endOfDay(),
                ],
                [
                    'campaign_id' => $campaign->id,
                    'name' => 'High 2',
                    'level' => 'high',
                    'weight' => '80.00',
                    'starts_at' => now()->startOfDay(),
                    'ends_at' => now()->addDays(7)->endOfDay(),
                ],
                [
                    'campaign_id' => $campaign->id,
                    'name' => 'High 3',
                    'level' => 'high',
                    'weight' => '90.00',
                    'starts_at' => now()->startOfDay(),
                    'ends_at' => now()->addDays(7)->endOfDay(),
                ],
            ]);
        }
    }
}
