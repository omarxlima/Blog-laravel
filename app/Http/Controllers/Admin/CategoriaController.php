<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriaFormRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoriaController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
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

        $this->categoryService->createCategory($data, $request);

        return to_route('categoria.index')->with('message', 'Categoria criada com sucesso!');
    }

    public function edit($slug)
    {
        $categoria = Category::where('slug',$slug)->first();
        return view('admin.categoria.edit', compact('categoria'));
    }

    public function update(CategoriaFormRequest $request, $slug)
    {
        // dd($request->all());
        $data = $request->validated();
        
        $this->categoryService->updateCategory($data, $request, $slug);

        return to_route('categoria.index')->with('message', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id){
        $categoria = Category::findOrFail($id);
        $categoria->delete();
        
        return to_route('categoria.index')->with('message', 'Categoria excluída com sucesso!');

    }
}
