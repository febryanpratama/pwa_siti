<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManajemenUserController extends Controller
{
    public function index(){
        return view('pages.admin.manajemen_siswa.index');
    }

    public function index_bendahara(){
        return view('pages.admin.manajemen_bendahara.index');
    }

    public function index_kepala_sekolah(){
        return view('pages.admin.manajemen_kepala_sekolah.index');
    }
}
