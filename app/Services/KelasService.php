<?php

namespace App\Services;

use App\Models\DetailKelas;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\siswa;
use Illuminate\Support\Facades\Validator;

class KelasService
{
    public function getKelas()
    {

        $title = "Kelas";
        $data = Kelas::with('guru')->whereRelation('guru', 'deleted_at', null)->orderBy('kelas', 'ASC')->get();
        $guru = Guru::get();

        $status = true;
        $message = "Success Ambil Data Kelas";

        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'guru' => $guru,
            'title' => $title
        ];

        return $result;
    }

    public function store($data)
    {
        // dd($data);

        $check = Kelas::where('guru_id', $data['guru_id'])->get();

        if ($check->isNotEmpty()) {
            $status = false;
            $message = "Guru Sudah Memiliki Kelas";
            $result = [
                'status' => $status,
                'message' => $message
            ];
            return $result;
        }

        Kelas::create($data);
        $status = true;
        $message = "Success Tambah Data Kelas";
        $result = [
            'status' => $status,
            'message' => $message
        ];
        return $result;
    }

    public function update($data)
    {
        // dd($data);
        Kelas::firstWhere('id', $data['kelas_id'])->update($data);

        $status = true;
        $message = "Success Update Data Kelas";
        $result = [
            'status' => $status,
            'message' => $message
        ];

        return $result;
    }

    public function destroy($data)
    {
        $kelasDetail = Kelas::firstWhere('id', $data['kelas_id']);

        $detailKelas = DetailKelas::where('kelas_id', $kelasDetail->id)->forceDelete();

        $kelasDetail->delete();


        $status = true;
        $message = "Success Delete Data Kelas";
        $result = [
            'status' => $status,
            'message' => $message
        ];

        return $result;
    }

    public function getDetail($data, $id)
    {
        // dd($id);
        $title = "Siswa Kelas";
        $data = Kelas::where('id', $id)->first();
        $siswa = siswa::get();

        $kelas = Kelas::get();

        $status = true;
        // dd();
        // dd($data);
        $message = "Success Ambil Data Detail Kelas";
        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
            // 'id' => $id,
            'siswa' => $siswa,
            'title' => $title,
            'kelas' => $kelas,
        ];

        return $result;
    }

    public function siswaStore($data)
    {
        // dd($data);
        $validator = Validator::make($data, [
            'siswa_id' => 'required|numeric|unique:detail_kelas,siswa_id',
            // 'kelas_id' => 'required',
        ], [
            'siswa_id.unique' => 'Siswa Sudah Ada',
        ]);

        if ($validator->fails()) {
            # code...
            $status = false;
            $message = $validator->errors()->first();

            return [
                'status' => $status,
                'message' => $message
            ];
        }

        DetailKelas::create($data);
        $status = true;
        $message = "Success Tambah Data Siswa";
        $result = [
            'status' => $status,
            'message' => $message
        ];
        return $result;
    }

    public function GetdataSiswa($data)
    {
        // dd($data);
        $data = DetailKelas::with('siswa', 'kelas')->where('siswa_id', $data['siswa_id'])->first();

        // dd($data);

        if ($data == null) {
            # code...
            $status = false;
            $message = "Data Siswa Tidak Ditemukan";
            $result = [
                'status' => $status,
                'message' => $message,
                'data' => null
            ];
        } else {
            $status = true;
            $message = "Success Ambil Data Siswa";
            $result = [
                'status' => $status,
                'message' => $message,
                'data' => $data
            ];
        }

        // dd($result);
        return $result;
    }

    public function GetdataSiswaSpp($data)
    {
        $data = siswa::with('detailKelas')->where('id', $data['siswa_id'])->first();

        // dd($data);
        if ($data == null) {
            # code...
            $status = false;
            $message = "Data Siswa Tidak Ditemukan";
            $result = [
                'status' => $status,
                'message' => $message,
                'data' => null
            ];
        } else {
            $status = true;
            $message = "Success Ambil Data Siswa";
            $result = [
                'status' => $status,
                'message' => $message,
                'data' => $data
            ];
        }
        // dd($result);
        return $result;
    }
}
