<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class FormulirController extends Controller
{
  public function form_edit(Request $request){
    $user_siswa=User::where('id','=',session()->get('id'))->join('user_detail', 'user.id', '=', 'user_detail.id_user_detail')->first();
    return view('siswa.formulir_edit', compact('user_siswa'));
  }
  public function form_edit_proses(Request $request){
    $validator = Validator::make($request->all(), [
      'ijazah' => "required",
      'skhun' => "required",
      'kk' => "required",
      'akta_kelahiran' => "required",
      'foto' => "required",
      'surat_keterangan_lulus' => "required"
    ]);

    if ($validator->fails()) {
      return redirect()
        ->back()
        ->withInput()
        ->with([
          'error' => 'Error, Data Tidak Terupload !'
        ]);
    }
    $nama_lengkap = $request->nama_lengkap;
    $nama_panggilan = $request->nama_panggilan;
    $no_telp = $request->no_telp;
    $sekolah_asal = $request->sekolah_asal;
    $jenis_kelamin = $request->jenis_kelamin;
    $tempat_lahir = $request->tempat_lahir;
    $tanggal_lahir = $request->tanggal_lahir;
    $agama = $request->agama;
    $kewarganegaraan = $request->kewarganegaraan;
    $status_kekeluargaan = $request->status_kekeluargaan;
    $anak_ke = $request->anak_ke;
    $saudara_kandung = $request->saudara_kandung;
    $saudara_tiri = $request->saudara_tiri;
    $nik = $request->nik;
    $alamat = $request->alamat;
    $rt_rw = $request->rt_rw;
    $kelurahan = $request->kelurahan;
    $kecamatan = $request->kecamatan;
    $kabupaten = $request->kabupaten;
    $provinsi = $request->provinsi;
    $kode_pos = $request->kode_pos;
    $id = $request->id_user_detail;
    $jalur_pendaftaran = $request->jalur_pendaftaran;
    $nilai_ipa = $request->nilai_ipa;
    $nilai_ips = $request->nilai_ips;
    $nilai_matematika = $request->nilai_matematika;
    $nilai_bahasa_inggris = $request->nilai_bahasa_inggris;
    $nilai_bahasa_indonesia = $request->nilai_bahasa_indonesia;
    $id_baju_batik = $request->id_baju_batik;
    $id_baju_olahraga = $request->id_baju_olahraga;
    $ijazah_old = $request->ijazah_old;
    $skhun_old = $request->skhun_old;
    $kk_old = $request->kk_old;
    $akta_kelahiran_old = $request->akta_kelahiran_old;
    $foto_old = $request->foto_old;
    $surat_keterangan_lulus_old = $request->surat_keterangan_lulus_old;

    $nama_ayah = $request->nama_ayah;
    $tempat_lahir_ayah = $request->tempat_lahir_ayah;
    $tanggal_lahir_ayah = $request->tanggal_lahir_ayah;
    $agama_ayah = $request->agama_ayah;
    $pendidikan_ayah = $request->pendidikan_ayah;
    $pekerjaan_ayah = $request->pekerjaan_ayah;
    $warga_negara_ayah = $request->warga_negara_ayah;
    $nomor_telepon_ayah = $request->nomor_telepon_ayah;
    $pendapatan_ayah = $request->pendapatan_ayah;
    $nama_ibu = $request->nama_ibu;
    $tempat_lahir_ibu = $request->tempat_lahir_ibu;
    $tanggal_lahir_ibu = $request->tanggal_lahir_ibu;
    $agama_ibu = $request->agama_ibu;
    $pendidikan_ibu = $request->pendidikan_ibu;
    $pekerjaan_ibu = $request->pekerjaan_ibu;
    $warga_negara_ibu = $request->warga_negara_ibu;
    $nomor_telepon_ibu = $request->nomor_telepon_ibu;
    $pendapatan_ibu = $request->pendapatan_ibu;





    $name_ijazah = $request->file('ijazah')->getClientOriginalName();

    $path_ijazah = $request->file('ijazah')->store('public/ijazah');

    $name_skhun = $request->file('skhun')->getClientOriginalName();

    $path_skhun = $request->file('skhun')->store('public/skhun');

    $name_kk = $request->file('kk')->getClientOriginalName();

    $path_kk = $request->file('kk')->store('public/kk');

    $name_akta_kelahiran = $request->file('akta_kelahiran')->getClientOriginalName();

    $path_akta_kelahiran = $request->file('akta_kelahiran')->store('public/akta_kelahiran');

    $name_foto = $request->file('foto')->getClientOriginalName();

    $path_foto = $request->file('foto')->store('public/foto');

    $name_surat_keterangan_lulus = $request->file('surat_keterangan_lulus')->getClientOriginalName();

    $path_surat_keterangan_lulus = $request->file('surat_keterangan_lulus')->store('public/surat_keterangan_lulus');

    $file_name_ijazah = str_replace("public/ijazah/", "", $path_ijazah);
    $file_name_skhun = str_replace("public/skhun/", "", $path_skhun);
    $file_name_kk = str_replace("public/kk/", "", $path_kk);
    $file_name_akta_kelahiran = str_replace("public/akta_kelahiran/", "", $path_akta_kelahiran);
    $file_name_foto = str_replace("public/foto/", "", $path_foto);
    $file_name_surat_keterangan_lulus = str_replace("public/surat_keterangan_lulus/", "", $path_surat_keterangan_lulus);
    try {

      $affected = DB::table('user_detail')
        ->where('id_user_detail', $id)
        ->update([
          'nama_lengkap' => $nama_lengkap,
          'nama_panggilan' => $nama_panggilan,
          'sekolah_asal' => $sekolah_asal,
          'jenis_kelamin' => $jenis_kelamin,
          'tempat_lahir' => $tempat_lahir,
          'tanggal_lahir' => $tanggal_lahir,
          'agama' => $agama,
          'kewarganegaraan' => $kewarganegaraan,
          'status_kekeluargaan' => $status_kekeluargaan,
          'anak_ke' => $anak_ke,
          'saudara_kandung' => $saudara_kandung,
          'saudara_tiri' => $saudara_tiri,
          'NIK' => $nik,
          'alamat' => $alamat,
          'rt_rw' => $rt_rw,
          'kelurahan' => $kelurahan,
          'kecamatan' => $kecamatan,
          'kabupaten' => $kabupaten,
          'provinsi' => $provinsi,
          'kode_pos' => $kode_pos,
          'ijazah' => $file_name_ijazah,
          'skhun' => $file_name_skhun,
          'kk' => $file_name_kk,
          'akta_kelahiran' => $file_name_akta_kelahiran,
          'foto' => $file_name_foto,
          'surat_keterangan_lulus' => $file_name_surat_keterangan_lulus,
          'id_status_terdaftar' => '2',
          'jalur_pendaftaran' => $jalur_pendaftaran,
          'nilai_ipa' => $nilai_ipa,
          'nilai_ips' => $nilai_ips,
          'nilai_matematika' => $nilai_matematika,
          'nilai_bahasa_inggris' => $nilai_bahasa_inggris,
          'nilai_bahasa_indonesia' => $nilai_bahasa_indonesia,
          'id_baju_batik' => $id_baju_batik,
          'id_baju_olahraga' => $id_baju_olahraga,
          'nama_ayah' => $nama_ayah,
          'tempat_lahir_ayah' => $tempat_lahir_ayah,
          'tanggal_lahir_ayah' => $tanggal_lahir_ayah,
          'agama_ayah' => $agama_ayah,
          'pendidikan_ayah' => $pendidikan_ayah,
          'pekerjaan_ayah' => $pekerjaan_ayah,
          'warga_negara_ayah' => $warga_negara_ayah,
          'nomor_telepon_ayah' => $nomor_telepon_ayah,
          'pendapatan_ayah' => $pendapatan_ayah,
          'nama_ibu' => $nama_ibu,
          'tempat_lahir_ibu' => $tempat_lahir_ibu,
          'tanggal_lahir_ibu' => $tanggal_lahir_ibu,
          'agama_ibu' => $agama_ibu,
          'pendidikan_ibu' => $pendidikan_ibu,
          'pekerjaan_ibu' => $pekerjaan_ibu,
          'warga_negara_ibu' => $warga_negara_ibu,
          'nomor_telepon_ibu' => $nomor_telepon_ibu,
          'pendapatan_ibu' => $pendapatan_ibu
        ]);

      $affected = DB::table('user')
        ->where('id', $id)
        ->update(['no_telp' => $no_telp]);

      // if (File::exists(public_path('storage/ijazah/' . $ijazah_old))) {
      //   File::delete(public_path('storage/ijazah/' . $ijazah_old));
      //   File::delete(public_path('storage/skhun/' . $skhun_old));
      //   File::delete(public_path('storage/kk/' . $kk_old));
      //   File::delete(public_path('storage/akta_kelahiran/' . $akta_kelahiran_old));
      //   File::delete(public_path('storage/foto/' . $foto_old));
      //   File::delete(public_path('storage/surat_keterangan_lulus/' . $surat_keterangan_lulus_old));
      // } else {
      //   dd('File does not exists.');
      // }

      return redirect()
        ->back()
        ->withInput()
        ->with([
          'success' => 'Sukses, Data Telah Di Upload !'
        ]);
    } catch (\Exception $e) {
      return redirect()
        ->back()
        ->withInput()
        ->with([
          'error' => 'Error, Data Tidak Terupload !'
        ]);
    }

  }
  public function formulir_pendaftaran()
  {

    if (session()->get('loggin') == true) {
      $user_siswa=User::where('id','=',session()->get('id'))->join('user_detail', 'user_detail.id_user_detail', '=', 'user.id')->first();
      return view('siswa.formulir', compact('user_siswa'));
    } else {
      return redirect()
        ->route('login_web')
        ->with([
          'error' => 'Sesi Anda berakhir !'
        ]);
    }
  }
  public function formulir_proses(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'ijazah' => "required",
      'skhun' => "required",
      'kk' => "required",
      'akta_kelahiran' => "required",
      'foto' => "required",
      'surat_keterangan_lulus' => "required"
    ]);

    if ($validator->fails()) {
      return redirect()
        ->back()
        ->withInput()
        ->with([
          'error' => 'Error, Data Tidak Terupload !'
        ]);
    }



    $nama_lengkap = $request->nama_lengkap;
    $nama_panggilan = $request->nama_panggilan;
    $no_telp = $request->no_telp;
    $sekolah_asal = $request->sekolah_asal;
    $jenis_kelamin = $request->jenis_kelamin;
    $tempat_lahir = $request->tempat_lahir;
    $tanggal_lahir = $request->tanggal_lahir;
    $agama = $request->agama;
    $kewarganegaraan = $request->kewarganegaraan;
    $status_kekeluargaan = $request->status_kekeluargaan;
    $anak_ke = $request->anak_ke;
    $saudara_kandung = $request->saudara_kandung;
    $saudara_tiri = $request->saudara_tiri;
    $nik = $request->nik;
    $alamat = $request->alamat;
    $rt_rw = $request->rt_rw;
    $kelurahan = $request->kelurahan;
    $kecamatan = $request->kecamatan;
    $kabupaten = $request->kabupaten;
    $provinsi = $request->provinsi;
    $kode_pos = $request->kode_pos;
    $id = $request->id;
    $jalur_pendaftaran = $request->jalur_pendaftaran;
    $nilai_ipa = $request->nilai_ipa;
    $nilai_ips = $request->nilai_ips;
    $nilai_matematika = $request->nilai_matematika;
    $nilai_bahasa_inggris = $request->nilai_bahasa_inggris;
    $nilai_bahasa_indonesia = $request->nilai_bahasa_indonesia;
    $id_baju_batik = $request->id_baju_batik;
    $id_baju_olahraga = $request->id_baju_olahraga;
    $ijazah_old = $request->ijazah_old;
    $skhun_old = $request->skhun_old;
    $kk_old = $request->kk_old;
    $akta_kelahiran_old = $request->akta_kelahiran_old;
    $foto_old = $request->foto_old;
    $surat_keterangan_lulus_old = $request->surat_keterangan_lulus_old;

    $nama_ayah = $request->nama_ayah;
    $tempat_lahir_ayah = $request->tempat_lahir_ayah;
    $tanggal_lahir_ayah = $request->tanggal_lahir_ayah;
    $agama_ayah = $request->agama_ayah;
    $pendidikan_ayah = $request->pendidikan_ayah;
    $pekerjaan_ayah = $request->pekerjaan_ayah;
    $warga_negara_ayah = $request->warga_negara_ayah;
    $nomor_telepon_ayah = $request->nomor_telepon_ayah;
    $pendapatan_ayah = $request->pendapatan_ayah;
    $nama_ibu = $request->nama_ibu;
    $tempat_lahir_ibu = $request->tempat_lahir_ibu;
    $tanggal_lahir_ibu = $request->tanggal_lahir_ibu;
    $agama_ibu = $request->agama_ibu;
    $pendidikan_ibu = $request->pendidikan_ibu;
    $pekerjaan_ibu = $request->pekerjaan_ibu;
    $warga_negara_ibu = $request->warga_negara_ibu;
    $nomor_telepon_ibu = $request->nomor_telepon_ibu;
    $pendapatan_ibu = $request->pendapatan_ibu;





    $name_ijazah = $request->file('ijazah')->getClientOriginalName();

    $path_ijazah = $request->file('ijazah')->store('public/ijazah');

    $name_skhun = $request->file('skhun')->getClientOriginalName();

    $path_skhun = $request->file('skhun')->store('public/skhun');

    $name_kk = $request->file('kk')->getClientOriginalName();

    $path_kk = $request->file('kk')->store('public/kk');

    $name_akta_kelahiran = $request->file('akta_kelahiran')->getClientOriginalName();

    $path_akta_kelahiran = $request->file('akta_kelahiran')->store('public/akta_kelahiran');

    $name_foto = $request->file('foto')->getClientOriginalName();

    $path_foto = $request->file('foto')->store('public/foto');

    $name_surat_keterangan_lulus = $request->file('surat_keterangan_lulus')->getClientOriginalName();

    $path_surat_keterangan_lulus = $request->file('surat_keterangan_lulus')->store('public/surat_keterangan_lulus');

    $file_name_ijazah = str_replace("public/ijazah/", "", $path_ijazah);
    $file_name_skhun = str_replace("public/skhun/", "", $path_skhun);
    $file_name_kk = str_replace("public/kk/", "", $path_kk);
    $file_name_akta_kelahiran = str_replace("public/akta_kelahiran/", "", $path_akta_kelahiran);
    $file_name_foto = str_replace("public/foto/", "", $path_foto);
    $file_name_surat_keterangan_lulus = str_replace("public/surat_keterangan_lulus/", "", $path_surat_keterangan_lulus);




    try {

      $affected = DB::table('user_detail')
        ->where('id_user_detail', $id)
        ->update([
          'nama_lengkap' => $nama_lengkap,
          'nama_panggilan' => $nama_panggilan,
          'sekolah_asal' => $sekolah_asal,
          'jenis_kelamin' => $jenis_kelamin,
          'tempat_lahir' => $tempat_lahir,
          'tanggal_lahir' => $tanggal_lahir,
          'agama' => $agama,
          'kewarganegaraan' => $kewarganegaraan,
          'status_kekeluargaan' => $status_kekeluargaan,
          'anak_ke' => $anak_ke,
          'saudara_kandung' => $saudara_kandung,
          'saudara_tiri' => $saudara_tiri,
          'NIK' => $nik,
          'alamat' => $alamat,
          'rt_rw' => $rt_rw,
          'kelurahan' => $kelurahan,
          'kecamatan' => $kecamatan,
          'kabupaten' => $kabupaten,
          'provinsi' => $provinsi,
          'kode_pos' => $kode_pos,
          'ijazah' => $file_name_ijazah,
          'skhun' => $file_name_skhun,
          'kk' => $file_name_kk,
          'akta_kelahiran' => $file_name_akta_kelahiran,
          'foto' => $file_name_foto,
          'surat_keterangan_lulus' => $file_name_surat_keterangan_lulus,
          'id_status_terdaftar' => '2',
          'jalur_pendaftaran' => $jalur_pendaftaran,
          'nilai_ipa' => $nilai_ipa,
          'nilai_ips' => $nilai_ips,
          'nilai_matematika' => $nilai_matematika,
          'nilai_bahasa_inggris' => $nilai_bahasa_inggris,
          'nilai_bahasa_indonesia' => $nilai_bahasa_indonesia,
          'id_baju_batik' => $id_baju_batik,
          'id_baju_olahraga' => $id_baju_olahraga,
          'nama_ayah' => $nama_ayah,
          'tempat_lahir_ayah' => $tempat_lahir_ayah,
          'tanggal_lahir_ayah' => $tanggal_lahir_ayah,
          'agama_ayah' => $agama_ayah,
          'pendidikan_ayah' => $pendidikan_ayah,
          'pekerjaan_ayah' => $pekerjaan_ayah,
          'warga_negara_ayah' => $warga_negara_ayah,
          'nomor_telepon_ayah' => $nomor_telepon_ayah,
          'pendapatan_ayah' => $pendapatan_ayah,
          'nama_ibu' => $nama_ibu,
          'tempat_lahir_ibu' => $tempat_lahir_ibu,
          'tanggal_lahir_ibu' => $tanggal_lahir_ibu,
          'agama_ibu' => $agama_ibu,
          'pendidikan_ibu' => $pendidikan_ibu,
          'pekerjaan_ibu' => $pekerjaan_ibu,
          'warga_negara_ibu' => $warga_negara_ibu,
          'nomor_telepon_ibu' => $nomor_telepon_ibu,
          'pendapatan_ibu' => $pendapatan_ibu
        ]);

      $affected = DB::table('user')
        ->where('id', $id)
        ->update(['no_telp' => $no_telp]);

      // if (File::exists(public_path('storage/ijazah/' . $ijazah_old))) {
      //   File::delete(public_path('storage/ijazah/' . $ijazah_old));
      //   File::delete(public_path('storage/skhun/' . $skhun_old));
      //   File::delete(public_path('storage/kk/' . $kk_old));
      //   File::delete(public_path('storage/akta_kelahiran/' . $akta_kelahiran_old));
      //   File::delete(public_path('storage/foto/' . $foto_old));
      //   File::delete(public_path('storage/surat_keterangan_lulus/' . $surat_keterangan_lulus_old));
      // } else {
      //   dd('File does not exists.');
      // }

      return redirect()
        ->back()
        ->withInput()
        ->with([
          'success' => 'Sukses, Data Telah Di Upload !'
        ]);
    } catch (\Exception $e) {
      return redirect()
        ->back()
        ->withInput()
        ->with([
          'error' => 'Error, Data Tidak Terupload !'
        ]);
    }
  }
  // echo $nama_lengkap;
  // echo "<br>";
  // echo $nama_panggilan;
  // echo "<br>";
  // echo $jenis_kelamin;
  // echo "<br>";
  // echo $tempat_lahir;
  // echo "<br>";
  // echo $tanggal_lahir;
  // echo "<br>";
  // echo $agama;
  // echo "<br>";
  // echo $kewarganegaraan;
  // echo "<br>";
  // echo $status_kekeluargaan;
  // echo "<br>";
  // echo $anak_ke;
  // echo "<br>";
  // echo $saudara_kandung;
  // echo "<br>";
  // echo $saudara_tiri;
  // echo "<br>";
  // echo $nik;
  // echo "<br>";
  // echo $alamat;
  // echo "<br>";
  // echo $rt_rw;
  // echo "<br>";
  // echo $kelurahan;
  // echo "<br>";
  // echo $kecamatan;
  // echo "<br>";
  // echo $kabupaten;
  // echo "<br>";
  // echo $provinsi;
  // echo "<br>";
  // echo $kode_pos;



}
