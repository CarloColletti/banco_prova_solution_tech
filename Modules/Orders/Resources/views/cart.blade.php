@extends('orders::layouts.master')

@section('title')
    Order
@endsection

@section('content')
    <form action="{{ route('order.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 g-4 d-flex justify-content-center">
                {{-- @include('orders::layouts.partials._list_product') --}}
            </div>

        </div>


        <div class="fixed-bottom">
            <div class="d-flex flex-row-reverse border-top border-secondary">
                <div class="p-4">
                    <button class="btn btn-secondary" id="btn-send-order">
                        Compera
                    </button>
                </div>
            </div>
        </div>

    </form>
@endsection



@section('modal')
@endsection
