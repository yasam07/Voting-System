<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','asc')->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:50|unique:posts,name',
            'status'=>'required|boolean',
        ]);

        Post::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.posts.index')
            ->with('success','Post created successfully');
    }


    public function edit(Post $post)
    {

        return view('admin.posts.update', compact('post'));
    }

    public function update(Post $post, Request $request){
        $request->validate([
           'name' => [
            'required',
            'string',
            'max:50',
            Rule::unique('posts')->ignore($post->id),
        ],
            'status'=>'required|boolean',
        ]);

        $post->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.posts.index')
            ->with('success','Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('success','Post deleted successfully');

    }
}
