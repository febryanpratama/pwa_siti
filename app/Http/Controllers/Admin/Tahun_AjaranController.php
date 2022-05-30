<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tahun_ajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Tahun_AjaranController extends Controller
{
    //
    public function index(){
        $title = "Tahun Ajaran";
        $data = tahun_ajaran::get();
        return view('pages.admin.tahun_ajaran.index', compact(['title','data']));

    }


    public function tambah(Request $request){
        $data = $request->except('_token');
        // dd($data);
        $validator = Validator::make($request->all(), [
            'tahun_ajaran' => 'required',
            'semester' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('error','Gagal Menambahkan Data');
        }

        tahun_ajaran::create($data);
        return back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'tahunajaran_id' => 'required|numeric|exists:tahun_ajarans,id',
            'tahun_ajaran' => 'required',
            'semester' => 'required|in:Genap,Ganjil',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('error','Gagal Mengubah Data');
        }

        $data = $request->except('_token', 'tahunajaran_id');
        tahun_ajaran::where('id', $request->tahunajaran_id)->update($data);

        return back()->with('success', 'Berhasil Mengubah Data');

    }

    public function delete(Request $request){
        $validator = Validator::make($request->all(), [
            'tahunajaran_id' => 'required|numeric|exists:tahun_ajarans,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('error','Gagal Menghapus Data');
        }
        tahun_ajaran::where('id', $request->tahunajaran_id)->delete();
        return back()->with('success', 'Berhasil Menghapus Data');


    }


}
