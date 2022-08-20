<?php

namespace App\Services;

use App\Models\DetailKelas;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\siswa;

class KelasService
{
    public function getKelas()
    {

        $title = "Kelas";
        $data = Kelas::with('guru')->get();
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
        Kelas::firstWhere('id', $data['kelas_id'])->delete();

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
        $data = Kelas::with('detail', 'detail.siswa')->where('id', $id)->firstOrFail();
        $siswa = siswa::get();

        $status = true;
        $message = "Success Ambil Data Detail Kelas";
        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'siswa' => $siswa,
            'title' => $title
        ];

        return $result;
    }

    public function siswaStore($data)
    {
        // dd($data);
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
