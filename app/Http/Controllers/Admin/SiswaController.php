<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    //
    public function index(){
        $data = siswa::get();
        return view('pages.admin.siswa.index', compact(['data']));
    }

    public function tambah(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_siswa' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama' => 'required',
            'telpon_siswa' => 'required',
            'angkatan' => 'required',
            'nama_ortu' => 'required',
            'telpon_ortu_siswa' => 'required',
        ]);

        if ($validator->fails()) {
            # code...
            return back()->withErrors($validator->errors())->with('error','Gagal Menambahkan Data');
        }

        $data = $request->all();
        siswa::create($data);

        return back()->with('success', 'Berhasil Menambahkan Data Siswa');
    }
}
