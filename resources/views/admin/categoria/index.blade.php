@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Categoria</h1>

        @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
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
                        <table id="myTable"class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Imagem</th>
                                    <th>Status</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>

                                </tr>
                            </thead>
                            <tbody>



                                @forelse ($categorias as $categoria)
                                    <tr>
                                        <td>{{ $categoria->id }}</td>
                                        <td>{{ $categoria->name }}</td>
                                        <td>
                                                <img src="{{asset('uploads/categoria/' .$categoria->image)}}" width="50px" height="50px" alt="imagem-categoria">
                                        </td>
                                        <td>{{ $categoria->status == 1 ? 'Hiden' : ' Visible' }}</td>
                                        <td style="width: 150px">
                                            <a href="{{ route('categoria.edit', $categoria->id) }}"
                                                class="btn btn-warning">Editar</a>

                                        </td>
                                        <td style="width: 150px">

                                                <form method="POST" action="{{ route('categoria.destroy', $categoria->id) }}">
                                                    @csrf
                                                    @method('delete')

                                                    <button type='submit' class="btn btn-danger" data-toggle="tooltip">
                                                      Excluir
                                                    </button>
                                                    </form>

                                        </td>


                                    </tr>
                                    @empty
                                        <p>{{ 'Nenhuma categoria encontrada!'}}</p>
                                @endforelse
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
