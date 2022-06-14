<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\FavoritePost;
use App\Models\User;
use Illuminate\Http\Request;

class FavoritePostController extends Controller
{
    public function create(Request $request)
    {
        FavoritePost::create($request->all());

        session()->flash('success','Post has been added to your favorites');
        return back();
    }

    public function index(User $user)
    {
        // $favPosts = FavoritePost::where(['user_id' => $user->id])->get();
        $favPosts = $user->favoritePosts;

        $posts = collect($favPosts)->map(function ($post) {
            return $post = Post::where(['id' => $post->post_id])->first();
        });

        return view('favorites.index',[
            'posts' =>  $posts->toArray()
        ]);
    }

    public function delete(Request $request)
    {
        $favPost = FavoritePost::where(['post_id' => $request->post_id]);
        $favPost->delete();

        return redirect()->back();
    }
}
