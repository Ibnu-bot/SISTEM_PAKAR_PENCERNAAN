<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penyakit;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyakit = Penyakit::all();

        return view('admin.penyakit.index', compact('penyakit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penyakit.tambahpenyakit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = [
            'kode_penyakit' => 'required|string|max:255|unique:penyakits,kode_penyakit',
            'nama_penyakit' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'penanganan' => 'required|string',
        ];

        $messages = [
            'kode_penyakit.required' => 'Kode penyakit wajib diisi.',
            'kode_penyakit.unique' => 'Kode penyakit sudah ada.',
            'nama_penyakit.required' => 'Nama penyakit wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'penanganan.required' => 'Penanganan wajib diisi.',
        ];

        $val = Validator::make($request->all(), $validate, $messages);
        if ($val->fails()) {
            Alert::error('Error', 'Ada kesalahan pada input data!');
            return redirect()->back()->withErrors($val)->withInput();
        }

        $penyakit = new Penyakit();
        $penyakit->kode_penyakit = $request->input('kode_penyakit');
        $penyakit->nama_penyakit = $request->input('nama_penyakit');
        $penyakit->penanganan = $request->input('penanganan');
        $penyakit->deskripsi = $request->input('deskripsi');
        $penyakit->save();

        Alert::success('Sukses', 'Data Berhasil Ditambahkan!');
        return redirect()->route('penyakit.index')->with('success', 'Data Penyakit Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penyakit = Penyakit::findOrFail($id);

        return view('admin.penyakit.editpenyakit', compact('penyakit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = [
            'kode_penyakit' => 'required|string|max:255|unique:penyakits,kode_penyakit,' . $id . ',id',
            'nama_penyakit' => 'required|string|max:255|unique:penyakits,nama_penyakit,' . $id . ',id',
            'penanganan' => 'required|string',
            'deskripsi' => 'required|string',
        ];

        $messages = [
            'kode_penyakit.required' => 'Kode penyakit wajib diisi.',
            'kode_penyakit.unique' => 'Kode penyakit sudah ada.',
            'nama_penyakit.required' => 'Nama penyakit wajib diisi.',
            'nama_penyakit.unique' => 'Nama penyakit sudah ada.',
            'penanganan.required' => 'Penanganan wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
        ];

        $val = Validator::make($request->all(), $validate, $messages);
        if ($val->fails()) {
            Alert::error('Error', 'Ada kesalahan pada input data!');
            return redirect()->back()->withErrors($val)->withInput();
        }

        $penyakit = Penyakit::findOrFail($id);

        $penyakit->kode_penyakit = $request->input('kode_penyakit');
        $penyakit->nama_penyakit = $request->input('nama_penyakit');
        $penyakit->penanganan = $request->input('penanganan');
        $penyakit->deskripsi = $request->input('deskripsi');

        $penyakit->save();

        Alert::success('Sukses', 'Data Berhasil Diperbarui!');
        return redirect()->route('penyakit.index')->with('success', 'Data Penyakit berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penyakit = Penyakit::find($id);

        if (!$penyakit) {

            return redirect()->route('penyakit.index')->with('error', 'Data Penyakit tidak ditemukan');
        }

        Rule::where('id_penyakit', $id)->delete();
        $penyakit->delete();

        Alert::success('Suskses', 'Data Penyakit berhasil dihapus');
        return redirect()->route('penyakit.index');
    }
}
