<?php

namespace App\Http\Controllers;

use App\Models\TahunAkademik;
use App\Models\User;
use App\Models\VisiMisi;
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

    public function UpdateUs(Request $request)
    {
        $request->validate([
            'username' => 'required|max:30',
            'email' => 'required|max:30',
            'role' => 'required'
        ]);
        try {
            $data = array(
                'username' => $request->username,
                'email' => $request->email,
                'role' => $request->role,
            );
            User::where('id', '=', $request->post('id'))->update($data);
            return redirect('user')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('user')->with('errors', 'gagal');
        }
    }

    public function Register(Request $request)
    {
        $request->validate([
            'username' => 'required|max:30',
            'email' => 'required|max:30|email|unique:users',
            'password' => 'required|min:8',
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
        $tahunakademik = TahunAkademik::select('id_tahun_akademik', 'semester', 'tahun')->orderBy('id_tahun_akademik', 'desc')->get();
        return view('auth.loginform', [
            'title' => 'halaman login',
            'tahunakademik' => $tahunakademik
        ]);
    }

    public function Auth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'id_tahun_akademik' => 'required',
        ]);
        if (Auth::attempt($request->only("email", "password"))) {
            if (Auth::user()->role == 'superadmin') {
                Session::put('id_tahun_akademik', $request->id_tahun_akademik);
                return redirect('/dashboard')->with('success', "berhasil login");
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
