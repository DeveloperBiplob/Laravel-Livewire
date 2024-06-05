<?php

use App\Models\Comment;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $comments = Comment::latest()->get();
    return view('welcome', compact('comments'));
});
