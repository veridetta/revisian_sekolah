<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  public function register_view()
  {
    return view('register');
  }

  public function register_view_admin()
  {
    return view('register_admin');
  }

  public function store_siswa(Request $request)
  {

    // $nama_lengkap = $request->nama_lengkap;
    $nomor_pendaftaran = $request->nomor_pendaftaran;
    $nidn = $request->nidn;
    // $tanggal_lahir = $request->tanggal_lahir;
    $email = $request->email;

    $request->validate([
      // 'nama_lengkap' => 'required|min:3|max:30',
      'nomor_pendaftaran' => 'required|numeric',
      'nidn' => 'required|numeric',
      // 'tanggal_lahir' => 'required',
      'email' => 'required|unique:user,email|min:10|max:50',
    ]);

    $user_info = DB::table('user_detail')
      ->where('nomor_pendaftaran', '=', $nomor_pendaftaran)
      ->where('nidn', '=', $nidn)
      ->first();
    // dd($user_info);

    if ($user_info == null) {
      return back()->with('error', 'Maaf, NIDN atau nomor pendaftaran anda tidak terdaftar di dalam sistem kami, Hanya pendaftar yang dinyatakan lulus yang dapat melakukan pendaftaran. !');
    }

    $id = $user_info->id_user_detail;

    $user = User::where('id_user_detail', $id)->first();
    $user->email = $email;

    // $user_detail = UserDetail::where('nomor_pendaftaran', $nomor_pendaftaran)->first();
    // $user_detail->tanggal_lahir = $tanggal_lahir;
    // $user_detail->nama_lengkap = $nama_lengkap;

    // if ($user->save() && $user_detail->save()) {
    // if ($user->save()) {
    //   return redirect()->route('login_web')->with('success', 'Akun anda berhasil di daftarkan, mohon menunggu konfirmasi admin untuk anda dapat login');
    // } else {
    //   return back()->with('error', 'Maaf, NIDN atau email anda tidak terdaftar di dalam sistem kami, Hanya pendaftar yang dinyatakan lulus yang dapat melakukan pendaftaran. !');
    // }
    try {
      $user->save();
      return redirect()->route('login_web')->with('success', 'Akun anda berhasil di daftarkan, mohon menunggu konfirmasi Tata Usaha untuk anda dapat login');
    } catch (\Exception $e) {
      return back()->with('error', $e);
    }
  }

  public function store_admin(Request $request)
  {
    $username = $request->username;
    $password = $request->password;
    $id = sha1($username . $password);

    $validatedData = $request->validate([
      'username' => 'required|min:5|max:30',
      'password' => 'required|min:5|max:20|alpha_num',
      'no_telp' => 'required|numeric',
      'email' => 'required|unique:user,email|min:10|max:50',
    ]);
    $validatedData['id'] = $id;
    $validatedData['id_user_detail'] = $id;
    $validatedData['password'] = Hash::make($validatedData['password']);

    $validatedData['id_user_level'] = 1;
    $validatedData['is_active'] = 0;

    $query = User::create($validatedData);
    DB::transaction(function () use ($id) {
      DB::insert("INSERT INTO user_detail(id_user_detail) VALUES('$id')");
    });

    if ($query) {
      return redirect()->route('login_web')->with('success', 'Akun anda berhasil di daftarkan, mohon menunggu konfirmasi Kepala Tata Usaha untuk anda dapat login');
    } else {
      return back()->with('error', 'Error, Anda Belum Terdaftar !');
    }
  }
}
