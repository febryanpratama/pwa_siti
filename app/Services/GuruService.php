<?php

namespace App\Services;

use App\Models\Guru;
use GuzzleHttp\Psr7\Request;

class GuruService
{
    public function getGuru()
    {
        $title = "Guru";

        $data = Guru::with('kelas')->get();

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
}
