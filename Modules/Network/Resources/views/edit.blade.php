@extends('network::layouts.master')

@section('title')
    Modifica
@endsection


@section('content')
    <form action="{{ route('network.update', $user) }}" enctype="multipart/form-data" method="POST" class="form-edit"
        data-modalita="edit">
        @method('put')
        @csrf


        {{-- name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $user->name }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- lastname  --}}
        <div class="mb-3">
            <label for="lastname" class="form-label">Cognome:</label>
            <input type="text" class="form-control" id="lastname" name="lastname"
                value="{{ old('lastname') ?? $user->lastname }}">
            @error('lastname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- fiscal_code  --}}
        <div class="mb-3">
            <label for="fiscal_code" class="form-label">Codice Fiscale:</label>
            <input type="text" class="form-control" id="fiscal_code" name="fiscal_code"
                value="{{ old('fiscal_code') ?? $user->fiscal_code }}">
            @error('fiscal_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        {{-- address  --}}
        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo:</label>
            <input type="text" class="form-control" id="address" name="address"
                value="{{ old('address') ?? $user->address }}">
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- city  --}}
        <div class="mb-3">
            <label for="city" class="form-label">Città:</label>
            <input type="text" class="form-control" id="city" name="city"
                value="{{ old('city') ?? $user->city }}">
            @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- province  --}}
        <div class="mb-3">
            <label for="province" class="form-label">Provincia:</label>
            <input type="text" class="form-control" id="province" name="province"
                value="{{ old('province') ?? $user->province }}">
            @error('province')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- country  --}}
        <div class="mb-3">
            <label for="country" class="form-label">Paese:</label>
            <input type="text" class="form-control" id="country" name="country"
                value="{{ old('country') ?? $user->country }}">
            @error('country')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- zip_code  --}}
        <div class="mb-3">
            <label for="zip_code" class="form-label">Codice Postale:</label>
            <input type="text" class="form-control" id="zip_code" name="zip_code"
                value="{{ old('zip_code') ?? $user->zip_code }}">
            @error('zip_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- phone  --}}
        <div class="mb-3">
            <label for="phone" class="form-label">Numero:</label>
            <input type="text" class="form-control" id="phone" name="phone"
                value="{{ old('phone') ?? $user->phone }}">
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">invia</button>

    </form>
@endsection
