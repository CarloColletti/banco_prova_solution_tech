@extends('orders::layouts.master')

@section('title')
    Order
@endsection

@section('content')
    <div class="row">
        @forelse ($products as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 g-4 d-flex justify-content-center">
                @include('orders::layouts.partials._card')
            </div>
        @empty
            <h2>
                Non ci sono prodotti
            </h2>
        @endforelse
    </div>


    <div class="fixed-bottom">
        <div class="d-flex flex-row-reverse border-top border-secondary">
            <div class="p-4">
                <button class="btn btn-secondary" id="btn-send-order">
                    Compera
                </button>
            </div>
        </div>
    </div>
@endsection



@section('modal')
@endsection
