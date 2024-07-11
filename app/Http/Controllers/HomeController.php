<?php

namespace App\Http\Controllers;

use App\Models\kost;
use App\Models\User;
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
        $kost = kost::all();
        return view('user.home', compact('kost'));
    }

    public  function list()
    {
        $kost = kost::all();
        return view('user.kost', compact('kost'));
    }

    public function detail($id)
    {
        $kost = kost::find($id);
        return view('user.detail', compact('kost'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
