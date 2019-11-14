<?php

namespace App\Http\Controllers;

use App\Answer_student;
use Illuminate\Http\Request;

class Answer_studentController extends Controller
{
    public function index()
    {
        $answer =  Answer_student::all();

        return response()->json($answer);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'webuser_id' => 'required|integer',
            'soal' => 'required|integer',
            'jawaban' => 'required|integer'
        ]);

        $webuser_id = $request->get('webuser_id');
        $soal = $request->input('soal');
        $jawaban = $request->input('jawaban');

        $data = [
            'webuser_id' => $webuser_id,
            'soal' => $soal,
            'jawaban' => $jawaban
        ];

        $answer = Answer_student::create($data);

        if($answer) {
            $response = [
                "message" => "Success_insert_data",
                "results" => $data,
                "code" => 200
            ];
        } else {
            $response = [
                "message" => "Failed_insert_data",
                "results" => $data,
                "code" => 400
            ];
        }

        return response()->json($response, $response['code']);
    }
}