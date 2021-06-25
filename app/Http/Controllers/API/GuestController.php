<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\guest;

class GuestController extends Controller
{
    public function index() {

        $guest = guest::all();

        return response()->json([
            'success' => true,
            'results' => $guest
        ]);
    }
}
