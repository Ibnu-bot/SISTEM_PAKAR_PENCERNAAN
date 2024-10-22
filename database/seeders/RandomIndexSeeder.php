<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RandomIndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('randomindex')->insert([
            [
                'jumlah' => '1',
                'nilai' => '0',
            ],
            [
                'jumlah' => '2',
                'nilai' => '0',
            ],
            [
                'jumlah' => '3',
                'nilai' => '0.52',
            ],
            [
                'jumlah' => '4',
                'nilai' => '0.89',
            ],
            [
                'jumlah' => '5',
                'nilai' => '1.11',
            ],
            [
                'jumlah' => '6',
                'nilai' => '1.25',
            ],
            [
                'jumlah' => '7',
                'nilai' => '1.35',
            ],
            [
                'jumlah' => '8',
                'nilai' => '1.40',
            ],
            [
                'jumlah' => '9',
                'nilai' => '1.45',
            ],
            [
                'jumlah' => '10',
                'nilai' => '1.49',
            ],
        ]);
    }
}




