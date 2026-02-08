<?php 

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryService
{

    public function createCategory(array $data, $request)
    {
        $categoria = new Category;
        $categoria->name = $data['name'];
        $categoria->description = $data['description'];

        if ($request->hasFile('image')) {

            $destino = 'uplosds/categoria' . $categoria->imagem;
            if (File::exists($destino)) {
                File::delete($destino);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/categoria', $filename);
            $categoria->image = $filename;
        }

        $categoria->meta_title = $data['meta_title'];
        $categoria->meta_description = $data['meta_description'];
        $categoria->meta_keyword = $data['meta_keyword'];
        $categoria->navbar_status = $request->navbar_status === true ? '1' : '0';
        $categoria->status = $request->status === true ? '1' : '0';
        $categoria->created_by = Auth::user()->id;
        $categoria->save();

        return $categoria;

        

    }

    public function updateCategory(array $data, $request, $slug)
    {
        // $categoria = Category::where('slug',$slug)->first();
        // $categoria->name = $data['name'];
        // $categoria->description = $data['description'];

        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move('uploads/categoria', $filename);
        //     $categoria->image = $filename;
        // }

        // $categoria->meta_title = $data['meta_title'];
        // $categoria->meta_description = $data['meta_description'];
        // $categoria->meta_keyword = $data['meta_keyword'];
        // $categoria->navbar_status = $request->navbar_status === true ? '1' : '0';
        // $categoria->status = $request->status === true ? '1' : '0';
        // $categoria->created_by = Auth::user()->id;
        // $categoria->update();

        // return $categoria;

        $categoria = Category::where('slug', $slug)->first();

        $categoria->update([
            ...$request->only(['name', 'description', 'meta_title', 'meta_description', 'meta_keyword']),
            'navbar_status' => $request->navbar_status === true ? '1' : '0',
            'status' => $request->status === true ? '1' : '0',
            'created_by' => Auth::user()->id,
        ]);

        if ($request->hasFile('image')) {
            $dir = public_path('uploads/categoria');
            File::ensureDirectoryExists($dir);
            if ($categoria->image) {
                $oldPath = $dir . '/' . $categoria->image;
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($dir, $filename);
            $categoria->image = $filename;
            $categoria->save();
        }

        return $categoria;
    }
}