<?php

namespace App\Http\Controllers;

use App\Kd_virtues;
use Illuminate\Http\Request;

class Kd_virtuesController extends Controller
{
    public function index()
    {
        $profile =  Kd_virtues::all();

        return response()->json($profile);
    }
}