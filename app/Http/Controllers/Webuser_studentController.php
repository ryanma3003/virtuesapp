<?php

namespace App\Http\Controllers;

use App\Webuser_student;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Webuser_studentController extends Controller
{
    public function __construct(Request $request)
    {
        $this->user = \Auth::user();
    }
    
    public function index()
    {
        $student =  Webuser_student::all();

        return response()->json($student);
    }

    public function store(Request $request)
    {
        $webuser_student = new \App\Webuser_student;

        $this->validate($request, [
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'answer5' => 'required',
            'answer6' => 'required',
            'answer7' => 'required'
        ]);

        $total1 = array_sum($request->input('answer1'));
        $total2 = array_sum($request->input('answer2'));
        $total3 = array_sum($request->input('answer3'));
        $total4 = array_sum($request->input('answer4'));
        $total5 = array_sum($request->input('answer5'));
        $total6 = array_sum($request->input('answer6'));
        $total7 = array_sum($request->input('answer7'));

        $rank = array();
        for($i=1;$i<=5;$i++){
            array_push($rank,array_sum($request->input("answer$i")));
        }

        $ranks = $rank;
        $primaries = array_keys($rank, max($rank));
        $primary = $primaries[0] + 1;
        array_splice($rank, $primaries[0], 1);

        $seconds = array_keys($rank, max($rank));
        $second = ($primaries[0] <= $seconds[0]) ? $seconds[0]+2 : $seconds[0]+1;
        array_splice($rank, $seconds[0], 1);

        $minors = array_keys($ranks, min($ranks));
        $minor = $minors[0]+1;

        $webuser_id = \Auth::user();
        // $webuser_id = $user->id;

        $data = [
            'webuser_id' => $webuser_id,
            's_v' => $total1,
            's_i' => $total2,
            's_r' => $total3,
            's_t' => $total4,
            's_u' => $total5,
            's_e' => $total6,
            's_s' => $total7,
            's_primary' => $primary,
            's_second' => $second,
            's_minor' => $minor
        ];

        $answer = $webuser_student->save($data);

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