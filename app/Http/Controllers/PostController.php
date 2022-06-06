<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' =>  Post::latest()->filter(request(['search', 'category', 'user']))->paginate()->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $req = request()->validate([
            'title' => ['required', 'max:120'],
            'thumbnail' => ['required', 'image'],
            'excerpt' => ['required', 'max:120'],
            'body' => ['required', 'max:255'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        $req['user_id'] = auth()->id();
        $req['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($req);
        session()->flash('success', 'Post Created!');
        return back();
    }
}
