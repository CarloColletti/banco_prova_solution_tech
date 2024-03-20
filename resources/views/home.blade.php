@extends('layouts.base')

@section('title')
    homepage
@endsection


@section('content')
    <table class="table table-striped">
        @guest
            <h1>ACCEDI O REGISTRATI PER VISUALIZZARE GLI UTENTI</h1>
        @else
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
                                    <i class="fa-regular fa-eye"></i>
                                </div>
                            @else
                                <div>
                                    <i class="fa-regular fa-eye"></i>
                                </div>

                                <div>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </div>
                                <div>
                                    <form action="{{ route('user.destroy', ['user' => $user]) }}" method="POST"
                                        class="px-2 text-danger">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                    <i class="fa-regular fa-trash-can"></i>
                                </div>
                            @endif

                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endguest
@endsection


@section('modal')
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Dettagli utente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Nome: <span id="userName"></span></p>
                    <p>Email: <span id="userEmail"></span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
