<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    private $request;

    /**
     * Create a new controller instance.
     * 
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Create a new token.
     * 
     * @param \App\User $user
     * @return string
     */
    public function profile()
    {
        return response()->json(['user' => Auth::user()], 201);
    }

    public function inde()
    {
        $user = User::all();

        return response()->json([
            'status' => 'Success',
            'data' => $user
        ], 200);
    }
}
