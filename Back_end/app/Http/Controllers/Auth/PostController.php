<?php

namespace App\Http\Controllers\Auth;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use SebastianBergmann\Environment\Console;

class PostController extends Controller
{
        public function index()
        {
            return view('/post');
        }
        public function create(Request $request){
            $valide = $request->validate([
                'post__titre' => 'required',
                'post__topic' => 'required',
                'post__description' => 'required',
                'post__img' => 'required',
                'post__likes' => 'required',
                'post__id' => 'required'
            ]);
            if($valide){
                $user = new post(
                    [
                        'post_titre' => $request->post__titre,
                        'post_topic' => $request->post__topic,
                        'post_description' => $request->post__description,
                        'post_img' => $request->post__img,
                        'post_like' => $request->post__likes,
                        'post_ID' => $request->post__id
                    ]
                );
               $user->save();
                return response()->json([
                    "message" => "valide_post"
                ]);
            }
        }
        public function show($userid){
            $post = DB::table('_post')
           ->where('post_ID', '=', $userid)
           ->orderByDesc('created_at')
           ->get();
            return response()->json([
                "post_users" => $post
            ]);
        }
        public function delete(){
            echo "delete";
        }
}
