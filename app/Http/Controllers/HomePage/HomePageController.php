<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $categoriasHome = Category::where('status', '0')->get();
        return view('homePage.index', compact('categoriasHome'));
    }

    public function viewCategoryPost($slug)
    {
        $category = Category::where('slug', $slug)->where('status', '0')->first();
        if ($category) {
            $post = Post::where('category_id', $category->id)->where('status', '0')->paginate();
            return view('homePage.post.index', compact('post', 'category'));
        }
        return redirect()->route('home_page.index');
    }

    public function viewPost(string $category_slug, string $post_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        if ($category) {
            $post = Post::where('category_id', $category->id)->where('slug', $post_slug)->where('status', '0')->first();
            $latestPosts = Post::where('category_id', $category->id)->where('status', '0')->orderBy('created_at', 'DESC')->get()->take(15);

            return view('homePage.post.view', compact('post', 'latestPosts'));
        }
        return redirect()->route('home_page.index');
    }
}
