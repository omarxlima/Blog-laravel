@extends('layouts.master')

@section('title', 'Posts')

@section('content')
    <div class="container-fluid px-4">


        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card mt-4">
            <div class="card-header">
                <h4>Editar Post <a href="{{ route('posts.index')}}" class="btn btn-primary float-end">Voltar</a> </h4>

            </div>

            <div class="card-body">
                <form action="{{ route('posts.update', $post->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col mb-3">
                            <label for="" class="form-label">Categoria</label>
                            <select name="category_id" id="" class="form-select">

                                <option value=""> -- Seleciona a categoria --</option>
                                 @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $post->category_id == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->name }}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="col mb-3">
                            <label for="name" class="form-label">Nome do Post</label>
                            <input type="text" class="form-control" name="name" value="{{$post->name}}">
                        </div>

                        <div class="col mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{$post->slug}}">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea name="description" id="MySummernote" cols="30" rows="3" class="form-control">{{ $post->description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="yt_iframe" class="form-label">Link Youtube </label>
                        <input type="text" name="yt_iframe" id="yt_iframe" class="form-control" value="  {{$post->yt_iframe}} ">

                    </div>

                    <h6>SEO Tags</h6>
                    <div class="row">
                        <div class="col mb-4">
                            <label for="meta_title" class="form-label">Meta-titulo </label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control" value="  {{$post->meta_title}} ">
                        </div>
                        <div class="col mb-4">
                            <label for="meta_description" class="form-label">Meta-descrição</label>
                            <input type="text" name="meta_description" id="meta_description" class="form-control" value="  {{$post->meta_description}} ">
                        </div>
                        <div class="col mb-4">
                            <label for="meta_keyword" class="form-label">Meta-palavras-chaves</label>
                            <input type="text" name="meta_keyword" class="form-control" value="  {{$post->meta_keyword}} ">
                        </div>
                    </div>


                    <h6>Status</h6>
                    <div class="row">
                        <div class="col mb-3 form-check">
                            <input type="checkbox" name="navbar_status" class="form-check-input">
                            <label class="form-label">Navbar Status</label>
                        </div>
                        <div class="col mb-3 form-check">
                            <input type="checkbox" name="status" class="form-check-input">
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
