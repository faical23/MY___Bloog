<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request; //// les https request
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function index()
    {
        return view('/inscription');
    }
    public function store(Request $request)
    {
        $validation = Validator::make(FacadesRequest::all(), [

            "name" => 'required|regex:/^[a-zA-Z]\w{3,}+$/',
            'email' => ['required', 'email'],
            'password' => 'required|regex:^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^'
        ]);
        if ($validation->fails()) {

            return response()->json([
                "message" => "not valide"
            ]);
        } else {
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
