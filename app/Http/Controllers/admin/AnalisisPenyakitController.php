<?php

namespace App\Http\Controllers\admin;

use App\Models\RandomIndex;
use App\Models\Penyakit;
use App\Models\AnalisisPenyakit;
use App\Models\PrioritasPenyakit;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AnalisisPenyakitController extends Controller
{
    public function index()
    {
        $penyakit = \App\Models\Penyakit::all();
        return view('admin.analisispenyakit.index', compact('penyakit'));
    }

    public function store(Request $request)
    {
        $penyakit = Penyakit::all();
        if ($penyakit->isEmpty()) {
            return redirect()->back()->with('error', 'Data penyakit tidak mencukupi untuk perbandingan.');
        }

        $n = $penyakit->count();
        $matrik = array();
        $urut = 0;

        for ($x = 0; $x <= ($n - 2); $x++) {
            for ($y = ($x + 1); $y <= ($n - 1); $y++) {
                $urut++;
                $pilih = "pilih" . $urut;
                $bobot = "bobot" . $urut;
                if ($request[$pilih] == 1) {
                    $matrik[$x][$y] = $request[$bobot];
                    $matrik[$y][$x] = 1 / $request[$bobot];
                } else {
                    $matrik[$x][$y] = 1 / $request[$bobot];
                    $matrik[$y][$x] = $request[$bobot];
                }

                AnalisisPenyakit::updateOrCreate(
                    ['penyakit1' => $penyakit[$x]->id, 'penyakit2' => $penyakit[$y]->id],
                    ['nilai' => $matrik[$x][$y]]
                );
            }
        }


        for ($i = 0; $i <= ($n - 1); $i++) {
            $matrik[$i][$i] = 1;
        }

        $jmlmpb = array_fill(0, $n, 0);
        $jmlmnk = array_fill(0, $n, 0);

        for ($x = 0; $x <= ($n - 1); $x++) {
            for ($y = 0; $y <= ($n - 1); $y++) {
                $value = $matrik[$x][$y];
                $jmlmpb[$y] += $value;
            }
        }

        for ($x = 0; $x <= ($n - 1); $x++) {
            for ($y = 0; $y <= ($n - 1); $y++) {
                $matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
                $value = $matrikb[$x][$y];
                $jmlmnk[$x] += $value;
            }

            $np[$x] = $jmlmnk[$x] / $n;

            PrioritasPenyakit::updateOrCreate(
                ['penyakit_id' => $penyakit[$x]->id],
                ['nilai' => $np[$x]]
            );
        }

        $eigenvektor = $this->getEigenVector($jmlmpb, $jmlmnk, $n);
        $consIndex = $this->getConsIndex($jmlmpb, $jmlmnk, $n);
        $consRatio = $this->getConsRatio($jmlmpb, $jmlmnk, $n);

        return view('admin.analisispenyakit.resultanalisispenyakit', compact('matrik', 'jmlmpb', 'matrikb', 'jmlmnk', 'np', 'eigenvektor', 'consIndex', 'consRatio', 'n', 'penyakit'));
    }


    private function getEigenVector($matrik_a, $matrik_b, $n)
    {
        $eigenvektor = 0;
        for ($i = 0; $i <= ($n - 1); $i++) {
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
        $nilaiIR = $ir ? $ir->nilai : 0;
        $consratio = $consindex / $nilaiIR;

        return $consratio;
    }
}
