<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penyakits')->insert([
            [
                'kode_penyakit' => 'P01',
                'nama_penyakit' => 'GERD',
                'penanganan' => 'Penanganan GERD biasanya melibatkan perubahan gaya hidup dan pengobatan. hindari makanan dan minuman yang memicu gejala, seperti makanan pedas, asam, atau berlemak, serta kafein dan alkohol. Selain itu, disarankan untuk makan dalam porsi kecil, tidak berbaring segera setelah makan, dan menjaga berat badan ideal. Obat-obatan yang sering digunakan meliputi antasida, H2-receptor blockers, dan proton pump inhibitors (PPIs) yang membantu mengurangi produksi asam lambung.',
                'deskripsi' => 'GERD adalah kondisi ketika asam lambung naik ke esofagus atau kerongkongan. Kondisi yang disebut juga sebagai penyakit refluks gastroesofagus ini dapat menimbulkan nyeri pada ulu hati, heartburn, serta berbagai gejala lainnya pada area dada bagian bawah dan perut.',
            ],
            [
                'kode_penyakit' => 'P02',
                'nama_penyakit' => 'Dispepsia',
                'penanganan' => 'Dispepsia atau gangguan pencernaan ditangani dengan kombinasi perubahan pola makan, gaya hidup, dan pengobatan. Dianjurkan untuk makan dengan perlahan, menghindari makanan yang dapat mengiritasi lambung seperti makanan pedas dan berlemak, serta mengurangi konsumsi alkohol dan kafein. Mengkonsumsi obat - obatan seperti antasida, H2-receptor blockers, atau proton pump inhibitors untuk mengurangi gejala.',
                'deskripsi' => 'Kondisi berupa gangguan pencernaan kronis yang ditandai dengan perut terasa nyeri, kembung, dan begah terutama setelah mengonsumsi makanan.',
            ],
            [
                'kode_penyakit' => 'P03',
                'nama_penyakit' => 'Hepatitis',
                'penanganan' => 'Penanganan hepatitis tergantung pada jenis dan penyebabnya. Untuk hepatitis A, istirahat, hidrasi yang cukup, dan nutrisi yang baik adalah kunci, karena infeksi ini biasanya sembuh sendiri. Hepatitis B dan C mungkin memerlukan pengobatan antivirus untuk mencegah kerusakan hati lebih lanjut. Selain itu, penderita hepatitis dianjurkan untuk menghindari alkohol dan obat-obatan yang dapat merusak hati.',
                'deskripsi' => 'Hepatitis adalah peradangan pada hati atau liver.',
            ],
            [
                'kode_penyakit' => 'P04',
                'nama_penyakit' => 'Disentri',
                'penanganan' => 'Disentri diobati dengan rehidrasi yang cukup, baik melalui oral rehydration salts (ORS) atau cairan intravena pada kasus yang parah, untuk menggantikan cairan dan elektrolit yang hilang akibat diare.',
                'deskripsi' => 'Disentri adalah peradangan dan infeksi pada usus, yang mengakibatkan diare yang mengandung darah atau lendir.',
            ],
            [
                'kode_penyakit' => 'P05',
                'nama_penyakit' => 'Hemoroid',
                'penanganan' => 'Perubahan gaya hidup, hindari makanan yang pedas, tinggi garam dan gorengan. serta menggunakan obat yang diresepkan oleh dokter seperti, zinx oxide, witch hazel dan krim steroid',
                'deskripsi' => 'Wasir, yang juga disebut hemoroid atau ambeien, adalah pembesaran atau pembengkakan pembuluh darah di sekitar rektum atau anus.',
            ],
        ]);
    }
}
