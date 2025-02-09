@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
<div class="container-fluid px-4">


    <div class="card mt-4">
        <div class="card-header">
            <h4>Adicionar Categoria</h4>

        </div>
        <div class="card-body">
            <form action="{{ route('categoria.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col mb-4">
                        <label for="name" class="form-label">Nome da Categoria</label>
                        <input type="text" id="name" name="name"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="text-danger"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    {{-- <div class="col mb-4">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" name="slug" id="slug"
                            class="form-control @error('slug') is-invalid @enderror">
                        @error('slug')
                        <div class="text-danger"><span>{{ $message }}</span></div>
                        @enderror
                    </div> --}}
                    <div class="col mb-4">
                        <label for="image" class="form-label">imagem</label>
                        <input type="file" name="image" id="image" class="form-control">

                    </div>
                </div>
                <div class="mb-4">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea name="description" id="description" cols="30" rows="3"
                        class="form-control  @error('description') is-invalid @enderror">
                            @error('description')
                            {{-- <div class="text-danger"><span>{{ $message }}</span></div> --}}
                        @enderror
                        </textarea>
                </div>


                <h6>SEO Tags</h6>
                <div class="row">

                    <div class="col mb-4">
                        <label for="meta_title" class="form-label">Meta-titulo </label>
                        <input type="text" name="meta_title" id="meta_title"
                            class="form-control @error('meta_title') is-invalid @enderror">
                    </div>
                    <div class="col mb-4">
                        <label for="meta_description" class="form-label">Meta-descrição</label>
                        <input type="text" name="meta_description" id="meta_description"
                            class="form-control @error('meta_description') is-invalid @enderror">
                    </div>
                    <div class="col mb-4">
                        <label for="meta_keyword" class="form-label">Meta-palavras-chaves</label>
                        <input type="text" name="meta_keyword"
                            class="form-control @error('meta_keyword') is-invalid @enderror">
                    </div>
                </div>

                <h6>Status</h6>
                <div class="row">
            
                    <!-- Navbar Status (Checkbox) -->
                    <div class="col-md-3 mb-3 form-check">
                        <input type="checkbox" name="navbar_status" class="form-check-input" 
                        {{ old('navbar_status') ? 'checked' : '' }}>
                        <label class="form-label">Navbar Status</label>
                    </div>

                    <!-- Status (Checkbox) -->
                    <div class="col-md-3 mb-3 form-check">
                        <input type="checkbox" name="status" class="form-check-input"
                         {{ old('status') ? 'checked' : ''}}>
                        <label class="form-label">Status</label>
                    </div>


                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary float-end">Salvar</button>
                    </div>

                </div>

            </form>
        </div>
    </div>

</div>


@endsection