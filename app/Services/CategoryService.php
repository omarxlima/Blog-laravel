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

        $data = Category::where('slug', $slug)->first();

        // Atualiza os dados da data com o spread operator
        $data->update([
            ...$request->only(['name', 'description', 'meta_title', 'meta_description', 'meta_keyword']),
            'navbar_status' => $request->navbar_status === true ? '1' : '0',
            'status' => $request->status === true ? '1' : '0',
            'created_by' => Auth::user()->id,
        ]);
    
        // Se houver uma imagem, faz o upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/categoria', $filename);
            $data->image = $filename; // Atualiza a imagem no modelo
        }
    
        // Retorna a categoria atualizada
        return $data;
    }
}