<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\FavoritePost;
use Illuminate\Http\Request;

class FavoritePostController extends Controller
{
    public function index(Request $request)
    {
        FavoritePost::create($request->all());

        session()->flash('success','Post has been added to your favorites');
        return back();
    }
}
