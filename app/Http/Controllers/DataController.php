<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Data::all();
        return view('data.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('data.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'nis' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ], [
            'name.required' => 'Nama harus diisi!',
            'nis.required' => 'nis harus diisi!',
            'kelas.required' => 'kelas harus diisi!',
            'jurusan.required' => 'jurusan harus diisi!',
            'name.min' => 'Nama minimal 3 karakter!',
            'nis.numeric' => 'Nis harus berupa angka!',
        ]);

        Data::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan
        ]);
        
        return redirect()->back()->with('success', 'berhasil menambahkan data siswa!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Data::find($id);
        return view('data.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'nis' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ], [
            'name.required' => 'Nama harus diisi!',
            'nis.required' => 'Nis harus diisi!',
            'kelas.required' => 'Kelas harus diisi!',
            'jurusan.required' => 'Jurusan harus diisi!',
            'name.min' => 'Nama minimal 3 karakter!!',
            'nis.numeric' => 'Nis harus berupa angka!',
        ]);

        Data::where('id', $id)->update([
            'name' => $request->name,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan
        ]);

        return redirect()->route('data.home')->with('success', 'berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proses = Data::where('id', $id)->delete(); 

        if ($proses) {
            return redirect()->back()->with('success', 'Berhasil menghapus data obat!');
        }else{
            return redirect()->back()->with('failed', 'Gagal menghapus data obat!');
        }
    }

    public function showlogin() {
        return view('pages.login');
    }

    public function login(request $request) {
        
        $credential = $request->only('email', 'password');

        if (Auth::attempt($credential)) {
            return redirect()->route('home')->with('success', 'Anda telah login');
        }else {
            return redirect()->back()->with('failed', 'Login gagal');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout');
    }
}
