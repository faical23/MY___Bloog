<?php

namespace App\Http\Controllers\Auth;

use App\Models\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
        public function index()
        {
            return view('/post');
        }
        public function store(Request $request){
            ///// ===> validation regix form
            $valide = $this->validate($request,[
                "post_titre" => 'required',
                'post_topic' => 'required',
                'post_description' => 'required']
            );
            $post = new post(
                [
                    'post_titre' => $request->post_titre,
                    "post_topic" => $request->post_topic,
                    'post_img' => $request->post_img,
                    'post_description' => $request->post_description,
                    "post_like" => $request->post_like,
                    'post_ID' => $request->post_ID
                ]
            );
            $NewPost = $post->save();
            if($NewPost){
                return response()->json([
                    'message' => 'valide post'
                ]);
            }
            else{
                return response()->json([
                    'message' => 'post not valide'
                ]);
            }
    }
}
