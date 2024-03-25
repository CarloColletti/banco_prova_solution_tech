@extends('product::layouts.master')

@section('title')
    User
@endsection

@section('content')
    <div class=" d-flex flex-row  justify-content-between pb-4">

        {{-- link to product trashcan  --}}
        <a href="{{ route('product.trash') }}">
            <span class="btn btn-danger">
                cimitero {{ $numberDead > 0 ? $numberDead : '' }}
            </span>
        </a>


    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Quantità</th>
                <th>Prezzo</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Peso</th>
                <th>Altezza</th>
                <th>Larghezza</th>
                <th>Profondità</th>
                <th>Image</th>
                <th>Azioni</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th>{{ $product->stock_quntity }}</th>
                    <th>{{ $product->price }} €</th>
                    <th>{{ $product->name }}</th>
                    <th>{{ $product->type }}</th>
                    <th>{{ $product->weight }}</th>
                    <th>{{ $product->height }}</th>
                    <th>{{ $product->width }}</th>
                    <th>{{ $product->depth }}</th>
                    <th>{{ $product->product_image }}</th>
                    <th class="d-flex flex-row gap-3">


                        <div>
                            <i class="fa-regular fa-eye"></i>
                        </div>

                        <div>

                            <i class="fa-regular fa-pen-to-square"></i>

                        </div>
                        <div>

                            <i class="fa-regular fa-trash-can"></i>

                        </div>


                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection



@section('modal')
    {{-- modal for detail --}}

    {{-- end modal for detail --}}


    {{-- modal for delete --}}

    {{-- end modal for delete --}}
@endsection
