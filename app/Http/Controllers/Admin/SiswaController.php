<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $title = "Data Siswa";
        $data = siswa::get();
        return view('pages.admin.siswa.index', compact(['data', 'title']));
    }

    public function FormSiswa()
    {
        $title = "Tambah Data Siswa";
        return view('pages.admin.siswa.form', [
            'title' => $title
        ]);
    }

    public function tambah(Request $request)
    {
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
            // dd($validator->errors());
            // dd('false');
            return back()->withErrors($validator->errors())->with('error', 'Gagal Menambahkan Data');
        }
        // dd($request->all());

        $data = $request->all();
        // dd($data);
        siswa::create($data);

        return redirect('admin/siswa')->with('success', 'Berhasil Menambahkan Data Siswa');
    }

    public function FormEdit($siswa_id)
    {
        // dd($siswa_id);
        //  $data= siswa::find($siswa_id);
        // dd($data);
        $data = siswa::where('id', $siswa_id)->first();
        // dd($data);
        return view('pages.admin.siswa.edit', compact(['data']));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $data = $request->except('_token', 'siswa_id');
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
            // dd($validator->errors());
            // dd('false');
            return back()->withErrors($validator->errors())->with('error', 'Gagal Menambahkan Data');
        }
        siswa::where('id', $request->siswa_id)->update($data);

        return back()->with('success', 'Berhasil Mengubah Data');
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'siswa_id' => 'required|numeric|',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('error', 'Gagal Menghapus Data');
        }
        // dd($request->all());
        siswa::where('id', $request->siswa_id)->delete();
        return back()->with('success', 'Berhasil Menghapus Data');
    }
}
