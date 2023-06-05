<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('admin.categoria.index', compact('categorias'));
    }

    public function create(){
        return view('admin.categoria.create');
    }

    public function store(CategoriaRequest $request){
            $data = $request->validated();
            $categoria = new Categoria;
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
            $categoria->status = $request->status == true ? '1' : '0' ;
            $categoria->created_by = Auth::user()->id;
            $categoria->save();

            return to_route('categoria.index')->with('message','Categoria criada com sucesso!');
    }
}
