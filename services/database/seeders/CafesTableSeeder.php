<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cafes;
use Carbon\Carbon;

class CafesTableSeeder extends Seeder
{
    public function run()
    {   
        $cafesTimes = [
            [ 'id' => 1, 'remark' => 'morning sessions', 'open_time' => Carbon::parse('08:00:00'),'close_time' => Carbon::parse('12:00:00') ],
            [ 'id' => 2, 'remark' => 'afternoon sessions', 'open_time' => Carbon::parse('12:00:00'),'close_time' => Carbon::parse('18:00:00') ],
            [ 'id' => 3, 'remark' => 'evening sessions', 'open_time' => Carbon::parse('18:00:00'),'close_time' => Carbon::parse('22:00:00') ]
        ];

        foreach ($cafesTimes as $row) {
            Cafes::create($row);
        }
    }
}
