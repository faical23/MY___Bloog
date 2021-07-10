<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Commnet;

class CmnController extends Controller
{
    public function show($post_id){
        $commentaire = DB::table('commentaires')
        ->where('ID_post', '=', $post_id)
        ->orderByDesc('created_at')
        ->get();


        foreach($commentaire as $comnt){
            $user_commnt = DB::table('users')
            ->where('id', '=',  $comnt->ID_user)
            ->get();
            $comnt->user_created_commnt = $user_commnt[0]->name;
        }
         return response()->json([
             "commentaire" => $commentaire
         ]);
    }
    public function store(Request $request){
        $valide = $request->validate([
            'commnt' =>  'required'
        ]);
        Commnet::create(
            [
                'ID_user' => $request->user_id,
                'ID_post' =>  $request->ID_post,
                'commentaire' =>  $request->commnt,
            ]
        );

        return response()->json([
            "message" => "success",
        ]);
    }
}
