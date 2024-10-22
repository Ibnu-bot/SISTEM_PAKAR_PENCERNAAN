<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahUser = User::count();
        $jumlahGejala = Gejala::count();
        $jumlahPenyakit = Penyakit::count();

        return view('admin.dashboard.index', [
            'jumlahUser' => $jumlahUser,
            'jumlahGejala' => $jumlahGejala,
            'jumlahPenyakit' => $jumlahPenyakit,
        ]);
    }
}
