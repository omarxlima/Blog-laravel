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
        return view('homePage.index');
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
}
