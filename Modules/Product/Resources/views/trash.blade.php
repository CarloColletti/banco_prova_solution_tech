@extends('product::layouts.master')

@section('title')
    Cimitero
@endsection


@section('content')
    {{-- link for turn back at network.index --}}
    <div class="row">
        <div class="col py-4">
            <a href="{{ route('product.index') }}">
                <span class="btn btn-success">
                    esci dal cimitero
                </span>
            </a>
        </div>
    </div>


    <div class="row">
        @foreach ($products as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 g-4 d-flex justify-content-center">
                @include('product::layouts.partials._card')
            </div>
        @endforeach
    </div>
@endsection



@section('modal')
    {{-- modal for detail --}}
    @include('product::layouts.partials._modal_detail')

    {{-- modal for delete --}}
    @include('product::layouts.partials._modal_delete')
@endsection
