<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\guest;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $guests = guest::all();
        return view('welcome', compact('guests'));
    }
}