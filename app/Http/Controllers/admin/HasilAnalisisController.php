<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PrioritasGejala;
use App\Models\PrioritasPenyakit;

class HasilAnalisisController extends Controller
{
    public function index()
    {
        $prioritaspenyakit = PrioritasPenyakit::with('penyakit')->get();
        $prioritasgejala = PrioritasGejala::with('penyakit', 'gejala')->get();

        $data = [
            'prioritaspenyakit' => $prioritaspenyakit,
            'prioritasgejala' => $prioritasgejala,
        ];

        return view('admin.hasilanalisis.index', $data);
    }
}
