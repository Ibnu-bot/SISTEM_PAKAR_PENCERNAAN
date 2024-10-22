<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gejalas')->insert([
            [
                'kode_gejala' => 'G01',
                'nama_gejala' => 'Merasa Mual',
            ],
            [
                'kode_gejala' => 'G02',
                'nama_gejala' => 'Mengalami Muntah',
            ],
            [
                'kode_gejala' => 'G03',
                'nama_gejala' => 'Sakit Tenggorokan',
            ],
            [
                'kode_gejala' => 'G04',
                'nama_gejala' => 'Merasa Susah Tidur',
            ],
            [
                'kode_gejala' => 'G05',
                'nama_gejala' => 'Bau Mulut',
            ],
            [
                'kode_gejala' => 'G06',
                'nama_gejala' => 'Nyeri Pada Ulu Hati Seperti Terbakar',
            ],
            [
                'kode_gejala' => 'G07',
                'nama_gejala' => 'Perut Kembung',
            ],
            [
                'kode_gejala' => 'G08',
                'nama_gejala' => 'Sering Bersendawa',
            ],
            [
                'kode_gejala' => 'G09',
                'nama_gejala' => 'Tidak Nafsu Makan',
            ],
            [
                'kode_gejala' => 'G10',
                'nama_gejala' => 'Nyeri Perut Daerah Ulu Hati',
            ],
            [
                'kode_gejala' => 'G11',
                'nama_gejala' => 'Timbul Rasa Asam Dimulut',
            ],
            [
                'kode_gejala' => 'G12',
                'nama_gejala' => 'Kram Dan Nyeri Perut',
            ],
            [
                'kode_gejala' => 'G13',
                'nama_gejala' => 'Badan Terasa Lemas',
            ],
            [
                'kode_gejala' => 'G14',
                'nama_gejala' => 'Kulit Dan Mata Tampak Menguning',
            ],
            [
                'kode_gejala' => 'G15',
                'nama_gejala' => 'Perut Terasa Nyeri Dan Bengkak',
            ],
            [
                'kode_gejala' => 'G16',
                'nama_gejala' => 'Feses Berwarna Pucat / Berdarah',
            ],
            [
                'kode_gejala' => 'G17',
                'nama_gejala' => 'Mudah Merasa Lelah',
            ],
            [
                'kode_gejala' => 'G18',
                'nama_gejala' => 'Tubuh Gampang Memar',
            ],
            [
                'kode_gejala' => 'G19',
                'nama_gejala' => 'Diare Disertai Darah Atau Lendir > 3x Sehari',
            ],
            [
                'kode_gejala' => 'G20',
                'nama_gejala' => 'Mengalami Demam',
            ],
            [
                'kode_gejala' => 'G21',
                'nama_gejala' => 'Perut Terasa Mules',
            ],
            [
                'kode_gejala' => 'G22',
                'nama_gejala' => 'Pendarahan Setelah Buang Air Besar',
            ],
            [
                'kode_gejala' => 'G23',
                'nama_gejala' => 'Terdapat Lendir Setelah Buang Air Besar',
            ],
            [
                'kode_gejala' => 'G24',
                'nama_gejala' => 'Benjolan Tergantung Di Anus',
            ],
            [
                'kode_gejala' => 'G25',
                'nama_gejala' => 'Rasa Nyeri Dan Pembengkakan Disekitar Anus',
            ],
        ]);
    }
}





