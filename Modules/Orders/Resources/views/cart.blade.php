@extends('orders::layouts.master')

@section('title')
    Order
@endsection

@section('content')
    <div class="row flex-row">
        {{-- SECTION FOR PRODUCT **************************************************  --}}
        <div class="col-10">
            {{-- FORM  --}}
            <form action="{{ route('order.index') }}" method="post">
                <div class="container">
                    <div class="row">
                        {{-- INIT TABLE --}}
                        <div class="row border-bottom border-3 border-black text-center py-3 fw-semibold ">
                            <div class="col-2">#</div>
                            <div class="col-1">Nome</div>
                            <div class="col-2">Tipologia</div>
                            <div class="col-1">Peso</div>
                            <div class="col-1">Altezza</div>
                            <div class="col-1">Larghezza</div>
                            <div class="col-1">Profonditò</div>
                            <div class="col-2">Quantità</div>
                            <div class="col-1">Prezzo</div>
                        </div>

                        {{-- FORM  --}}
                        <form action="{{ route('order.index') }}" method="post">
                            @csrf
                            @forelse ($products as $product)
                                @include('orders::layouts.partials._list_product')
                            @empty
                                <h2>
                                    Non ci soo prodotti nel carrello.
                                </h2>
                            @endforelse

                        </form>
                    </div>
                </div>
            </form>
        </div>

        {{-- SECTION FOR CREATE ORDER  --}}
        <div class="col-2 border-start border-secondary">
            <div class="d-flex flex-column gap-3">
                {{-- select a type discount  --}}
                <label for="discount_type">Seleziona il tipo di sconto:</label>
                <select name="discount_type" id="discount_type">
                    <option value="fisso">Fisso</option>
                    <option value="percentuale">Percentuale</option>
                </select>

                {{-- insert value of discount  --}}
                <label for="discount"></label>
                <input type="number" step=".01" id="discount" value="discount">

                {{-- total amount --}}
                <label for="total_amount"></label>
                <input type="hidden" id="total_amount" class="total_amount_selector">

                <button class="btn btn-secondary" id="btn-send-order">
                    Compera
                </button>
            </div>
        </div>
        </form>
    </div>
@endsection

@section('modal')
@endsection
