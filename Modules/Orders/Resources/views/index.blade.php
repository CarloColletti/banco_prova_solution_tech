@extends('orders::layouts.master')

@section('title')
    Shop
@endsection

@section('content')
    <form action="{{ route('order.store') }}" method="post">
        @csrf
        <div class="row">
            @include('orders::layouts.partials._card')
        </div>


        <div class="fixed-bottom">
            <div class="d-flex flex-row-reverse border-top border-secondary">
                <div class="p-4">
                    <button type="submit" class="btn btn-secondary">
                        Aggiungi al carello
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection



@section('modal')
@endsection
