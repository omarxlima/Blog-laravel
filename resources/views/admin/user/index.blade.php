@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Usuários</h1>

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>
                    Usuários
                    {{-- <a href="{{ route('categoria.create') }}"class="btn btn-primary float-end">Adicionar
                        Usuário</a> --}}
                </h4>
            </div>

            <div class="card-body">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>email</th>
                            <th>Criação</th>
                            <th>Status</th>
                            <th>Editar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->created_at->format('d/n/Y') }}</td>
                            <td>{{ $usuario->role_as == 1? 'Admin': 'usuário' }}</td>
                            <td>
                                <a href=" {{ route('users.edit', $usuario->id) }} " class="btn btn-warning">Editar</a>
                            </td>
                        </tr>

                        @empty
                        <p>{{ 'nenhum usuário cadastrado!' }}</p>

                        @endforelse
                    </tbody>
                </table>


            </div>
        </div>

    </div>

@endsection
