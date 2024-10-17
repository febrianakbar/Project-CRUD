<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }


    public function landing()
    {
        return view('pages.home');
    }
    
    /**
     * Show the form for Usereating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly Usereated resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'role' => 'required',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back()->with('success', 'berhasil menambahkan data pengguna!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'role' => 'required|min:3',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'Nama harus diisi!',
            'email.required' => 'Email harus diisi!',
            'role.required' => 'Role harus diisi!',
            'password.required' => 'Password harus diisi!',
            'name.max' => 'Nama maksimal 100 karakter!!',
            'email.max' => 'email maksimal 100 karakter!',
            'role.min' => 'Role minimal 3 karakter',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password)
        ]);

        return redirect('users')->with('success', 'berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy($id)
    {
        $proses = User::where('id', $id)->delete(); 

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
