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
        $data = tahun_ajaran::get();
        return view('pages.admin.tahun_ajaran.index', compact(['data']));

    }


    public function tambah(Request $request){
        $data = $request->except('_token');
        // dd($data);
        $validator = Validator::make($request->all(), [
            // 'user_id' => 'required',
            'tahun_ajaran' => 'required',
            'semester' => 'required',
        ]);

        if ($validator->fails()) {
            // dd($validator->errors());
            // dd('false');
            return back()->withErrors($validator->errors())->with('error','Gagal Menambahkan Data');
        }
        tahun_ajaran::create($data);
        return back()->with('success', 'Berhasil Menambahkan Data');
    }


}
