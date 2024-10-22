<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Diagnosis;
use App\Models\Gejala;
use App\Models\Pasien;
use App\Models\Penyakit;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DiagnosisController extends Controller
{
    public function index()
    {
        return view('admin.diagnosis.index');
    }

    public function createPasien(Request $request)
    {
        $validate = [
            'nama_pasien' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'usia' => 'required|integer|min:0',
            'alamat' => 'required|string|max:255',
        ];

        $val = Validator::make($request->all(), $validate);
        if ($val->fails()) {
            Alert::error('Error', 'Form Tidak Boleh Ada Yang Kosong!');
            return redirect()->back()->withErrors($val)->withInput();
        }
        $user_id = Auth::id();
        $data = [
            'nama_pasien' => $request->nama_pasien,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => $request->usia,
            'alamat' => $request->alamat,
            'user_id' => $user_id,
        ];
        $pasien = Pasien::create($data);
        session()->put('pasien_id', $pasien->id);
        return redirect()->route('form.gejala');
    }

    public function pilihGejala()
    {
        $pasien_id = session()->get('pasien_id');
        $data = [
            'title' => 'Diagnosis Penyakit',
            'gejalas' => Gejala::all(),
            'pasien' => Pasien::find($pasien_id),
        ];
        return view('admin.diagnosis.pilihgejala', $data);
    }
    public function prosesDiagnosis()
    {
        $pasien_id = request('pasien_id');
        $gejalas = request('gejalas');
        $allZero = true;
        foreach ($gejalas as $gejala_id => $cf_user) {
            if ($cf_user > 0) {
                $allZero = false;
            }
            $rule = Rule::where('id_gejala', $gejala_id)->get();
            foreach ($rule as $r) {
                $data = [
                    'pasien_id' => $pasien_id,
                    'penyakit_id' => $r->id_penyakit,
                    'gejala_id' => $gejala_id,
                    'nilai_cf' => $cf_user,
                    'cf_hasil' => $cf_user * $r->cf_pakar,
                ];
                Diagnosis::create($data);
            }
        }
        if ($allZero) {
            session()->put('invalid_diagnosis', true);
        } else {
            session()->forget('invalid_diagnosis');
        }
        $rule = Rule::get();
        foreach ($rule as $r) {
            $diagnosis = Diagnosis::where('pasien_id', $pasien_id)
                ->where('penyakit_id', $r->id_penyakit)
                ->where('gejala_id', $r->id_gejala)
                ->first();
            if ($diagnosis == null) {
                $data = [
                    'pasien_id' => $pasien_id,
                    'penyakit_id' => $r->id_penyakit,
                    'gejala_id' => $r->id_gejala,
                    'nilai_cf' => 0,
                    'cf_hasil' => 0,
                ];
                Diagnosis::create($data);
            }
        }
        $hasil = [];
        $penyakit = Penyakit::get();
        foreach ($penyakit as $p) {
            $diagnosis = Diagnosis::where('penyakit_id', $p->id)
                ->where('pasien_id', $pasien_id)
                ->get();
            $diagnosis_hasil = $this->hitung_cf($diagnosis);
            $hasil[] = [
                'penyakit_id' => $p->id,
                'nama_penyakit' => $p->nama_penyakit,
                'deskripsi' => $p->deskripsi,
                'penanganan' => $p->penanganan,
                'persentasi' => number_format($diagnosis_hasil * 100, 1),
            ];
        }
        usort($hasil, function ($a, $b) {
            return $b['persentasi'] <=> $a['persentasi'];
        });
        $top3 = array_filter($hasil, function ($item) {
            return $item['persentasi'] > 0;
        });
        $top3 = array_slice($top3, 0, 3);
        session()->put('hasil_diagnosis', $top3);
        if (count($top3) > 0) {
            $pasien = Pasien::find($pasien_id);
            $pasien->akumulasi_cf = $top3[0]['persentasi'] / 100;
            $pasien->persentasi = $top3[0]['persentasi'];
            $pasien->penyakit_id = $top3[0]['penyakit_id'];
            $pasien->save();
        }
        return redirect()->route('hasil.diagnosis');
    }

    private function hitung_cf($data)
    {
        if ($data->isEmpty()) {
            return 0;
        }

        $cf_combine = $data[0]->cf_hasil;

        for ($i = 1; $i < count($data); $i++) {
            $cf_combine = $cf_combine + ($data[$i]->cf_hasil * (1 - $cf_combine));
        }

        return $cf_combine;
    }

    public function hasilDiagnosis()
    {
        $pasien_id = session()->get('pasien_id');
        $pasien = Pasien::with('penyakit')->find($pasien_id);
        $hasil_diagnosis = session()->get('hasil_diagnosis', []);

        $diagnosis = Diagnosis::with('gejala')->where('pasien_id', $pasien_id)->get();

        $groupedDiagnosis = $diagnosis->groupBy('gejala_id')->map(function ($group) {
            return $group->first();
        });

        $data = [
            'title' => 'Hasil Diagnosis',
            'pasien' => $pasien,
            'gejala' => $groupedDiagnosis,
            'hasil_diagnosis' => $hasil_diagnosis,
        ];

        return view('admin.diagnosis.hasildiagnosis', $data);
    }

    public function cetakpdf($id)
    {
        $hasil_diagnosis = session()->get('hasil_diagnosis', []);

        $pasien = Pasien::with('penyakit')->find($id);

        $diagnosas = Diagnosis::with('gejala')->where('pasien_id', $id)->get();

        $groupedDiagnosas = $diagnosas->groupBy('gejala_id')->map(function ($group) {
            return $group->first();
        });

        $data = [
            'title' => 'Hasil Diagnosa',
            'pasien' => $pasien,
            'gejala' => $groupedDiagnosas,
            'hasil_diagnosis' => $hasil_diagnosis,
        ];

        $pdf = Pdf::loadView('admin.diagnosis.cetakpdf', $data);
        return $pdf->download('hasil_diagnosis.pdf');
    }
}
