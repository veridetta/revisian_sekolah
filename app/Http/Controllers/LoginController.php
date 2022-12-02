<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function login_view()
  {
    return view('login');
  }

  public function login_proses(Request $request)
  {

    $validatedData = $request->validate([
      'username' => 'required',
      'password' => 'required|min:5|max:20',
    ]);

    if (Auth::attempt($validatedData)) {
      if (auth()->user()->id_user_level == 1) {
        if (auth()->user()->is_active == 1) {
          $request->session()->put('username', auth()->user()->username);
          $request->session()->put('nama_lengkap', auth()->user()->nama_lengkap);
          $request->session()->put('id', auth()->user()->id);
          $request->session()->put('loggin', true);
          $request->session()->regenerate();
          return redirect()->intended('admin');
        } else {
          return redirect()->route('login_web')->with(['error' => 'Akun Anda Belum Aktif !']);
        }
      } elseif (auth()->user()->id_user_level == 2) {
        $request->session()->put('username', $request->username);
        $request->session()->put('nama_lengkap', auth()->user()->nama_lengkap);
        $request->session()->put('id', auth()->user()->id);
        $request->session()->put('id_status_verifikasi', auth()->user()->id_status_verifikasi);
        $request->session()->put('loggin', true);
        $request->session()->regenerate();
        return redirect()->intended('siswa');
        
      } elseif (auth()->user()->id_user_level == 3) {
        if (auth()->user()->is_active == 1) {
          $request->session()->put('username', auth()->user()->username);
          $request->session()->put('nama_lengkap', auth()->user()->nama_lengkap);
          $request->session()->put('id', auth()->user()->id);
          $request->session()->put('loggin', true);
          $request->session()->regenerate();
          return redirect()->intended('admin_utama');
        } else {
          return redirect()->route('login_web')->with(['error' => 'Akun Anda Belum Aktif !']);
        }
      }
    }

    return back()->with('error', 'Oops! Percobaan login gagal. Mohon periksa kembali username dan password yang Anda masukkan!');
  }

  public function log_out(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login_web')->with('success', 'Anda telah melakukan logout!');
  }
}
