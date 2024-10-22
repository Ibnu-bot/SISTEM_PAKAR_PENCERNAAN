<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RandomIndex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RandomIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $randomindex = RandomIndex::all();
        return view('admin.randomindex.index', compact('randomindex'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.randomindex.tambahrandomindex');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = [
            'jumlah' => 'required|integer|unique:randomindex,jumlah',
            'nilai' => 'required|numeric',
        ];

        $messages = [
            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.unique' => 'Jumlah sudah ada.',
            'nilai.required' => 'Nilai wajib diisi.',
        ];

        $val = Validator::make($request->all(), $validate, $messages);
        if ($val->fails()) {
            Alert::error('Error', 'Ada kesalahan pada input data!');
            return redirect()->back()->withErrors($val)->withInput();
        }

        $randomindex = new RandomIndex();
        $randomindex->jumlah = $request->input('jumlah');
        $randomindex->nilai = $request->input('nilai');

        $randomindex->save();
        Alert::success('Sukses', 'Data Berhasil Ditambahkan!');
        return redirect()->route('randomindex.index')->with('success', 'Data Random Index Berhasil Ditambahkan');
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
        $randomindex = RandomIndex::findOrFail($id);
        return view('admin.randomindex.editrandomindex', compact('randomindex'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = [
            'jumlah' => 'required|integer|unique:randomindex,jumlah,' . $id . ',id',
            'nilai' => 'required|numeric',
        ];

        $messages = [
            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.unique' => 'Jumlah sudah ada.',
            'nilai.required' => 'Nilai wajib diisi.',
        ];

        $val = Validator::make($request->all(), $validate, $messages);
        if ($val->fails()) {
            Alert::error('Error', 'Ada kesalahan pada input data!');
            return redirect()->back()->withErrors($val)->withInput();
        }

        $randomindex = RandomIndex::findOrFail($id);
        $randomindex->jumlah = $request->input('jumlah');
        $randomindex->nilai = $request->input('nilai');

        $randomindex->save();
        Alert::success('Sukses', 'Data Berhasil Diperbarui!');
        return redirect()->route('randomindex.index')->with('success', 'Data Random Index Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $randomindex = RandomIndex::findOrFail($id);
        $randomindex->delete();
        Alert::success('Suskses', 'Data berhasil dihapus');
        return redirect()->route('randomindex.index')->with('success', 'Data Random Index Berhasil Dihapus');
    }
}
