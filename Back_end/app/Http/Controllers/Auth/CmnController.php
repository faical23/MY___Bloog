<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CmnController extends Controller
{
    public function show($post_id){
        $commentaire = DB::table('commentaires')
        ->where('ID_post', '=', $post_id)
        ->orderByDesc('created_at')
        ->get();
        
         return response()->json([
             "commentaire" => $commentaire
         ]);
    }
}
