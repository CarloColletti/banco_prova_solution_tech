@extends('product::layouts.master')

@section('title')
    Aggiungi merce
@endsection

@section('content')
    @if (\Session::has('success'))
        <div id="allert-error-sub" class="alert alert-danger">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    <div class="d-flex flex-row justify-content-between my-3">
        <h2>Magazzino: sezione prodotto {{ $product->name }}</h2>
        <div>
            <span class="px-3">ATTUALI: </span>
            <span class="btn btn-secondary">{{ '' . $product->stock_quntity }}</span>
        </div>
    </div>
    <div class="d-flex flex-row my-3 justify-content-between">
        <div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModalProduct">
                Aggiungi Merce
            </button>

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#subModalProduct">
                Rimuovi Merce
            </button>
        </div>

        <div>
            <a class="btn btn-success" href="{{ route('product.index') }}">Torna ai Prodotti</a>
        </div>
    </div>

    <table class="table table-striped my-3">
        <thead>
            <tr>
                <th>Stock Aggiornato</th>
                <th>Modifica</th>
                <th>Data Modifica</th>
                <th>Ora Modifica</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($magazines as $magazine)
                <tr>
                    <th>{{ $magazine->stock_quntity }}</th>

                    {{-- il for style mod --}}
                    <th>
                        @if ($magazine->action_used == 1)
                            <span class="text-success">{{ '+ ' . $magazine->quantity_product_add_or_sub }}</span>
                        @elseif ($magazine->action_used == 0)
                            <span class="text-danger">{{ '- ' . $magazine->quantity_product_add_or_sub }}</span>
                        @endif
                    </th>


                    <th>{{ $magazine->created_at->format('Y-m-d') }}</th>
                    <th>{{ $magazine->created_at->format('H:m') }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


@section('modal')
    {{-- modal for add  --}}
    <div class="modal fade" id="addModalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ Route('product_magazine.update', ['id' => $product->id]) }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="quantity_product_add_or_sub" class="form-label">Quantità:</label>
                            <input type="number" class="form-control" id="quantity_product_add_or_sub"
                                name="quantity_product_add_or_sub" value="{{ old('quantity_product_add_or_sub') }}">

                            <input type="number" name="action_used" value="1" hidden>
                            @error('quantity_product_add_or_sub')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Aggiungi Quantità</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- modal for subtract --}}

    <div class="modal fade" id="subModalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ Route('product_magazine.update', ['id' => $product->id]) }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="quantity_product_add_or_sub" class="form-label">Quantità:</label>
                            <input type="number" class="form-control" id="quantity_product_add_or_sub"
                                name="quantity_product_add_or_sub" value="{{ old('quantity_product_add_or_sub') }}">

                            <input type="number" name="action_used" value="0" hidden>
                            @error('quantity_product_add_or_sub')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Rimuovo Quantità</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
