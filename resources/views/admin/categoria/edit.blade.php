@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Editar Categoria</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('categoria.update', ['slug' => $categoria->slug]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    <!-- Nome da Categoria -->
                    <div class="col mb-4">
                        <label for="name" class="form-label">Nome da Categoria</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $categoria->name) }}"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="text-danger"><span>{{ $message }}</span></div>
                        @enderror
                    </div>

                    <!-- Imagem -->
                    <div class="col mb-4">
                        <label for="image" class="form-label">Imagem</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                        <div class="text-danger"><span>{{ $message }}</span></div>
                        @enderror
                    </div>

                    <!-- Descrição -->
                    <div class="mb-4">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea name="description" id="description" cols="30" rows="3"
                            class="form-control @error('description') is-invalid @enderror">{{ old('description', $categoria->description) }}</textarea>
                        @error('description')
                        <div class="text-danger"><span>{{ $message }}</span></div>
                        @enderror
                    </div>

                </div>

                <h6>SEO Tags</h6>
                <div class="row">
                    <!-- Meta Título -->
                    <div class="col mb-4">
                        <label for="meta_title" class="form-label">Meta-título</label>
                        <input type="text" name="meta_title" id="meta_title"
                            value="{{ old('meta_title', $categoria->meta_title) }}"
                            class="form-control @error('meta_title') is-invalid @enderror">
                        @error('meta_title')
                        <div class="text-danger"><span>{{ $message }}</span></div>
                        @enderror
                    </div>

                    <!-- Meta Descrição -->
                    <div class="col mb-4">
                        <label for="meta_description" class="form-label">Meta-descrição</label>
                        <input type="text" name="meta_description" id="meta_description"
                            value="{{ old('meta_description', $categoria->meta_description) }}"
                            class="form-control @error('meta_description') is-invalid @enderror">
                        @error('meta_description')
                        <div class="text-danger"><span>{{ $message }}</span></div>
                        @enderror
                    </div>

                    <!-- Meta Palavra-chave -->
                    <div class="col mb-4">
                        <label for="meta_keyword" class="form-label">Meta-palavras-chave</label>
                        <input type="text" name="meta_keyword"
                            value="{{ old('meta_keyword', $categoria->meta_keyword) }}"
                            class="form-control @error('meta_keyword') is-invalid @enderror">
                        @error('meta_keyword')
                        <div class="text-danger"><span>{{ $message }}</span></div>
                        @enderror
                    </div>

                </div>
                <h6>Status</h6>
                <div class="row">

                    <!-- Status Navbar -->
                    <div class="col-md-3 mb-3 form-check">
                        <input type="checkbox" name="navbar_status" class="form-check-input" {{ old('navbar_status',
                            $categoria->navbar_status) == '1' ? 'checked' : '' }}>
                        <label class="form-label">Navbar Status</label>
                    </div>

                    <!-- Status -->
                    <div class="col-md-3 mb-3 form-check">
                        <input type="checkbox" name="status" class="form-check-input" {{ old('status',
                            $categoria->status) == '1' ? 'checked' : '' }}>
                        <label class="form-label">Status</label>
                    </div>

                    <!-- Botão de envio -->
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary float-end">Editar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection