@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
    <div class="container-fluid px-4">


        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card mt-4">
            <div class="card-header">
                <h4>Visualizar Posts  <a href="{{ route('posts.create') }}" class="btn btn-primary float-end">Adicionar Posts</a> </h4>

            </div>

            <div class="card-body">
                <table id="myTable"class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Categoria</th>
                            <th>Nome</th>
                            <th>Status</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ( $posts as $post )
                        <tr>
                            <td>{{$post->id}}</td>
                            <td> {{ $post->category->name }} </td>
                            <td> {{$post->name}} </td>
                            <td> {{$post->status == '1'? 'Inativo': 'Ativo'}} </td>
                            <td>
                                <a href="{{ route('posts.edit', ['slug' => $post->slug])}}" class="btn btn-warning">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Excluír</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
