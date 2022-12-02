<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class DataPengumumanController extends Controller
{
    public function data_pengumuman_admin()
    {
        if (session()->get('loggin') == true) {
            $pengumumans = DB::table('pengumuman')->get();

            return view('admin.data_pengumuman', compact('pengumumans'));
        } else {
            return redirect()
                ->route('login_web')
                ->with([
                    'error' => 'Sesi Anda berakhir !'
                ]);
        }
    }

    public function data_pengumuman_admin_utama()
    {
        if (session()->get('loggin') == true) {
            $pengumumans = DB::table('pengumuman')->get();

            return view('admin_utama.data_pengumuman', compact('pengumumans'));
        } else {
            return redirect()
                ->route('login_web')
                ->with([
                    'error' => 'Sesi Anda berakhir !'
                ]);
        }
    }

    public function data_pengumuman_siswa()
    {
        if (session()->get('loggin') == true) {
            $pengumumans = DB::table('pengumuman')->get();

            return view('siswa.data_pengumuman', compact('pengumumans'));
        } else {
            return redirect()
                ->route('login_web')
                ->with([
                    'error' => 'Sesi Anda berakhir !'
                ]);
        }
    }

    public function store_pengumuman(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'foto_pengumuman' => "required"
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Error, Data Tidak Terupload !'
                ]);
        }

        $judul_pengumuman = $request->judul_pengumuman;
        $isi_pengumuman = $request->isi_pengumuman;
        $nama_penulis = $request->nama_penulis;
        $tanggal_pengumuman = $request->tanggal_pengumuman;

        $name_foto_pengumuman = $request->file('foto_pengumuman')->getClientOriginalName();

        $path_foto_pengumuman = $request->file('foto_pengumuman')->store('public/pengumuman');

        $file_name_foto_pengumuman = str_replace("public/pengumuman/", "", $path_foto_pengumuman);


        try {
            DB::transaction(function () use ($judul_pengumuman, $isi_pengumuman, $nama_penulis, $tanggal_pengumuman, $file_name_foto_pengumuman) {
                DB::insert("INSERT INTO pengumuman(judul_pengumuman,isi_pengumuman,nama_penulis, tanggal_pengumuman, foto_pengumuman) VALUES('$judul_pengumuman','$isi_pengumuman','$nama_penulis','$tanggal_pengumuman', '$file_name_foto_pengumuman')");
            });
            return redirect()
                ->route('data_pengumuman_admin')
                ->with([
                    'success' => 'Anda Berhasil Menambahkan Data !'
                ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Error, Data Anda Gagal Dimasukan !'
                ]);
        }
    }

    public function edit_pengumuman(Request $request)
    {


        // $validator = Validator::make($request->all(), [
        //     'foto_pengumuman' => "required"
        // ]);

        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withInput()
        //         ->with([
        //             'error' => 'Error, Data Tidak Terupload !'
        //         ]);
        // }

        $id_pengumuman = $request->id_pengumuman;
        $judul_pengumuman = $request->judul_pengumuman;
        $isi_pengumuman = $request->isi_pengumuman;
        $nama_penulis = $request->nama_penulis;
        $tanggal_pengumuman = $request->tanggal_pengumuman;
        $foto_pengumuman_old = $request->foto_pengumuman_old;

        // $name_foto_pengumuman = $request->file('foto_pengumuman')->getClientOriginalName();
        // echo var_dump($request->file('foto_pengumuman')->getClientOriginalName());
        // die();
        if ($request->file('foto_pengumuman')) {
            $path_foto_pengumuman = $request->file('foto_pengumuman')->store('public/pengumuman');

            $file_name_foto_pengumuman = str_replace("public/pengumuman/", "", $path_foto_pengumuman);
        }



        try {
            if ($request->file('foto_pengumuman')) {
                DB::transaction(function () use ($judul_pengumuman, $isi_pengumuman, $nama_penulis, $tanggal_pengumuman, $file_name_foto_pengumuman, $id_pengumuman) {
                    DB::update("UPDATE pengumuman SET judul_pengumuman='$judul_pengumuman', isi_pengumuman='$isi_pengumuman', nama_penulis='$nama_penulis', tanggal_pengumuman='$tanggal_pengumuman' , foto_pengumuman='$file_name_foto_pengumuman' WHERE id_pengumuman='$id_pengumuman'");
                });
            } else {
                DB::transaction(function () use ($judul_pengumuman, $isi_pengumuman, $nama_penulis, $tanggal_pengumuman,  $id_pengumuman) {
                    DB::update("UPDATE pengumuman SET judul_pengumuman='$judul_pengumuman', isi_pengumuman='$isi_pengumuman', nama_penulis='$nama_penulis', tanggal_pengumuman='$tanggal_pengumuman'  WHERE id_pengumuman='$id_pengumuman'");
                });
            }
            // if (File::exists(public_path('storage/pengumuman/' . $foto_pengumuman_old))) {
            //     File::delete(public_path('storage/pengumuman/' . $foto_pengumuman_old));
            // } else {
            //     dd('File does not exists.');
            // }

            return redirect()
                ->route('data_pengumuman_admin')
                ->with([
                    'success' => 'Anda Berhasil Mengupdate Data !'
                ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Error, Data Anda Gagal Diupdate !'
                ]);
        }
    }

    public function delete_pengumuman(Request $request)
    {
        $id_pengumuman = $request->id_pengumuman;
        $foto_pengumuman_old = $request->foto_pengumuman_old;

        // echo var_dump($foto_pengumuman_old);
        // die();


        try {

            DB::transaction(function () use ($id_pengumuman) {
                DB::update("DELETE FROM pengumuman WHERE id_pengumuman='$id_pengumuman'");
            });
            return redirect()
                ->route('data_pengumuman_admin')
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




    public function store_pengumuman_admin_utama(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto_pengumuman' => "required"
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Error, Data Tidak Terupload !'
                ]);
        }

        $judul_pengumuman = $request->judul_pengumuman;
        $isi_pengumuman = $request->isi_pengumuman;
        $nama_penulis = $request->nama_penulis;
        $tanggal_pengumuman = $request->tanggal_pengumuman;

        $name_foto_pengumuman = $request->file('foto_pengumuman')->getClientOriginalName();

        $path_foto_pengumuman = $request->file('foto_pengumuman')->store('public/pengumuman');

        $file_name_foto_pengumuman = str_replace("public/pengumuman/", "", $path_foto_pengumuman);



        try {
            DB::transaction(function () use ($judul_pengumuman, $isi_pengumuman, $nama_penulis, $tanggal_pengumuman, $file_name_foto_pengumuman) {
                DB::insert("INSERT INTO pengumuman(judul_pengumuman,isi_pengumuman,nama_penulis, tanggal_pengumuman, foto_pengumuman) VALUES('$judul_pengumuman','$isi_pengumuman','$nama_penulis','$tanggal_pengumuman', '$file_name_foto_pengumuman')");
            });
            return redirect()
                ->route('data_pengumuman_admin')
                ->with([
                    'success' => 'Anda Berhasil Menambahkan Data !'
                ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Error, Data Anda Gagal Dimasukan !'
                ]);
        }
    }

    public function edit_pengumuman_admin_utama(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'foto_pengumuman' => "required"
        // ]);

        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withInput()
        //         ->with([
        //             'error' => 'Error, Data Tidak Terupload !'
        //         ]);
        // }

        $id_pengumuman = $request->id_pengumuman;
        $judul_pengumuman = $request->judul_pengumuman;
        $isi_pengumuman = $request->isi_pengumuman;
        $nama_penulis = $request->nama_penulis;
        $tanggal_pengumuman = $request->tanggal_pengumuman;
        $name_foto_pengumuman = $request->file('foto_pengumuman')->getClientOriginalName();

        $path_foto_pengumuman = $request->file('foto_pengumuman')->store('public/pengumuman');

        $file_name_foto_pengumuman = str_replace("public/pengumuman/", "", $path_foto_pengumuman);
        // if ($_POST['foto'] == "") {

        // } else {

        // }
        try {
            DB::transaction(function () use ($judul_pengumuman, $isi_pengumuman, $nama_penulis, $tanggal_pengumuman, $file_name_foto_pengumuman, $id_pengumuman) {
                DB::update("UPDATE pengumuman SET judul_pengumuman='$judul_pengumuman', isi_pengumuman='$isi_pengumuman', nama_penulis='$nama_penulis', tanggal_pengumuman='$tanggal_pengumuman', foto_pengumuman='$file_name_foto_pengumuman' WHERE id_pengumuman='$id_pengumuman'");
            });
            // if (File::exists(public_path('storage/pengumuman/' . $foto_pengumuman_old))) {
            //     File::delete(public_path('storage/pengumuman/' . $foto_pengumuman_old));
            // } else {
            //     dd('File does not exists.');
            // }
            return redirect()
                ->route('data_pengumuman_admin')
                ->with([
                    'success' => 'Anda Berhasil Mengupdate Data !'
                ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Error, Data Anda Gagal Diupdate !'
                ]);
        }
    }

    public function delete_pengumuman_admin_utama(Request $request)
    {
        $id_pengumuman = $request->id_pengumuman;
        // echo var_dump($id_pengumuman);
        // die();
        try {

            DB::transaction(function () use ($id_pengumuman) {
                DB::delete("DELETE FROM pengumuman WHERE id_pengumuman='$id_pengumuman'");
            });
            return redirect()
                ->route('data_pengumuman_admin')
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
}
