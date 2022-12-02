<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard_admin()
    {
        if (session()->get('loggin') == true) {
            $user_counts = DB::table('user')->join('user_detail', 'user.id', '=', 'user_detail.id_user_detail')->where('user.id_user_level', '=', 2)->where('user.id_user_level', '=', 2)->where('user_detail.id_status_validasi', '=', 2)->where('user_detail.id_status_terdaftar', '=', 2)->where('user_detail.id_status_verifikasi', '=', 2)->count();
            $user_countsbelum = DB::table('user')->join('user_detail', 'user.id', '=', 'user_detail.id_user_detail')->where('user.id_user_level', '=', 2)->where('user_detail.id_status_validasi', '!=', 2)->where('user_detail.id_status_terdaftar', '!=', 2)->where('user_detail.id_status_verifikasi', '!=', 2)->count();
            $panitia_counts = DB::table('user')->where('id_user_level', '=', 1)->count();
            return view('admin.dashboard', compact('user_counts', 'panitia_counts', 'user_countsbelum'));
        } else {
            return redirect()
                ->route('login_web')
                ->with([
                    'error' => 'Sesi Anda berakhir !'
                ]);
        }
    }

    public function dashboard_admin_utama()
    {
        if (session()->get('loggin') == true) {
            $user_counts = DB::table('user')->where('id_user_level', '=', 2)->count();
            $user_counts = DB::table('user')->join('user_detail', 'user.id', '=', 'user_detail.id_user_detail')->where('user.id_user_level', '=', 2)->where('user.id_user_level', '=', 2)->where('user_detail.id_status_validasi', '=', 2)->where('user_detail.id_status_terdaftar', '=', 2)->where('user_detail.id_status_verifikasi', '=', 2)->count();
            $user_countsbelum = DB::table('user')->join('user_detail', 'user.id', '=', 'user_detail.id_user_detail')->where('user.id_user_level', '=', 2)->where('user_detail.id_status_validasi', '!=', 2)->where('user_detail.id_status_terdaftar', '!=', 2)->where('user_detail.id_status_verifikasi', '!=', 2)->count();
            $panitia_counts = DB::table('user')->where('id_user_level', '=', 1)->count();
            return view('admin_utama.dashboard', compact('user_counts', 'panitia_counts', 'user_countsbelum'));
        } else {
            return redirect()
                ->route('login_web')
                ->with([
                    'error' => 'Sesi Anda berakhir !'
                ]);
        }
    }

    public function dashboard_siswa()
    {
        if (session()->get('loggin') == true) {
            $user_counts = DB::table('user')->where('id_user_level', '=', 2)->count();
            $user_counts = DB::table('user')->join('user_detail', 'user.id', '=', 'user_detail.id_user_detail')->where('user.id_user_level', '=', 2)->where('user.id_user_level', '=', 2)->where('user_detail.id_status_validasi', '=', 2)->where('user_detail.id_status_terdaftar', '=', 2)->where('user_detail.id_status_verifikasi', '=', 2)->count();
            $user_countsbelum = DB::table('user')->join('user_detail', 'user.id', '=', 'user_detail.id_user_detail')->where('user.id_user_level', '=', 2)->where('user_detail.id_status_validasi', '!=', 2)->where('user_detail.id_status_terdaftar', '!=', 2)->where('user_detail.id_status_verifikasi', '!=', 2)->count();
            $panitia_counts = DB::table('user')->where('id_user_level', '=', 1)->count();
            return view('siswa.dashboard', compact('user_counts', 'panitia_counts', 'user_countsbelum'));
        } else {
            return redirect()
                ->route('login_web')
                ->with([
                    'error' => 'Sesi Anda berakhir !'
                ]);
        }
    }
}
