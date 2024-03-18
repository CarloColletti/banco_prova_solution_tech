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
                        <th>AZIONI</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endguest
@endsection
