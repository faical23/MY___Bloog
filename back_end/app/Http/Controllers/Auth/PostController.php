<?php

namespace App\Http\Controllers\Auth;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    
        public function create(Request $request){
           $request->validate([
                'post__titre' => 'required',
                'post__topic' => 'required',
                'post__description' => 'required',
                'post__img' => 'required',
                'post__likes' => 'required',
                'post__id' => 'required'
            ]);
            post::create(
                    [
                        'post_titre' => $request->post__titre,
                        'post_topic' => $request->post__topic,
                        'post_description' => $request->post__description,
                        'post_img' => $request->post__img,
                        'post_like' => $request->post__likes,
                        'post_ID' => $request->post__id
                    ]
                );
                return response()->json([
                    "message" => "valide_post"
                ]);
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
        public function singlePost($postId){
            $post = DB::table('_post')
            ->where('id', '=', $postId)
            ->get();
             return response()->json([
                 "singlePost" => $post
             ]);
        }
        public function delete($id){
            $deletePost = post::where('id', $id)->delete();
            if($deletePost){
                return response()->json([
                    "delete" => "success"
                ]);
            }
            else{
                return response()->json([
                    "delete" => "refuse"
                ]);
            }

        }
        public function update(Request $request){
            $request->validate([
                'post__titre' => 'required',
                'post__topic' => 'required',
                'post__description' => 'required',
            ]);


            $update = post::where('id',$request->id__post)
            ->update(['post_titre' => $request->post__titre,'post_topic' => $request->post__topic,'post_description' => $request->post__description]);

            if($update){
                return response()->json([
                    "update" => 'success',
                ]);
            }



        }
        public function all_post(){
            $posts = DB::table('_post')
            ->orderByDesc('created_at')
            ->get();

            foreach($posts as $post){
                $commnt = DB::table('commentaires')
                ->where('ID_post', '=', $post->id)
                ->get();
                $post->commnt = count($commnt);
            }

            return response()->json([
                "all_post" => $posts,
            ]);
        }
}
