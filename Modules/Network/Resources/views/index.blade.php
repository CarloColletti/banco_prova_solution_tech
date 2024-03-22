@extends('network::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('network.name') !!}
    </p>
    <ul class="py-5">
        @foreach ($users as $user)
            <li class="prova">{{ $user->name }} {{ $user->lastname }}</li>
        @endforeach
    </ul>
@endsection
