<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categorias = Categoria::where('status', '0')->get();
        return view('admin.post.create', compact('categorias'));
    }

    public function store(PostFormRequest $request)
    {
        $data = $request->validated();

        $post = new Post;
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = $data['slug'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true? '1': '0';
        $post->created_by = Auth::user()->id;
        $post->save();
        return to_route('posts.index')->with('message', 'Post criado com sucesso!');
    }

    public function edit($id){
        $post = Post::find($id);
        $categorias = Categoria::where('status', '0')->get();
        return view('admin.post.edit', compact('post', 'categorias'));
    }

    public function update(PostFormRequest $request, $id){

        $data = $request->validated();

        $post = Post::find($id);
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = $data['slug'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true? '1': '0';
        $post->created_by = Auth::user()->id;
        $post->update();
        return to_route('posts.index')->with('message', 'Post atualizado com sucesso!');
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return to_route('posts.index')->with('message', 'Post excluído com sucesso!');
    }
}
