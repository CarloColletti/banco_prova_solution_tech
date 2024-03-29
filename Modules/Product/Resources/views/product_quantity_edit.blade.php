@extends('product::layouts.master')

@section('title')
    Aggiungi merce
@endsection

@section('content')
    <div class="row">
        <h2>Magazzino: sezione prodotto xxxxxxx</h2>
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
                <div class="modal-body">
                    sei in aggiungi
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
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
