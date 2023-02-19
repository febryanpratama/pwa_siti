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
        Guru::create($data);

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
