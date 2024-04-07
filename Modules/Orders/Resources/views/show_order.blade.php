@extends('orders::layouts.master')

@section('title')
    Order
@endsection

@section('content')
    <div class="row flex-row">
        {{-- INIT TABLE --}}
        <div class="row border-bottom border-3 border-black text-center py-3 fw-semibold ">

            <div class="col">nome</div>



            <div class="col">Sconto</div>


            <div class="col">
                Prodotti
            </div>

            <div class="col">Totale</div>

        </div>

        @forelse ($orders as $order)
            @include('orders::layouts.partials._list_order')
        @empty
            <h2>
                Non ci soo prodotti nel carrello.
            </h2>
        @endforelse
    </div>
@endsection

@section('modal')
@endsection
