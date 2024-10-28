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
        $posts = Post::latest()->paginate(3);
        return view('blog.blogs', compact('posts'));
    }

    public function index()
    {
        $posts = Post::latest()->paginate(6);
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
            'main_image' => 'nullable|image|max:40960', // Validation for main image
            'images.*' => 'nullable|image|max:40960',
        ]);
    
        $post = Post::create($request->only('title', 'category', 'content'));
    
        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $mainImagePath = $request->file('main_image')->store('posts', 'public');
            $post->main_image_path = $mainImagePath; // Set the main image path
            $post->save(); // Save the post with the main image
        }
    
        // Handle additional images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('posts', 'public');
                PostImage::create(['post_id' => $post->id, 'image_path' => $path]);
            }
        }
        \Log::info('Main Image Path:', ['path' => $mainImagePath]);

        return redirect()->route('blog.index')->with('success', 'Post created successfully with images!');
    }
    


    public function show($id)
    {
        $post = Post::with('images')->findOrFail($id);
        $latestPosts = Post::latest()->take(5)->get();
        $categories = Post::select('category')->distinct()->get();
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
        
        try {
            \Log::info('Starting validation for images upload.');
    
            $request->validate([
                'title' => 'required|max:255',
                'category' => 'required|max:255',
                'content' => 'required',
                'main_image' => 'nullable|image|max:40960', // Validate main image
                'images.*' => 'nullable|image|max:40960', // Validate additional images
            ], [
                'title.required' => 'Please provide a title.',
                'content.required' => 'Post content is required.',
                'category.required' => 'Please select a category.',
                'main_image.image' => 'Main image must be a valid image.',
                'main_image.max' => 'Main image must be 40 MB or less.',
                'images.*.image' => 'Each additional file must be a valid image.',
                'images.*.max' => 'Each additional image must be 40 MB or less.',
            ]);
    
            \Log::info('Validation passed for images upload.');
    
            // Update post details
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->category = $request->input('category');
    
            // Check if a new main image is uploaded
            if ($request->hasFile('main_image')) {
                $mainImagePath = $request->file('main_image')->store('posts', 'public');
                $post->image = $mainImagePath; // Update main image path
            }
    
            // Save the post details
            $post->save();
    
            // Handle additional images upload
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('posts', 'public');
                    PostImage::create([
                        'post_id' => $post->id,
                        'image_path' => $path,
                    ]);
                }
            }
            if ($request->has('delete_main_image')) {
                // Delete the main image from storage
                \Storage::disk('public')->delete($post->image);
                $post->image = null; // Set the main image to null in the database
            }
            // Handle deletion of marked images
            if ($request->has('delete_images')) {
                foreach ($request->input('delete_images') as $imageId) {
                    $image = PostImage::find($imageId);
                    if ($image) {
                        \Storage::disk('public')->delete($image->image_path);
                        $image->delete();
                    }
                }
            }
    
            return response()->json(['success' => true, 'message' => 'Post updated successfully with images!']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation Exception:', $e->errors());
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            \Log::error('General Exception during upload:', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'An unexpected error occurred during upload.'], 500);
        }
    }
    
    
    

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('blog.index')->with('success', 'Post deleted successfully!');
    }
}

