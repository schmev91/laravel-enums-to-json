<?php
namespace SassLaravel\LaravelEnumsToJson\Http\Controllers;

use SassLaravel\LaravelEnumsToJson\Models\Post;

class PostController
{
    public function index()
    {
        return response()->json(Post::factory(10)->make());
    }
}
