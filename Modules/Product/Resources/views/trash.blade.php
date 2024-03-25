@extends('product::layouts.master')

@section('title')
    Cimitero
@endsection


@section('content')
    {{-- link for turn back at network.index --}}
    <div class="row">
        <div class="col py-4">
            <a href="{{ route('network.index') }}">
                <span class="btn btn-success">
                    esci dal cimitero
                </span>
            </a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Utente</th>
                <th>Nome Completo</th>
                <th>Email</th>
                <th>Indirizzo</th>
                <th>Data Eliminazione</th>
                <th>Ora Eliminazione</th>
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
                    <th class="text-center">{{ $user->deleted_at->format('Y-m-d') }}</th>
                    <th class="text-center">{{ $user->deleted_at->format('H:i') }}</th>
                    <th class="d-flex flex-row gap-3">

                        <div>
                            <button class="btn p-0 m-0" data-bs-toggle="modal"
                                data-bs-target="#detail-modal-{{ $user->id }}" title="detail">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                        <div>
                            <form action="{{ route('network.restore', ['user' => $user]) }}" method="POST"
                                class="px-2 text-danger">
                                @csrf
                                @method('post')
                                <button type="submit" class="btn p-0 m-0 text-success"><i
                                        class="fa-solid fa-recycle"></i></button>
                            </form>
                        </div>
                        <div>
                            <button class="text-danger btn p-0 m-0" data-bs-toggle="modal"
                                data-bs-target="#delete-modal-{{ $user->id }}" title="Elimina">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </div>
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
                            {{ $user->name }} {{ $user->lastname }}</span> verrà eliminato DEFINITIVAMNTE.<br>
                        L'operazione non è reversibile <br>
                        Vuoi davvero procedere?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{ route('network.force_delete', ['user' => $user]) }}" method="POST"
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
