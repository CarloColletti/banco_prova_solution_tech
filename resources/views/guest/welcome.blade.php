@extends('guest.layout.base')

@section('content')
    <div class="row">
        <h2>Pagina Momentanea per link utili in attesa di ordine elle rotte</h2>
    </div>

    <div class="row py-5 gap-3">
        <div class="col border">
            <h4>admin</h4>
            <div class="d-flex flex-column">
                <span>email: admin@mail.com</span>
                <span>Gallo12.</span>
            </div>
            <div>
                <a class="btn btn-success" href="{{ route('home') }}">User out of modal</a>
                <a class="btn btn-success" href="{{ route('network.index') }}">Network</a>
                <a class="btn btn-success" href="{{ route('order.index') }}">Shop</a>
            </div>
        </div>


        <div class="col border">
            <h4>customer</h4>
            <div class="d-flex flex-column">
                <span>email: customer@mail.com</span>
                <span>Gallo12.</span>
            </div>
            <div>
                <a class="btn btn-success" href="{{ route('order.index') }}">Shop</a>
            </div>
        </div>


        <div class="col border">
            <h4>seller</h4>
            <div class="d-flex flex-column">
                <span>email: customer@mail.com</span>
                <span>Gallo12.</span>
            </div>
            <div>
                <a class="btn btn-success" href="{{ route('order.show') }}">Vedi Ordini</a>
                <a class="btn btn-success" href="{{ route('product.index') }}">Vedi i tuoi prodotti</a>
            </div>
        </div>


    </div>

    <div class="row">
        <p>
            questa pagina varra visualizzata fino a quando le varie rotte e i link che portano a zone indesiderate non
            saranno sistemate <br>
            Fino a tale momento sarà possibile visualizzare link che potrebbero portare a errori di pagina <br>
            per comodità per tornare indietro il tasto logo sulla navbar nelle varie sezioni riporterà qui
        </p>
    </div>

    <div class="row gap-3 my-2">
        @guest
            <a class="btn btn-secondary" href="{{ route('login') }}">Login</a>
            <a class="btn btn-secondary" href="{{ route('register') }}">Register</a>
        @else
            <div>
                <span>attualmente loggato con {{ Auth::user()->email }}</span>
            </div>
            <a class="btn btn-secondary" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
            <a class="btn btn-secondary" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endguest
    </div>
@endsection
