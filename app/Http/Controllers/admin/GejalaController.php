<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gejala = Gejala::all();
        return view('admin.gejala.index', compact('gejala'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gejala.tambahgejala');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = [
            'kode_gejala' => 'required|string|max:255|unique:gejalas,kode_gejala',
            'nama_gejala' => 'required|string|max:255',

        ];

        $messages = [
            'kode_gejala.required' => 'Kode gejala wajib diisi.',
            'kode_gejala.unique' => 'Kode gejala sudah ada.',
            'nama_gejala.required' => 'Nama gejala wajib diisi.',

        ];

        $val = Validator::make($request->all(), $validate, $messages);
        if ($val->fails()) {
            Alert::error('Error', 'Ada kesalahan pada input data!');
            return redirect()->back()->withErrors($val)->withInput();
        }

        $gejala = new Gejala();
        $gejala->kode_gejala = $request->input('kode_gejala');
        $gejala->nama_gejala = $request->input('nama_gejala');


        $gejala->save();
        Alert::success('Sukses', 'Data Berhasil Ditambahkan!');
        return redirect()->route('gejala.index')->with('success', 'Data Gejala Berhasil Ditambahkan');
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
        $gejala = Gejala::findOrfail($id);

        return view('admin.gejala.editgejala', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = [
            'kode_gejala' => 'required|string|max:255|unique:gejalas,kode_gejala,' . $id . ',id',
            'nama_gejala' => 'required|string|max:255|unique:gejalas,nama_gejala,' . $id . ',id',

        ];

        $messages = [
            'kode_gejala.required' => 'Kode gejala wajib diisi.',
            'kode_gejala.unique' => 'Kode gejala sudah ada.',
            'nama_gejala.required' => 'Nama gejala wajib diisi.',
            'nama_gejala.unique' => 'Nama gejala sudah ada.',

        ];

        $val = Validator::make($request->all(), $validate, $messages);
        if ($val->fails()) {
            Alert::error('Error', 'Ada kesalahan pada input data!');
            return redirect()->back()->withErrors($val)->withInput();
        }

        $gejala = Gejala::findOrFail($id);

        $gejala->kode_gejala = $request->input('kode_gejala');
        $gejala->nama_gejala = $request->input('nama_gejala');


        $gejala->save();
        Alert::success('Sukses', 'Data Berhasil Diperbarui!');

        return redirect()->route('gejala.index')->with('success', 'Data Gejala berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gejala = Gejala::find($id);

        if (!$gejala) {
            return redirect()->route('gejala.index')->with('error', 'Data Gejala tidak ditemukan');
        }

        Rule::where('id_gejala', $id)->delete();

        $gejala->delete();

        Alert::success('Suskses', 'Data berhasil dihapus');
        return redirect()->route('gejala.index')->with('success', 'Data Gejala berhasil dihapus');
    }
}
