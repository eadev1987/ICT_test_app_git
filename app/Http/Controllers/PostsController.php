<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::all();
        return view('admin.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $post = new Posts();
        $lowerRoute = strtolower($request->title);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->route = str_replace(' ', '_', $lowerRoute);
        $post->author = Auth::user()->name;
        $post->category_id = $request->category_id;

        $post->save();

        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Posts::find($id);

        return view('admin.edit_post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Posts::find($id);
        $lowerRoute = strtolower($request->title);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->route = str_replace(' ', '_', $lowerRoute);
        $post->author = Auth::user()->name;
        $post->category_id = $request->category_id;

        $post->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Posts::find($id)->delete();

        return back();
    }
}
