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



        </div>

    </div>


    @endsection
