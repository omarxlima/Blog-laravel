@extends('layouts.app')


@section('title', "Developer Lima")
@section('meta_description', "Developer Lima")
@section('meta_keyword',"Developer Lima")

@section('content')


{{-- Carousel --}}
<div class="bg-secondary py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel olw-categoria-carousel owl-theme">
                    @foreach ($categoriasHome as $categoria)

                    <div class="item mt-3">
                        <a href="{{url('tutorial/' . $categoria->slug)}}" class="text-decoration-none">
                            <div class="card">
                                <img src="{{ asset('uploads/categoria/' . $categoria->image) }}" alt="Image" class="img-thumbnail custom-img-size">
                                <div class="card-body text-center text-dark">
                                    <h5>{{ $categoria->name }} </h5>
                                </div>

                            </div>
                        </a>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>

{{-- @foreach ($categoriasHome as $categoria)
<div class="owl-carousel olw-categorias-carolsel owl-theme">
    <div class="item mt-3">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <a href="{{url('tuturial/' . $categoria->slug)}}" class="text-decoration-none"></a>
                    <img src="{{ asset('uploads/categoria/' . $categoria->image) }}" alt="{{$categoria->name}}">
                </h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $categoria->descripcion }}</p>
            </div>
        </div>
    </div>
</div>

@endforeach --}}
@endsection