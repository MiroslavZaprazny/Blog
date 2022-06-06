<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Post $post)
    {
        $req = request()->validate([
            'title' => ['required', 'max:120'],
            'thumbnail' => ['image'],
            'excerpt' => ['required', 'max:120'],
            'body' => ['required', 'max:255'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if (isset($req['thumbnail'])) {
            $req['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($req);
        session()->flash('success', 'Post Updated!');
        return back();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('success', 'Post Deleted!');
        return back();
    }
}
