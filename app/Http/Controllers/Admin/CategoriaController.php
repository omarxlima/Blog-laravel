<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriaFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Category::all();
        return view('admin.categoria.index', compact('categorias'));
    }

    public function create()
    {
        return view('admin.categoria.create');
    }

    public function store(CategoriaFormRequest $request)
    {
        $data = $request->validated();
        $categoria = new Category;
        $categoria->name = $data['name'];
        $categoria->slug = $data['slug'];
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
        $categoria->navbar_status = $request->navbar_status == true ? '1' : '0';
        $categoria->status = $request->status == true ? '1' : '0';
        $categoria->created_by = Auth::user()->id;
        $categoria->save();

        return to_route('categoria.index')->with('message', 'Categoria criada com sucesso!');
    }

    public function edit($id)
    {
        $categoria = Category::find($id);
        return view('admin.categoria.edit', compact('categoria'));
    }

    public function update(CategoriaFormRequest $request, $id)
    {
        $data = $request->validated();
        $categoria = Category::find($id);
        $categoria->name = $data['name'];
        $categoria->slug = $data['slug'];
        $categoria->description = $data['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/categoria', $filename);
            $categoria->image = $filename;
        }

        $categoria->meta_title = $data['meta_title'];
        $categoria->meta_description = $data['meta_description'];
        $categoria->meta_keyword = $data['meta_keyword'];
        $categoria->navbar_status = $request->navbar_status == true ? '1' : '0';
        $categoria->status = $request->status == true ? '1' : '0';
        $categoria->created_by = Auth::user()->id;
        $categoria->update();

        return to_route('categoria.index')->with('message', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id){
        $categoria = Category::findOrFail($id);
        $categoria->delete();
        return to_route('categoria.index')->with('message', 'Categoria excluída com sucesso!');

    }
}
