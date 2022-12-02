<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;



class DataSiswaController extends Controller
{
  public function data_siswa_admin_edit(Request $request){
    $user_siswa=User::where('id','=',$request->id)->join('user_detail', 'user.id', '=', 'user_detail.id_user_detail')->first();
    return view('admin.formulir_edit', compact('user_siswa'));
  }
  public function data_siswa_admin_utama_edit(Request $request){
    $user_siswa=User::where('id','=',$request->id)->join('user_detail', 'user.id', '=', 'user_detail.id_user_detail')->first();
    return view('admin_utama.formulir_edit', compact('user_siswa'));
  }
  public function data_siswa_admin()
  {
    if (session()->get('loggin') == true) {
      $user_siswas = DB::table('user')
        ->join('user_detail', 'user.id', '=', 'user_detail.id_user_detail')
        ->where('id_user_level', '=', 2)
        ->where('id_status_terdaftar', '=', 2)
        ->get();

      $data_kelas = DB::table('user_detail', 'ud1')
        ->select(DB::raw('
        kelas, (SELECT count(iduserdetailinc) FROM user_detail ud2 WHERE jenis_kelamin = "Laki-Laki" AND ud2.kelas = ud1.kelas) as jml_laki, (SELECT count(iduserdetailinc) FROM user_detail ud3 WHERE jenis_kelamin = "Perempuan" AND ud3.kelas = ud1.kelas) as jml_perempuan,(SELECT count(iduserdetailinc) FROM user_detail ud4 WHERE agama = "Kristen" AND ud4.agama = ud1.agama) as jml_kristen,(SELECT count(iduserdetailinc) FROM user_detail ud5 WHERE agama = "Islam" AND ud5.agama = ud1.agama) as jml_islam,(SELECT count(iduserdetailinc) FROM user_detail ud6 WHERE agama = "Katolik" AND ud6.agama = ud1.agama) as jml_katolik,(SELECT count(iduserdetailinc) FROM user_detail ud7 WHERE agama = "Hindu" AND ud7.agama = ud1.agama) as jml_hindu,(SELECT count(iduserdetailinc) FROM user_detail ud8 WHERE agama = "Buddha" AND ud8.agama = ud1.agama) as jml_buddha,(SELECT count(iduserdetailinc) FROM user_detail ud9 WHERE agama = "Konghucu" AND ud9.agama = ud1.agama) as jml_konghucu
        '))
        ->where('kelas', '!=', null)
        ->groupByRaw('ud1.kelas')
        ->orderBy('ud1.kelas',  'ASC')
        ->get();
      return view('admin.data_siswa', compact('user_siswas', 'data_kelas'));
    } else {
      return redirect()
        ->route('login_web')
        ->with([
          'error' => 'Sesi Anda berakhir !'
        ]);
    }
  }

  public function data_siswa_admin_utama()
  {
    if (session()->get('loggin') == true) {
      $user_siswas = DB::table('user')
        ->join('user_detail', 'user.id', '=', 'user_detail.id_user_detail')
        ->where('id_user_level', '=', 2)
        ->where('id_status_terdaftar', '=', 2)
        ->get();

      $data_kelas = DB::table('user_detail', 'ud1')
        ->select(DB::raw('
        kelas, (SELECT count(iduserdetailinc) FROM user_detail ud2 WHERE jenis_kelamin = "Laki-Laki" AND ud2.kelas = ud1.kelas) as jml_laki, (SELECT count(iduserdetailinc) FROM user_detail ud3 WHERE jenis_kelamin = "Perempuan" AND ud3.kelas = ud1.kelas) as jml_perempuan,(SELECT count(iduserdetailinc) FROM user_detail ud4 WHERE agama = "Kristen" AND ud4.agama = ud1.agama) as jml_kristen,(SELECT count(iduserdetailinc) FROM user_detail ud5 WHERE agama = "Islam" AND ud5.agama = ud1.agama) as jml_islam,(SELECT count(iduserdetailinc) FROM user_detail ud6 WHERE agama = "Katolik" AND ud6.agama = ud1.agama) as jml_katolik,(SELECT count(iduserdetailinc) FROM user_detail ud7 WHERE agama = "Hindu" AND ud7.agama = ud1.agama) as jml_hindu,(SELECT count(iduserdetailinc) FROM user_detail ud8 WHERE agama = "Buddha" AND ud8.agama = ud1.agama) as jml_buddha,(SELECT count(iduserdetailinc) FROM user_detail ud9 WHERE agama = "Konghucu" AND ud9.agama = ud1.agama) as jml_konghucu
        '))
        ->where('kelas', '!=', null)
        ->groupByRaw('ud1.kelas')
        ->orderBy('ud1.kelas',  'ASC')
        ->get();
      return view('admin_utama.data_siswa', compact('user_siswas', 'data_kelas'));
    } else {
      return redirect()
        ->route('login_web')
        ->with([
          'error' => 'Sesi Anda berakhir !'
        ]);
    }
  }

  public function data_kelas_siswa()
  {
    if (session()->get('loggin') == true) {
      $user_siswas = DB::table('user')
        ->join('user_detail', 'user.id', '=', 'user_detail.id_user_detail')
        ->where('id_user_level', '=', 2)
        ->where('id_status_terdaftar', '=', 2)
        ->where('kelas', '!=', "")
        ->get();
      return view('siswa.data_siswa', compact('user_siswas'));
    } else {
      return redirect()
        ->route('login_web')
        ->with([
          'error' => 'Sesi Anda berakhir !'
        ]);
    }
  }

  public function update_siswa(Request $request)
  {
    $kelas = $request->kelas;
    $id = $request->id;

    try {
      $affected = DB::table('user_detail')
        ->where('id_user_detail', $id)
        ->update([
          'kelas' => $kelas
        ]);

      return redirect()
        ->back()
        ->withInput()
        ->with([
          'success' => 'Sukses, Kelas Telah Ditambahkan !'
        ]);
    } catch (\Exception $e) {
      return redirect()
        ->back()
        ->withInput()
        ->with([
          'error' => 'Error,  Kelas Tidak Ditambahkan !'
        ]);
    }
  }

  public function update_siswa_admin_utama(Request $request)
  {
    $kelas = $request->kelas;
    $id = $request->id;

    try {
      $affected = DB::table('user_detail')
        ->where('id_user_detail', $id)
        ->update([
          'kelas' => $kelas
        ]);

      return redirect()
        ->back()
        ->withInput()
        ->with([
          'success' => 'Sukses, Kelas Telah Ditambahkan !'
        ]);
    } catch (\Exception $e) {
      return redirect()
        ->back()
        ->withInput()
        ->with([
          'error' => 'Error,  Kelas Tidak Ditambahkan !'
        ]);
    }
  }

  public function update_status_data(Request $request)
  {


    $id_status_verifikasi = $request->id_status_verifikasi;
    $id = $request->id;

    try {
      $affected = DB::table('user_detail')
        ->where('id_user_detail', $id)
        ->update([
          'id_status_verifikasi' => $id_status_verifikasi
        ]);

      return redirect()
        ->back()
        ->withInput()
        ->with([
          'success' => 'Sukses, Data Telah Diverifikasi !'
        ]);
    } catch (\Exception $e) {
      return redirect()
        ->back()
        ->withInput()
        ->with([
          'error' => 'Error,  Data Belum Diverifikasi !'
        ]);
    }
  }

  public function update_status_data_admin_utama(Request $request)
  {
    $id_status_verifikasi = $request->id_status_verifikasi;
    $id = $request->id;

    try {
      $affected = DB::table('user_detail')
        ->where('id_user_detail', $id)
        ->update([
          'id_status_verifikasi' => $id_status_verifikasi
        ]);

      return redirect()
        ->back()
        ->withInput()
        ->with([
          'success' => 'Sukses, Data Telah Diverifikasi !'
        ]);
    } catch (\Exception $e) {
      return redirect()
        ->back()
        ->withInput()
        ->with([
          'error' => 'Error,  Data Belum Diverifikasi !'
        ]);
    }
  }

  public function delete_siswa(Request $request)
  {
    $id = $request->id;
    $ijazah = $request->ijazah;
    $skhun = $request->skhun;
    $kk = $request->kk;
    $akta_kelahiran = $request->akta_kelahiran;
    $foto = $request->foto;
    $surat_keterangan_lulus = $request->surat_keterangan_lulus;



    try {
      if (File::exists(public_path('storage/ijazah/' . $ijazah))) {
        File::delete(public_path('storage/ijazah/' . $ijazah));
        File::delete(public_path('storage/skhun/' . $skhun));
        File::delete(public_path('storage/kk/' . $kk));
        File::delete(public_path('storage/akta_kelahiran/' . $akta_kelahiran));
        File::delete(public_path('storage/foto/' . $foto));
        File::delete(public_path('storage/surat_keterangan_lulus/' . $surat_keterangan_lulus));
      } else {
        dd('File does not exists.');
      }

      DB::transaction(function () use ($id) {
        DB::delete("DELETE FROM user WHERE id='$id'");
        DB::delete("DELETE FROM user_detail WHERE id_user_detail='$id'");
      });
      return redirect()
        ->route('data_siswa_admin')
        ->with([
          'success' => 'Anda Berhasil Menghapus Data !'
        ]);
    } catch (\Exception $e) {
      return redirect()
        ->back()
        ->withInput()
        ->with([
          'error' => 'Error, Data Anda Gagal Dihapus !'
        ]);
    }
  }

  public function delete_siswa_admin_utama(Request $request)
  {
    $id = $request->id;
    $ijazah = $request->ijazah;
    $skhun = $request->skhun;
    $kk = $request->kk;
    $akta_kelahiran = $request->akta_kelahiran;
    $foto = $request->foto;
    $surat_keterangan_lulus = $request->surat_keterangan_lulus;

    // echo dd(public_path('storage/ijazah/'.$ijazah));
    // die();
    try {
      if (File::exists(public_path('storage/ijazah/' . $ijazah))) {
        File::delete(public_path('storage/ijazah/' . $ijazah));
        File::delete(public_path('storage/skhun/' . $skhun));
        File::delete(public_path('storage/kk/' . $kk));
        File::delete(public_path('storage/akta_kelahiran/' . $akta_kelahiran));
        File::delete(public_path('storage/foto/' . $foto));
        File::delete(public_path('storage/surat_keterangan_lulus/' . $surat_keterangan_lulus));
      } else {
        dd('File does not exists.');
      }

      DB::transaction(function () use ($id) {
        DB::delete("DELETE FROM user WHERE id='$id'");
        DB::delete("DELETE FROM user_detail WHERE id_user_detail='$id'");
      });
      return redirect()
        ->route('data_siswa_admin_utama')
        ->with([
          'success' => 'Anda Berhasil Menghapus Data !'
        ]);
    } catch (\Exception $e) {
      return redirect()
        ->back()
        ->withInput()
        ->with([
          'error' => 'Error, Data Anda Gagal Dihapus !'
        ]);
    }
  }

  public function halaman_report()
  {
    $user_info = User::where('id_user_detail', session()->get('id'))->first();

    if ($user_info->id_user_level == '3') {
      return view('admin_utama.halaman_report', compact('user_info'));
    } else {
      return view('admin.halaman_report', compact('user_info'));
    }
  }

  public function filter_report(Request $request)
  {
    if (session()->get('loggin') == true) {
      // dd($request->all());
      $filter_siswa = DB::table('user')
        ->join('user_detail', 'user.id', '=', 'user_detail.id_user_detail')
        ->where('id_user_level', '=', 2)
        ->where('id_status_terdaftar', '=', 2)
        ->where('kelas', '=', $request->kelas)
        ->get();

      $kelas = $request->kelas;

      $user_info = User::where('id_user_detail', session()->get('id'))->first();

      if ($user_info->id_user_level == '3') {
        return view('admin_utama.halaman_report', compact('filter_siswa', 'kelas', 'user_info'));
      } else {
        return view('admin.halaman_report', compact('filter_siswa', 'kelas', 'user_info'));
      }
    } else {
      return redirect()
        ->route('login_web')
        ->with([
          'error' => 'Sesi Anda berakhir !'
        ]);
    }
  }

  public function export_filter_report()
  {

    // Setting options
    $options = new Options();
    $options->setIsRemoteEnabled(true);


    // instantiate and use the dompdf class
    $dompdf = new Dompdf();

    $dompdf->setOptions($options);

    $kelas = $_GET['kelas'];
    $filter_siswa = DB::table('user')
      ->join('user_detail', 'user.id', '=', 'user_detail.id_user_detail')
      ->where('id_user_level', '=', 2)
      ->where('id_status_terdaftar', '=', 2)
      ->where('kelas', '=', $kelas)
      ->orderBy('nama_lengkap', 'asc')
      ->get();

    $view = view('admin_utama.export_filter', compact('filter_siswa', 'kelas'));

    $dompdf->loadHtml($view);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream(date('dmyhis') . ' - Data Siswa Kelas ' . $kelas);
  }
}
