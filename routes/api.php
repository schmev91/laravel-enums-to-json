<?php

use Illuminate\Support\Facades\Route;
use SassLaravel\LaravelEnumsToJson\Http\Controllers\PostController;

Route::get("posts", [PostController::class, "index"])->name("posts.index");
