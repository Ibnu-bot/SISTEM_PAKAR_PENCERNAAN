<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.tambahusers');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string'
        ];

        $val = Validator::make($request->all(), $validate);
        if ($val->fails()) {
            Alert::error('Error', 'Ada kesalahan pada input data!');
            return redirect()->back()->withErrors($val)->withInput();
        }

        $users = new User();
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));
        $users->role = $request->input('role');

        $users->save();
        Alert::success('Sukses', 'Data Berhasil Ditambahkan!');
        return redirect()->route('users.index')->with('success', 'Data Users Berhasil Ditambahkan');
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
        $users = User::findOrfail($id);

        return view('admin.users.editusers', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:user,admin',
        ];

        $val = Validator::make($request->all(), $validate);
        if ($val->fails()) {
            Alert::error('Error', 'Ada kesalahan pada input data!');
            return redirect()->back()->withErrors($val)->withInput();
        }

        $users = User::findOrFail($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');

        if ($request->filled('password')) {
            $users->password = Hash::make($request->input('password'));
        }

        $users->role = $request->input('role');
        $users->save();
        Alert::success('Sukses', 'Data Berhasil Diperbarui!');
        return redirect()->route('users.index')->with('success', 'Data Users Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('diagnosis')->where('pasien_id', $id)->delete();
        DB::table('pasiens')->where('user_id', $id)->delete();
        $users = User::findOrFail($id);
        $users->delete();

        Alert::success('Suskses', 'Data berhasil dihapus');
        return redirect()->route('users.index')->with('success', 'Data Users Berhasil Dihapus');
    }
}
