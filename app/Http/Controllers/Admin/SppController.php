<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SppController extends Controller
{
    //
    public function index(){
        return view('pages.admin.spp.index');
    }
}
