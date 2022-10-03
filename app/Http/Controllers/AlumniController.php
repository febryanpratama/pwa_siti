<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    //

    public function index()
    {
        //
        $alumni = siswa::where('status_siswa', 'Alumni')->get();

        // dd($alumni);

        return view('pages.admin.alumni.index', [
            'title' => 'Data Alumni',
            'alumni' => $alumni
        ]);
    }
}
