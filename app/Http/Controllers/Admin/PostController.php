<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = Post::with('category')->get();
        return Inertia::render('Admin/Posts/Index', ['posts' => $posts]);
    }

    public function create()
    {
        $categorias = Category::where('status', '0')->get();
        return Inertia::render('Admin/Posts/Create', ['categorias' => $categorias]);
    }

    public function store(PostFormRequest $request)
    {
        $data = $request->validated();
        $this->postService->createPost($data, $request);
        return to_route('posts.index')->with('message', 'Post criado com sucesso!');
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categorias = Category::where('status', '0')->get();
        return Inertia::render('Admin/Posts/Edit', ['post' => $post, 'categorias' => $categorias]);
    }

    public function update(PostFormRequest $request, $slug)
    {
        $data = $request->validated();
        $this->postService->updatePost($data, $request, $slug);
        return to_route('posts.index')->with('message', 'Post atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return to_route('posts.index')->with('message', 'Post excluído com sucesso!');
    }
}
