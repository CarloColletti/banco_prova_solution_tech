@extends('network::layouts.master')

@section('title')
    User
@endsection

@section('content')
    {{-- link for turn back at origin home --}}
    <div class=" d-flex flex-row  justify-content-between pb-4">
        {{-- link for turn back at origin home --}}
        <div>
            <a href="{{ route('home') }}">
                <span class="btn btn-success">
                    esci fuori dalla zona del network
                </span>
            </a>
            <a href="{{ route('order.index') }}">
                <span class="btn btn-success">
                    Vai allo Shop
                </span>
            </a>
        </div>


        {{-- link to user trashcan  --}}
        <a href="{{ route('network.trash') }}">
            <span class="btn btn-danger">
                cimitero {{ $numberDead > 0 ? $numberDead : '' }}
            </span>
        </a>


    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Utente</th>
                <th>Nome Completo</th>
                <th>Email</th>
                <th>Indirizzo</th>
                <th>Azioni</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <th>{{ $user->name . ' ' . $user->lastname }}</th>
                    <th>{{ $user->email }}</th>
                    <th>{{ $user->address }}</th>
                    <th class="d-flex flex-row gap-3">

                        @if (auth()->id() === $user->id)
                            <div>
                                <button class="btn p-0 m-0" data-bs-toggle="modal"
                                    data-bs-target="#detail-modal-{{ $user->id }}" title="detail">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        @else
                            <div>
                                <button class="btn p-0 m-0" data-bs-toggle="modal"
                                    data-bs-target="#detail-modal-{{ $user->id }}" title="detail">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>

                            <div>
                                <a class="dropdown-item topButton" href="{{ route('network.edit', $user->id) }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                            </div>
                            <div>
                                <button class="text-danger btn p-0 m-0" data-bs-toggle="modal"
                                    data-bs-target="#delete-modal-{{ $user->id }}" title="Elimina">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </div>
                        @endif

                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection



@section('modal')
    {{-- modal for detail --}}
    @foreach ($users as $user)
        <div class="modal fade" id="detail-modal-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Dettegli utente:</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>Nome completo: {{ $user->name }} {{ $user->lastaname }}</li>
                            <li>Email: {{ $user->email }}</li>
                            <li>Codice Fiscale: {{ $user->fiscal_code }}</li>
                            <li>Indirizzo: {{ $user->address }}</li>
                            <li>Città: {{ $user->city }}</li>
                            <li>Codice Postale: {{ $user->zip_code }}</li>
                            <li>Provincia: {{ $user->province }}</li>
                            <li>Paese: {{ $user->country }}</li>
                            <li>Numero Cellulare {{ $user->phone }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- end modal for detail --}}






    {{-- modal for delete --}}
    @foreach ($users as $user)
        <div class="modal fade" id="delete-modal-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Conferma Eliminazione dell'utente:
                            {{ $user->name }} {{ $user->lastname }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Se si procede, l'utente: <span class="text-danger fw-semibolt">
                            {{ $user->name }} {{ $user->lastname }}</span> verrà eliminato.<br>
                        Vuoi davvero procedere?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{ route('network.destroy', ['user' => $user]) }}" method="POST"
                            class="px-2 text-danger">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end modal for delete --}}
@endsection
