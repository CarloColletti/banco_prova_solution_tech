@extends('product::layouts.master')

@section('title')
    Aggiungi merce
@endsection

@section('content')
    <div class="row">
        <h2>Magazzino: sezione prodotto {{ $product->name }}</h2>
    </div>
    <div class="d-flex flex-row gap-3">
        <div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModalProduct">
                Aggiungi Merce
            </button>

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#subModalProduct">
                Rimuovi Merce
            </button>

        </div>

    </div>
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
                        <button type="submit" class="btn btn-primary">Aggiungi quantità</button>
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
                <div class="modal-body">
                    sei in sub
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
