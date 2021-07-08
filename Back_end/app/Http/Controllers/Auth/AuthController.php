<?php

namespace App\Http\Controllers\Auth;

use Throwable;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{

    public function index()
    {
        return view('/inscription');
    }
    public function login(Request $request){


        $valide = $request->validate([
            'email' => ['required','email','exists:users'],
            'password' => ['required', 'regex:^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^']
        ]);
        $user = User::where('email', '=', $request->email)->first();
        $password = Hash::check($request->password, $user->password);
        if($password) {
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                    'token' => $token,
                    'status' => 'user_login'
            ]);
        }
        else{
            return response()->json([
                "message" =>"password invalide",
            ]);
        }
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
