<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomePageController extends Controller
{
    public function index()
    {
        $categoriasHome = Category::where('status', '0')->get();
        return Inertia::render('Home/Index', ['categoriasHome' => $categoriasHome]);
    }

    public function viewCategoryPost($slug)
    {
        $category = Category::where('slug', $slug)->where('status', '0')->first();
        if (!$category) {
            return redirect()->route('home_page.index');
        }
        $post = Post::with('user')
            ->where('category_id', $category->id)
            ->where('status', '0')
            ->paginate(15);
        return Inertia::render('Category/Show', [
            'category' => $category,
            'post' => $post,
        ]);
    }

    public function viewPost(string $category_slug, string $post_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        if (!$category) {
            return redirect()->route('home_page.index');
        }
        $post = Post::with('category', 'user')
            ->where('category_id', $category->id)
            ->where('slug', $post_slug)
            ->where('status', '0')
            ->first();
        if (!$post) {
            return redirect()->route('home_page.view', $category_slug);
        }
        $latestPosts = Post::with('category')
            ->where('category_id', $category->id)
            ->where('status', '0')
            ->orderBy('created_at', 'DESC')
            ->take(15)
            ->get();
        return Inertia::render('Post/Show', [
            'post' => $post,
            'latestPosts' => $latestPosts,
        ]);
    }
}
