<?php

namespace App\Http\Controllers;

use App\Question_student;
use Illuminate\Http\Request;

class Question_studentController extends Controller
{
    public function index()
    {
        $question =  Question_student::all();

        return response()->json($question);
    }
}