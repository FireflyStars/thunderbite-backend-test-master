<?php

namespace Database\Seeders;

use App\Models\Symbol;
use Illuminate\Database\Seeder;

class SymbolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Symbol::truncate();
        Symbol::insert([
            [
                'name' => 'A',
                'points_3_match' => 5,
                'points_4_match' => 10,
                'points_5_match' => 15,
            ],
            [
                'name' => 'B',
                'points_3_match' => 10,
                'points_4_match' => 15,
                'points_5_match' => 20,
            ],
            [
                'name' => 'C',
                'points_3_match' => 15,
                'points_4_match' => 20,
                'points_5_match' => 25,
            ],
            [
                'name' => 'D',
                'points_3_match' => 20,
                'points_4_match' => 25,
                'points_5_match' => 30,
            ],
            [
                'name' => 'E',
                'points_3_match' => 25,
                'points_4_match' => 30,
                'points_5_match' => 35,
            ],
            [
                'name' => 'F',
                'points_3_match' => 30,
                'points_4_match' => 35,
                'points_5_match' => 40,
            ],
            [
                'name' => 'G',
                'points_3_match' => 35,
                'points_4_match' => 40,
                'points_5_match' => 45,
            ],
            [
                'name' => 'H',
                'points_3_match' => 40,
                'points_4_match' => 45,
                'points_5_match' => 50,
            ],
            [
                'name' => 'I',
                'points_3_match' => 45,
                'points_4_match' => 50,
                'points_5_match' => 55,
            ],
            [
                'name' => 'J',
                'points_3_match' => 50,
                'points_4_match' => 55,
                'points_5_match' => 60,
            ],
        ]);
    }
}
