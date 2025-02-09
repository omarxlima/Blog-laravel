<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService {
    public function createPost(array $data, $request)
    {
        $data = Post::create([
            ...$request->only(['category_id', 'name', 'slug', 'description', 'yt_iframe', 'meta_title', 'meta_description', 'meta_keyword']),
                'navbar_status' => $request->navbar_status == true ? '1' : '0',
                'status' => $request->status == true? '1' : '0',
                'created_by' => Auth::user()->id,

        ]);
        return $data;

    }

    public function updatePost(array $data, $request, $slug)
    {
        // $data = Post::find($slug);
        $data = Post::where('slug', $slug)->first();

        $data->update([
            ...$request->only(['category_id', 'name', 'slug', 'description', 'yt_iframe', 'meta_title', 'meta_description', 'meta_keyword']),
            'navbar_status' => $request->navbar_status == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'created_by' => Auth::user()->id,
        ]);
        return $data;
    }
}