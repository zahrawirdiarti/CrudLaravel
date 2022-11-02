<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class KontakController extends Controller
{

    public function index()
    {
        // mengambil data dari table
        $kontak = DB::table('kontak')->get();

        // mengirim data ke view
        return view('VKontak', ['kontak' => $kontak]);
    }

    public function tambah(Request $request)
    {
        DB::table('kontak')->insert([
            'kd_kontak' => $request->kd_kontak,
            'nama_kontak' => $request->nama_kontak,

        ]);
        // alihkan halaman ke halaman kontak
        return redirect('/kontak');
    }

    public function update(Request $request, $id)
    {
        DB::table('kontak')->where('kd_kontak', $id)->update([
            'nama_kontak' => $request->nama_kontak
        ]);
        // alihkan halaman ke halaman kontak
        return redirect('/kontak');
    }

    public function delete($id)
    {
        DB::table('kontak')->where('kd_kontak', $id)->delete();
        // alihkan halaman ke halaman kontak
        return redirect('/kontak');
    }
}