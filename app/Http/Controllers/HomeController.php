<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\glavna;
use App\radnja;

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
        return view('home')->with(['radnje' => radnja::all(), 'pregledi' => glavna::orderBy('datum', 'ASC')->get()]);
    }
}
