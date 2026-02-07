<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostService
{
    public function createPost(array $data, $request)
    {
        $post = Post::create([
            ...$request->only(['category_id', 'name', 'slug', 'description', 'yt_iframe', 'meta_title', 'meta_description', 'meta_keyword']),
            'navbar_status' => $request->navbar_status == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'created_by' => Auth::user()->id,
        ]);

        if ($request->hasFile('image')) {
            $post->image = $this->uploadImage($request->file('image'));
            $post->save();
        }

        return $post;
    }

    public function updatePost(array $data, $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();

        if ($request->hasFile('image')) {
            if ($post->image) {
                $destino = public_path('uploads/posts/' . $post->image);
                if (File::exists($destino)) {
                    File::delete($destino);
                }
            }
            $post->image = $this->uploadImage($request->file('image'));
        }

        $post->update([
            ...$request->only(['category_id', 'name', 'slug', 'description', 'yt_iframe', 'meta_title', 'meta_description', 'meta_keyword']),
            'navbar_status' => $request->navbar_status == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'created_by' => Auth::user()->id,
            'image' => $post->image,
        ]);

        return $post;
    }

    private function uploadImage($file): string
    {
        $dir = public_path('uploads/posts');
        File::ensureDirectoryExists($dir);
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($dir, $filename);
        return $filename;
    }
}