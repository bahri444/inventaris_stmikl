<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function GetUser()
    {
        $users = User::all();
        return view('superadmin.user', [
            'title' => 'data akun',
            'user' => $users
        ]);
    }

    public function Register(Request $request)
    {
        $request->validate([
            'username' => 'required|max:15',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);
        try {
            $data = new User([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            // dd($data);
            $data->save();
            return redirect('user')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('user')->with('errors', 'gagal');
        }
    }

    public function GetLogin()
    {
        return view('auth.login', [
            'title' => 'halaman login'
        ]);
    }

    public function Auth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only("email", "password"))) {
            if (Auth::user()->role == 'superadmin') {
                return redirect('tanah')->with('success', "berhasil login");
            } elseif (Auth::user()->role == 'pengguna') {
                return redirect('dashboard')->with('success', "berhasil login");
            } else {
                print('anda tidak memiliki akun');
            }
        }

        return back()->withErrors([
            'password' => 'Wrong email or password',
        ]);
    }

    public function Logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
    public function Delete($id)
    {
        try {
            User::where('id', '=', $id)->delete();
            return redirect('user')->with('success', 'berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('users')->with('errors', 'gagal di hapus');
        }
    }
}
