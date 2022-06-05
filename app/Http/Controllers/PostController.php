<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = new Post;
        $post->matricule = $request->input('matricule');
        $post->user_id = $request->input('user_id');
        $post->salle_id = $request->input('salle_id');
        $post->save();

        return response()->json([
            'status' => 200,
            'message' => 'Post créé avec succès',
        ]);
    }

    public function findAll(Request $request)
    {
        $posts = DB::table('post')
        ->join(
            'users',
            'users.id',
            '=',
            'post.user_id',
        )->join(
            'salle',
            'salle.id',
            '=',
            'post.salle_id'
        )->select(
            'post.id',
            'post.matricule',
            'post.user_id',
            'post.salle_id',
            'users.name as user_name',
            'salle.numero as salle_numero',
        )->get();

        return response()->json($posts);
    }


    public function update(Request $request, $id)
    {
        Post::where('id', $id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'updated succesfully',
        ]);
    }

    public function delete($id)
    {
        Post::destroy($id);

        return response()->json([
            'status' => 200,
            'message' => 'Service deleted succesfully',
        ]);
    }

    public function findCount()
    {
        $post = Post::count();
        return response()->json($post);
    }
}
