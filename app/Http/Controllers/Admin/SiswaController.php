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
            // 'user_id' => 'required',
            'nisn' => 'required',
            'nis' => 'required',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'nik_siswa' => 'required',
            'nokk_siswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'anak_ke' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'nomor_ujian_smp' => 'required',
            'nomor_ijazah' => 'required',
            'nomor_skhun' => 'required',
            'nama_ortu' => 'required',
            'telpon_siswa' => 'required',
            'telpon_ortu_siswa' => 'required',
            'bahasa_indonesia' => 'required',
            'bahasa_inggris' => 'required',
            'matematika' => 'required',
            'ipa' => 'required',
        ]);

        if ($validator->fails()) {
            # code...
            // dd($validator->errors());
            // dd('false');
            return back()->withErrors($validator->errors())->with('error','Gagal Menambahkan Data');
        }
        // dd($request->all());

        $data = $request->all();
        siswa::create($data);

        return back()->with('success', 'Berhasil Menambahkan Data Siswa');
    }
}
