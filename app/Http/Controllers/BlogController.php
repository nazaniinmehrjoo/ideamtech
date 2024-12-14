<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function publicIndex()
    {
        $locale = app()->getLocale();
        $posts = Post::latest()->paginate(10);

        // Map translated fields (optional)
        $posts->getCollection()->transform(function ($post) use ($locale) {
            $post->title = $post->getTranslatedtitle($locale);
            $post->content = $post->getTranslatedcontent($locale);
            $post->category = $post->getTranslatedcategory($locale);
            return $post;
        });

        return view('blog.blogs', compact('posts'));
    }


    public function index()
    {
        $locale = app()->getLocale();
        $posts = Post::latest()->paginate(6); // 6 posts per page

        // Map translated fields (optional)
        $posts->getCollection()->transform(function ($post) use ($locale) {
            $post->title = $post->getTranslatedtitle($locale);
            $post->content = $post->getTranslatedcontent($locale);
            $post->category = $post->getTranslatedcategory($locale);
            return $post;
        });

        return view('blog.index', compact('posts'));
    }
    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|array',
            'title.en' => 'required|string|max:255',
            'title.fa' => 'nullable|string|max:255',
            'category' => 'required|array',
            'category.en' => 'required|string|max:255',
            'category.fa' => 'nullable|string|max:255',
            'content' => 'required|array',
            'content.en' => 'required|string',
            'content.fa' => 'nullable|string',
            'main_image' => 'nullable|image|max:40960',
            'images.*' => 'nullable|image|max:40960',
        ]);

        if ($request->hasFile('main_image')) {
            $data['image'] = $request->file('main_image')->store('posts', 'public');
        }

        $post = Post::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('posts', 'public');
                PostImage::create(['post_id' => $post->id, 'image_path' => $path]);
            }
        }

        return redirect()->route('blog.index')->with('success', 'Post created successfully!');
    }
    public function show(Post $post)
    {
        $locale = app()->getLocale();

        $post->title = $post->getTranslatedtitle($locale);
        $post->content = $post->getTranslatedcontent($locale);
        $post->category = $post->getTranslatedcategory($locale);

        $latestPosts = Post::latest()->take(5)->get()->map(function ($latestPost) use ($locale) {
            $latestPost->title = $latestPost->getTranslatedtitle($locale);
            return $latestPost;
        });

        $categories = Post::select('category')->distinct()->get()->map(function ($category) use ($locale) {
            $category->category = $category->getTranslatedcategory($locale);
            return $category;
        });

        return view('blog.show', compact('post', 'latestPosts', 'categories'));
    }


    public function edit($id)
    {
        $post = Post::with('images')->findOrFail($id);
        return view('blog.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|array',
            'title.en' => 'required|string|max:255',
            'title.fa' => 'nullable|string|max:255',
            'category' => 'required|array',
            'category.en' => 'required|string|max:255',
            'category.fa' => 'nullable|string|max:255',
            'content' => 'required|array',
            'content.en' => 'required|string',
            'content.fa' => 'nullable|string',
            'main_image' => 'nullable|image|max:40960',
            'images.*' => 'nullable|image|max:40960',
        ]);

        $post->update($data);

        if ($request->hasFile('main_image')) {
            if ($post->image) {
                \Storage::disk('public')->delete($post->image);
            }
            $post->image = $request->file('main_image')->store('posts', 'public');
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('posts', 'public');
                PostImage::create(['post_id' => $post->id, 'image_path' => $path]);
            }
        }

        return redirect()->route('blog.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            \Storage::disk('public')->delete($post->image);
        }

        foreach ($post->images as $image) {
            \Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Post deleted successfully!');
    }
}
