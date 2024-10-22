<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rule = Rule::all();
        return view('admin.rule.index', compact('rule'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penyakit = Penyakit::get();
        $gejala = Gejala::get();
        return view('admin.rule.tambahrule', compact('penyakit', 'gejala'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = [
            'id_penyakit' => 'required|integer',
            'id_gejala' => 'required|integer',
            'cf_pakar' => 'required',
        ];

        $val = Validator::make($request->all(), $validate);
        if ($val->fails()) {
            Alert::error('Error', 'Ada kesalahan pada input data!');
            return redirect()->back()->withErrors($val)->withInput();
        }

        $rule = new Rule();
        $rule->id_penyakit = $request->input('id_penyakit');
        $rule->id_gejala = $request->input('id_gejala');
        $rule->cf_pakar = $request->input('cf_pakar');

        $rule->save();
        Alert::success('Sukses', 'Data Berhasil Ditambahkan!');
        return redirect()->route('rule.index')->with('success', 'Data rule berhasil disimpan');
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
        $rule = Rule::findOrFail($id);
        $penyakit = Penyakit::get();
        $gejala = Gejala::get();
        return view('admin.rule.editrule', compact('rule', 'penyakit', 'gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = [
            'id_penyakit' => 'required|integer',
            'id_gejala' => 'required|integer',
            'cf_pakar' => 'numeric',
        ];

        $val = Validator::make($request->all(), $validate);
        if ($val->fails()) {
            Alert::error('Error', 'Ada kesalahan pada input data!');
            return redirect()->back()->withErrors($val)->withInput();
        }

        $rule = Rule::findOrFail($id);
        $rule->id_penyakit = $request->input('id_penyakit');
        $rule->id_gejala = $request->input('id_gejala');
        $rule->cf_pakar = $request->cf_pakar;

        $rule->save();
        Alert::success('Sukses', 'Data Berhasil Diperbarui');
        return redirect()->route('rule.index')->with('success', 'Data rule berhasil diperbarui');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rule = Rule::findOrFail($id);
        $rule->delete();

        Alert::success('Suskses', 'Data berhasil dihapus');
        return redirect()->route('rule.index')->with('success', 'Data rule berhasil dihapus');
    }
}
