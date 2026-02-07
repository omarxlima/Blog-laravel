<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriaFormRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
        return Inertia::render('Admin/Categories/Index', ['categorias' => $categorias]);
    }

    public function create()
    {
        return Inertia::render('Admin/Categories/Create');
    }

    public function store(CategoriaFormRequest $request)
    {
        $data = $request->validated();
        $this->categoryService->createCategory($data, $request);
        return to_route('categoria.index')->with('message', 'Categoria criada com sucesso!');
    }

    public function edit($slug)
    {
        $categoria = Category::where('slug', $slug)->firstOrFail();
        return Inertia::render('Admin/Categories/Edit', ['categoria' => $categoria]);
    }

    public function update(CategoriaFormRequest $request, $slug)
    {
        $data = $request->validated();
        $this->categoryService->updateCategory($data, $request, $slug);
        return to_route('categoria.index')->with('message', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $categoria = Category::findOrFail($id);
        $categoria->delete();
        return to_route('categoria.index')->with('message', 'Categoria excluída com sucesso!');
    }
}
