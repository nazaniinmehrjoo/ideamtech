<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class BlogController extends Controller
{
    public function publicIndex(Request $request)
    {
        $locale = app()->getLocale();
        
        
        $selectedCategory = $request->input('category');
    
        
        $query = Post::latest();
        if (!empty($selectedCategory)) {
            $query->where('category->en', $selectedCategory)
                  ->orWhere('category->fa', $selectedCategory);
        }
        $posts = $query->paginate(10);
    
        // Translate fields
        $posts->getCollection()->transform(function ($post) use ($locale) {
            $post->title = $post->getTranslatedtitle($locale);
            $post->content = $post->getTranslatedcontent($locale);
            $post->category = $post->getTranslatedcategory($locale);
            return $post;
        });
    
        // Fetch distinct categories
        $categories = Post::select('category')->distinct()->get()->map(function ($category) use ($locale) {
            $category->category = $category->getTranslatedcategory($locale);
            return $category->category;
        });
    
        return view('blog.blogs', compact('posts', 'categories', 'selectedCategory'));
    }
    


    public function index()
    {
        $locale = app()->getLocale();
        $posts = Post::latest()->paginate(6); 

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

    public function store(Request $request, $locale)
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

        return redirect()->route('blog.index', ['locale' => $locale])
            ->with('success', 'Post created successfully!');
    }
    public function show($locale, Post $post)
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



    public function edit($locale, $id)
    {
        $post = Post::with('images')->findOrFail($id);

        return view('blog.edit', compact('post'))->with('locale', $locale);
    }


    public function update(Request $request, $locale, $id)
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

        // Handle main image replacement
        if ($request->hasFile('main_image')) {
            if ($post->image) {
                \Storage::disk('public')->delete($post->image);
            }
            $post->image = $request->file('main_image')->store('posts', 'public');
        }

        // Handle additional images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('posts', 'public');
                PostImage::create(['post_id' => $post->id, 'image_path' => $path]);
            }
        }

        return redirect()->route('blog.index', ['locale' => $locale])->with('success', 'Post updated successfully!');
    }

    public function destroy($locale, Post $post)
    {
        try {
            // Delete main image if it exists
            if ($post->image) {
                \Storage::disk('public')->delete($post->image);
            }

            // Delete additional images
            foreach ($post->images as $image) {
                \Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }

            // Delete the post
            $post->delete();
        } catch (\Exception $e) {
            return redirect()->route('blog.index', ['locale' => $locale])
                ->with('error', 'Error deleting post.');
        }

        return redirect()->route('blog.index', ['locale' => $locale])
            ->with('success', 'Post deleted successfully!');
    }

}
