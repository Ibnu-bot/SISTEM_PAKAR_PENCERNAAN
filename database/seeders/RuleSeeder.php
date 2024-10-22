<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rules')->insert([
            [
                'id_penyakit' => '1',
                'id_gejala' => '1',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '1',
                'id_gejala' => '2',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '1',
                'id_gejala' => '3',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '1',
                'id_gejala' => '4',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '1',
                'id_gejala' => '5',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '1',
                'id_gejala' => '6',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '2',
                'id_gejala' => '6',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '2',
                'id_gejala' => '7',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '2',
                'id_gejala' => '1',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '2',
                'id_gejala' => '2',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '2',
                'id_gejala' => '8',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '2',
                'id_gejala' => '9',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '2',
                'id_gejala' => '10',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '2',
                'id_gejala' => '11',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '3',
                'id_gejala' => '14',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '3',
                'id_gejala' => '15',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '3',
                'id_gejala' => '16',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '3',
                'id_gejala' => '1',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '3',
                'id_gejala' => '17',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '3',
                'id_gejala' => '2',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '3',
                'id_gejala' => '9',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '3',
                'id_gejala' => '18',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '4',
                'id_gejala' => '19',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '4',
                'id_gejala' => '20',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '4',
                'id_gejala' => '1',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '4',
                'id_gejala' => '2',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '4',
                'id_gejala' => '12',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '4',
                'id_gejala' => '13',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '4',
                'id_gejala' => '21',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '5',
                'id_gejala' => '22',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '5',
                'id_gejala' => '23',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '5',
                'id_gejala' => '24',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '5',
                'id_gejala' => '25',
                'cf_pakar' => '0',
            ],
            [
                'id_penyakit' => '5',
                'id_gejala' => '13',
                'cf_pakar' => '0',
            ],
        ]);
    }
}
