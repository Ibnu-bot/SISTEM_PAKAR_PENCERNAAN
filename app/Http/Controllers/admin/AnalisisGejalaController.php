<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AnalisisGejala;
use App\Models\PrioritasGejala;
use App\Models\Penyakit;
use App\Models\RandomIndex;
use Illuminate\Http\Request;

class AnalisisGejalaController extends Controller
{
    public function index(Request $request)
    {
        $penyakit_id = $request->get('penyakit_id');
        $penyakit = Penyakit::find($penyakit_id);

        if ($penyakit) {
            $gejalas = $penyakit->gejalas;
            $data = [
                'gejalas' => $gejalas,
                'penyakit' => $penyakit,
                'title' => 'Perbandingan Gejala'
            ];
            return view('admin.analisisgejala.index', $data);
        } else {
            return redirect()->back()->with('error', 'Penyakit tidak ditemukan.');
        }
    }

    public function store(Request $request)
    {
        $penyakit_id = $request->input('penyakit_id');
        $gejalas = Penyakit::findOrFail($penyakit_id)->gejalas;
        $n = count($gejalas);
        $matrik = [];

        $urut = 0;
        for ($x = 0; $x < ($n - 1); $x++) {
            for ($y = ($x + 1); $y < $n; $y++) {
                $urut++;
                $pilih = "pilih" . $urut;
                $bobot = "bobot" . $urut;

                $nilai = $request->input($bobot);
                if ($nilai <= 0) {
                    return redirect()->back()->with('error', 'Nilai bobot harus lebih besar dari 0.');
                }

                if ($request->input($pilih) == 1) {
                    $matrik[$x][$y] = $nilai;
                    $matrik[$y][$x] = 1 / $nilai;
                } else {
                    $matrik[$x][$y] = 1 / $nilai;
                    $matrik[$y][$x] = $nilai;
                }

                AnalisisGejala::updateOrCreate(
                    ['gejala1_id' => $gejalas[$x]->id, 'gejala2_id' => $gejalas[$y]->id],
                    ['nilai' => $matrik[$x][$y]]
                );
            }
        }

        for ($i = 0; $i < $n; $i++) {
            $matrik[$i][$i] = 1;
        }

        $jmlmpb = array_fill(0, $n, 0);
        for ($x = 0; $x < $n; $x++) {
            for ($y = 0; $y < $n; $y++) {
                $jmlmpb[$y] += $matrik[$x][$y];
            }
        }

        $matrikb = [];
        $jmlmnk = array_fill(0, $n, 0);
        for ($x = 0; $x < $n; $x++) {
            for ($y = 0; $y < $n; $y++) {
                $matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
                $jmlmnk[$x] += $matrikb[$x][$y];
            }

            $pv[$x] = $jmlmnk[$x] / $n;

            PrioritasGejala::updateOrCreate(
                ['gejala_id' => $gejalas[$x]->id, 'penyakit_id' => $penyakit_id],
                ['nilai' => $pv[$x]]
            );

            $rule = \App\Models\Rule::where('id_penyakit', $penyakit_id)->where('id_gejala', $gejalas[$x]->id)->first();
            if ($rule) {
                $rule->update(['cf_pakar' => $pv[$x]]);
            }
        }

        $eigenvektor = $this->getEigenVector($jmlmpb, $jmlmnk, $n);
        $consIndex = $this->getConsIndex($jmlmpb, $jmlmnk, $n);
        $consRatio = $this->getConsRatio($jmlmpb, $jmlmnk, $n);

        return view('admin.analisisgejala.resultanalisisgejala', compact('matrik', 'jmlmpb', 'matrikb', 'jmlmnk', 'pv', 'eigenvektor', 'consIndex', 'consRatio', 'n', 'gejalas'));
    }

    private function getEigenVector($matrik_a, $matrik_b, $n)
    {
        $eigenvektor = 0;
        for ($i = 0; $i < $n; $i++) {
            $eigenvektor += ($matrik_a[$i] * ($matrik_b[$i] / $n));
        }
        return $eigenvektor;
    }

    private function getConsIndex($matrik_a, $matrik_b, $n)
    {
        $eigenvektor = $this->getEigenVector($matrik_a, $matrik_b, $n);
        $consindex = ($eigenvektor - $n) / ($n - 1);
        return $consindex;
    }

    private function getConsRatio($matrik_a, $matrik_b, $n)
    {
        $consindex = $this->getConsIndex($matrik_a, $matrik_b, $n);
        $ir = RandomIndex::where('jumlah', $n)->first();
        $nilaiIR = $ir ? $ir->nilai : 1;
        $consratio = $nilaiIR != 0 ? $consindex / $nilaiIR : 0;
        return $consratio;
    }
}
