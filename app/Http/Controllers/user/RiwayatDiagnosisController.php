<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;

class RiwayatDiagnosisController extends Controller
{
    public function Riwayat()
    {
        $user_id = Auth::id();

        $pasiens = Pasien::where('user_id', $user_id)
            ->whereNotNull('penyakit_id')
            ->get();

        return view('riwayatdiagnosis', compact('pasiens'));
    }
}
