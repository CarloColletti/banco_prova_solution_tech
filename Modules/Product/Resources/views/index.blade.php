@extends('product::layouts.master')

@section('title')
    User
@endsection

@section('content')
    <div class=" d-flex flex-row  justify-content-between pb-4">
        <div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createProduct">
                Nuovo Prodotto
            </button>
        </div>


        {{-- link to product trashcan  --}}
        <a href="{{ route('product.trash') }}">
            <span class="btn btn-danger">
                cimitero {{-- {{ $numberDead > 0 ? $numberDead : '' }} --}}
            </span>
        </a>


    </div>

    <div class="row">
        @foreach ($products as $product)
            {{-- avrei creato un componente card come per avbar ma laravel ha detto NO --}}
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 g-4 d-flex justify-content-center">
                @include('product::layouts.partials._card')
            </div>
        @endforeach
    </div>
@endsection



@section('modal')
    {{-- modal for detail --}}
    @include('product::layouts.partials._modal_detail')

    {{-- Modal for create --}}
    @include('product::layouts.partials._modal_create')

    {{-- modal for edit --}}

    {{-- modal for delete --}}
@endsection
