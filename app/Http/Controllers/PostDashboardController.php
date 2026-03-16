<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use function Pest\Laravel\post;
use function Psy\sh;
use function Symfony\Component\String\s;

class PostDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->where('author_id', Auth::user()->id);

        if (request('simple-search')) {
            $posts->where('title', 'like', '%' . request('simple-search') . '%');
        }
        return view('dashboard.index', ['posts' => $posts->paginate(5)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation
        $validated = $request->validate([
            'title' => 'required|max:255|unique:posts',
            'body' => 'required|min:50',
            'category_id' => 'required|exists:categories,id'
        ]);

        Post::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'body' => $validated['body'],
            'category_id' => $validated['category_id'],
            'author_id' => Auth::user()->id
        ]);

        return redirect('/dashboard')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //validation
        $validated = $request->validate([
            'title' => 'required|max:255|unique:posts,title,' . $post->id,
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        //update post
        $post->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'body' => $validated['body'],
            'category_id' => $validated['category_id']
        ]);

        return redirect('/dashboard')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/dashboard')->with('success', 'Post deleted successfully!');
    }
}
