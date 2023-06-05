@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Categoria</h1>

        @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">  Categoria</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Categoria
                            <a href="{{ route('categoria.create') }}"class="btn btn-primary float-end">Adicionar
                                Categoria</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Imagem</th>
                                    <th>Status</th>
                                    <th>Editar</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{ $categoria->id }}</td>
                                        <td>{{ $categoria->name }}</td>
                                        <td>
                                                <img src="{{asset('uploads/categoria/' .$categoria->image)}}" width="50px" height="50px" alt="imagem-categoria">
                                        </td>
                                        <td>{{ $categoria->status == 1 ? 'Hiden' : ' Visible' }}</td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-warning">Editar</a>

                                        </td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- <div class="float-end">
                            {{ $categorias->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>


        </div>

    </div>


    @endsection
