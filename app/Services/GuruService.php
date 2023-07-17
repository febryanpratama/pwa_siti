<?php

namespace App\Services;

use App\Models\Guru;
use GuzzleHttp\Psr7\Request;

class GuruService
{
    public function getGuru()
    {
        $title = "Wali Kelas";

        $data = Guru::with('kelas')->orderBy('nama_guru', 'ASC')->get();

        // dd($data);

        $status = true;
        $message = "Success Ambil Data Guru";

        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'title' => $title
        ];

        return $result;
    }

    public function store($data)
    {

        // dd($data);
        $check = Guru::where('nip', $data['nip'])->first();

        if ($check) {
            $status = false;
            $message = "NIP sudah terdaftar";

            $result = [
                'status' => $status,
                'message' => $message
            ];

            return $result;
        }

        Guru::create($data);

        // dd($data);

        $status = true;
        $message = "Success Tambah Data Guru";

        $result = [
            'status' => $status,
            'message' => $message
        ];
        return $result;
    }

    public function update($data)
    {
        // dd($data);

        Guru::firstWhere('id', $data['guru_id'])->update($data);

        $result = [
            'status' => true,
            'message' => "Success Update Data Guru"
        ];

        return $result;
    }
}
