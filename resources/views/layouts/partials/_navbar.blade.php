<nav class="navbar navbar-expand-md navbar-dark bg-dark py-2">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            logo
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="nav-item me-auto w-100 px-5 ">
                <form class="d-flex lg-px-5">
                    <input class="form-control me-2" type="text" name="term" placeholder="Cerca tra gli utenti"
                        aria-label="Search">
                    <button class="bn54" type="submit">
                        <span class="bn54span">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                    </button>
                </form>
            </div>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ps-5">
                <!-- Authentication Links -->
                @guest
                @else
                    <li class="nav-item">
                        <span class="nav-link">{{ Auth::user()->name }}</span>
                    </li>
                @endguest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa-solid fa-user-tie"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-dark">
                        @guest
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                        @else
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </li>

            </ul>
        </div>
    </div>
</nav>
