<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            return redirect('admin/dashboard');
        } elseif ($user->hasRole('Bendahara')) {
            return redirect('bendahara');
        } elseif ($user->hasRole('Kepsek')) {
            return redirect('kepsek');
        } elseif ($user->hasRole('User')) {
            return redirect('user');
        } else {
            abort(403);
        }
    }
}
