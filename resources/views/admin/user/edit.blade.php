@extends('layouts.master')

@section('title', 'Usuário')

@section('content')
    <div class="container-fluid px-4">


        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card mt-4">
            <div class="card-header">
                <h4>Editar Usuário <a href="{{ route('users.index') }}" class="btn btn-primary float-end">Voltar</a> </h4>

            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="" class="form-label">Nome</label>
                        <input type="text" class="form-control" value="{{ $usuario->name }}">
                    </div>

                    <div class="col mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" value="{{ $usuario->email }}">
                    </div>

                    <form action="{{ route('users.update', $usuario->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="col mb-3">
                            <label for="" class="form-label">Acesso</label>
                            <select name="acesso" id="" class="form-select">
                                <option value="1" {{ $usuario->role_as == '1' ? 'selected' : '' }}>Admin</option>
                                <option value="0" {{ $usuario->role_as == '0' ? 'selected' : '' }}>Usuário</option>
                                <option value="2" {{ $usuario->role_as == '2' ? 'selected' : '' }}>Blogger</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success float-end">Atualizar</button>
                        </div>

                    </form>


                </div>


            </div>

        </div>
    </div>


@endsection
