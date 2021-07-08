<?php

namespace App\Http\Controllers\Auth;

use Throwable;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request; //// les https request
use Illuminate\Support\Facades\Request as FacadesRequest;

class AuthController extends Controller
{

    public function index()
    {
        return view('/inscription');
    }
    public function get(Request $request){
        return response()->json([
            "message" => "email exist"
        ]);
    }

    public function store(Request $request)
    {

        $valide = $request->validate([

            "name" => ['required', 'regex:/^[a-zA-Z]\w{3,}+$/'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'regex:^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^']
        ]);
        if ($valide) {
            $user = new User(
                [
                    'name' => $request->name,
                    "email" => $request->email,
                    'password' => bcrypt($request->password)
                ]
            );
           $user->save();

            return response()->json([
                "message" => "valide"
            ]);
        }


    }
}
