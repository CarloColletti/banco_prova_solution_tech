@extends('orders::layouts.master')

@section('title')
    Order
@endsection

@section('content')
    <form action="{{ route('order.create') }}" method="post">
        <div class="row flex-row">
            {{-- SECTION FOR PRODUCT **************************************************  --}}
            <div class="col-10">
                {{-- FORM  --}}
                @csrf
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

                        @forelse ($products as $product)
                            @include('orders::layouts.partials._list_product')
                        @empty
                            <h2>
                                Non ci soo prodotti nel carrello.
                            </h2>
                        @endforelse
                    </div>
                </div>

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
                    <div class="change-visibility">
                        <label for="discount">inserisci quantoo vuoi scontare dal totale</label>
                        <div>
                            <input type="number" step=".01" name="discount" id="discount" value="discount">
                            <span class="btn btn-secondary" id="creasy-deal">Sconto Pazzo</span>
                        </div>
                    </div>

                    {{-- total amount --}}
                    <div>
                        <span>
                            Il prezzo da pagare è:
                        </span>
                    </div>
                    <span class="total_amount_show" name="total_amount"></span>
                    <input type="hidden" name="total_amount" id="total_amount" class="total_amount_selector">

                    <button class="btn btn-secondary" id="btn-send-order">
                        Compera
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('modal')
@endsection
