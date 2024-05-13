<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('user:id,name')->get();

        return Inertia::render('Posts/Index', [
            'posts' => $posts,
        ]);
    }

    public function destroy(Post $post) {
        $post->delete();
        return to_route('posts.index');
    }

    public function trashed() {
        $posts = Post::onlyTrashed()->with('user:id,name')->get();

        return Inertia::render('Posts/Trashed', [
            'posts' => $posts,
        ]);
    }

    public function trashedDestroy(string $id) {
        $post = Post::onlyTrashed()->with('user:id,name')->first();
        $post->forceDelete();
        return to_route('posts.trashed');
    }

    public function trashedRestore(string $id) {
        $post = Post::onlyTrashed()->with('user:id,name')->first();
        $post->restore();
        return to_route('posts.trashed');
    }
}
