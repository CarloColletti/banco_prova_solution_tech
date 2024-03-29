@extends('product::layouts.master')

@section('title')
    User
@endsection

@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-danger">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    <div class=" d-flex flex-row  justify-content-between pb-4">
        <div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createProduct">
                Nuovo Prodotto
            </button>
        </div>


        {{-- link to product trashcan  --}}
        <a href="{{ route('product.trash') }}">
            <span class="btn btn-danger">
                cimitero {{ $numberDead > 0 ? $numberDead : '' }}
            </span>
        </a>


    </div>

    <div class="row">
        @forelse ($products as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 g-4 d-flex justify-content-center">
                @include('product::layouts.partials._card')
            </div>
        @empty
            Non ci sono prodotti
        @endforelse
    </div>
@endsection



@section('modal')
    @if ($resul_error_fix === 0)
        asdasdasdasdasdasdsadsadasdadssadsaasdsdasdasdasdassdas
    @else
        {{-- modal for detail --}}
        @include('product::layouts.partials._modal_detail')

        {{-- modal for edit --}}
        @include('product::layouts.partials._modal_edit')


        {{-- modal for delete --}}
        @include('product::layouts.partials._modal_delete')
    @endif

    {{-- Modal for create --}}
    @include('product::layouts.partials._modal_create')
@endsection
