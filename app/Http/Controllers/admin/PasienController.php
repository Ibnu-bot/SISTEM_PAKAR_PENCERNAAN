<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Diagnosis;
use App\Models\Pasien;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class PasienController extends Controller
{
    public function index()
    {

        $pasiens = Pasien::with('penyakit')
            ->whereNotNull('penyakit_id')
            ->orderBy('created_at', 'asc')
            ->get();

        $data = [
            'pasien' => $pasiens,
        ];

        return view('admin.pasien.index', $data);
    }

    public function destroy($id)
    {
        Diagnosis::where('pasien_id', $id)->delete();

        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        Alert::success('Suskses', 'Data Riwayat berhasil dihapus');
        return redirect()->back()->with('success', 'Data pasien berhasil dihapus.');
    }

    public function cetakpdf($id)
    {
        $pasien = Pasien::with('penyakit')->find($id);
        $hasil_diagnosis = session()->get('hasil_diagnosis', []);

        $diagnosas = Diagnosis::with('gejala')->wherePasienId($id)->get();
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
