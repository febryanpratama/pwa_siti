<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //

    public function update(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
        ]);

        $data = Setting::first();

        if ($data == null) {
            // dd("gak ada");
            Setting::create([
                'tahun_ajaran_id' => $request->tahun_ajaran_id,
            ]);
        } else {
            // dd($data);
            $data->update([
                'tahun_ajaran_id' => $request->tahun_ajaran_id,
            ]);
        }

        return back()->with('success', 'Setting berhasil disimpan');
    }
}
