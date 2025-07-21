<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // PostController.php
public function index()
{
    return view('posts.index', [
        'posts' => Post::latest()->with('user')->paginate(6)
    ]);
}

public function create()
{
    return view('posts.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'body' => 'required'
    ]);

    $request->user()->posts()->create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'body' => $request->body
    ]);

    return redirect()->route('home');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
