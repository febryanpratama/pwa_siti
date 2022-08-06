<?php

namespace App\Services;

use App\Models\Guru;
use App\Models\Kelas;

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
}
