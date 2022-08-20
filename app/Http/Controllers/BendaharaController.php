<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BendaharaController extends Controller
{
    //
    protected $bendaharaService;

    public function __construct()
    {
        $this->bendaharaService = ;
    }

    public function index()
    {
        return view('pages.admin.bendahara.index');
    }
}
