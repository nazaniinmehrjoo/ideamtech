<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function publicIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        
        return view('blog.blogs', compact('posts'));
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3); 

        return view('blog.index', compact('posts')); 
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ], [
            'title.required' => 'Please provide a title.',
            'content.required' => 'Post content is required.',
            'category.required' => 'Please select a category.',
            'image.image' => 'Please upload a valid image file.',
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public'); 
        }
    
        Post::create([
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'content' => $request->input('content'),
            'image' => $imagePath,
        ]);
    
        return redirect()->route('blog.index')->with('success', 'Post created successfully!');
    }

    // Display a single post
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $latestPosts = Post::orderBy('created_at', 'desc')->take(5)->get();
        $categories = Post::select('category')->distinct()->get();

        return view('blog.show', compact('post', 'latestPosts', 'categories'));
    }

    // Show the form for editing a post
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('blog.edit', compact('post'));
    }

    // Update the specified post in the database
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ], [
            'title.required' => 'Please provide a title.',
            'content.required' => 'Post content is required.',
            'category.required' => 'Please select a category.',
            'image.image' => 'Please upload a valid image file.',
        ]);
        // Find the post
        $post = Post::findOrFail($id);

        // Store the uploaded image if there is one and update the post
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image = $imagePath;
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category = $request->input('category');
        $post->save();

        return redirect()->route('blog.index')->with('success', 'تغیررات با موفقیت ثبت شد!');
    }

    // Remove the specified post from the database
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Post deleted successfully!');
    }
}
