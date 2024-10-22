<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function Riwayat()
    {
        $user_id = Auth::id();

        $pasiens = Pasien::where('user_id', $user_id)
            ->whereNotNull('penyakit_id')
            ->get();

        return view('admin.riwayat.riwayat', compact('pasiens'));
    }
}
