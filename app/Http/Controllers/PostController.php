<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.index', ['posts'=> $posts ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate
        $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'image' => ['nullable', 'file', 'max:3000', 'mimes:webp,png,jpg']
        ]);
        // Store image if exists
        $path = null;
        if($request->hasFile('image')) {
            $path = Storage::disk('public')->put('posts_images', $request->image);
        }
        // Create a post
        $post = Auth::user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path
        ]);


        // Send email when users create a post (for practice)
        // Mail::to(Auth::user())->send(new WelcomeMail(Auth::user(), $post));

        // Redirect back to dashboard
        return back()->with('success', 'Your post was created.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show' , ['post' => $post ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {


                // Validate
                $fields = $request->validate([
                    'title' => ['required', 'max:255'],
                    'body' => ['required'],
                    'image' => ['nullable', 'file', 'max:3000', 'mimes:webp,png,jpg']
                ]);
                // Store image if exists
                $path = $post->image ?? null; // if image exists, store it
                if($request->hasFile('image')) {
                    if ($post->image){
                        $path = Storage::disk('public')->put('posts_images', $request->image);
                    }
                }
                // Update a post
                $post->update([
                    'title' => $request->title,
                    'body' => $request->body,
                    'image' => $path
                ]);
                // Redirect back to dashboard
                return redirect()->route('dashboard')->with('success', 'Your post was created.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Gate::authorize('modify', $post);
        // Delete image if  exists
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        // Delete the post
        $post->delete();
        return back()->with('delete','Your post was deleted!');
    }
}
