<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Ijazah;
use App\Models\siswa;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlumniController extends Controller
{
    //

    public function index()
    {
        //
        $alumni = siswa::where('status_siswa', 'Alumni')->get();
        $guru = Guru::get();

        // dd($alumni);

        return view('pages.admin.alumni.index', [
            'title' => 'Data Alumni',
            'alumni' => $alumni,
            'guru' => $guru
        ]);
    }

    public function getAlumni()
    {
        $siswa = Siswa::get();

        $spp = [];
        foreach ($siswa as $key) {
            $data = Spp::where('siswa_id', $key->id)->count();

            if ($data >= 18) {
                $dataSiswa = Spp::firstWhere('siswa_id', $key->id);
                $spp[] = $dataSiswa->siswa_id;
            }
        }

        foreach ($spp as $item) {
            $data = Siswa::find($item);
            $data->status_siswa = 'Alumni';
            $data->save();
        }

        return redirect('admin/alumni')->with('success', 'Data berhasil diupdate');
        // dd($spp);
    }

    public function storeIjazah(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nomor_ijazah' => 'required',
            'nomor_skhun' => 'required',
            'siswa_id' => 'required',
            'guru_id' => 'required',
            'tanggal_penyerahan' => 'required',
        ]);

        if ($validator->fails()) {
            # code...
            return back()->with('error', 'Data tidak boleh kosong');
        }

        Ijazah::create([
            'no_ijazah' => $request->nomor_ijazah,
            'no_skhun' => $request->nomor_skhun,
            'siswa_id' => $request->siswa_id,
            'guru_id' => $request->guru_id,
            'tanggal_penyerahan' => $request->tanggal_penyerahan,
        ]);

        return back()->with('success', 'Data berhasil disimpan');
    }

    public function pelunasan(Request $request)
    {
        // dd($request->all());
        $data = Spp::where('siswa_id', $request->siswa_id)->get();

        foreach ($data as $item) {
            $firstSpp = Spp::firstWhere('id', $item->id)->update([
                'tanggal_pembayaran' => date('Y-m-d'),
                'total_pembayaran' => $item->nominal_bayar,
                'sisa_bayar' => 0,
                'keterangan' => 'Pelunasan',
                'status_pembayaran' => 'Lunas',
            ]);
        }

        return back()->with('success', 'Berhasil Melakukan Pelunasan');
    }
}
