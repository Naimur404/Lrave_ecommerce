<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container">

            <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item {{ Route::is('index') ? 'active' : '' }}">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item {{ Route::is('products') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products') }}">Products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <form class="d-flex" action="{{ route('search') }}" method="get">
                            <input class="form-control me-2" type="sear" chplaceholder="Search" aria-label="Search"
                                name="search">
                            <button class="btn btn-warning" type="submit" style=""><i class="fa fa-search"></i></button>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">




                            <a class="nav-link btn-card-nav" href="{{ route('carts') }}">
                                <button class="btn btn-danger ">
                                    <span class="mt-1">Cart</span>
                            <span class="badge bg-warning" id="totalItems">

                                
                            </span>

                        </button>
                    </a>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                @if (!is_null(Auth::user()->avatar))
                                    <img src="{{ asset('images/' . Auth::user()->avatar) }}" style="width: 40px"
                                        class="img rounded-circle">
                                @elseif (Gravatar::exists(Auth::user()->email))
                                    <img src="{{ Gravatar::src(Auth::user()->email, 100) }}" style="width: 40px"
                                        class="img rounded-circle">
                                @else
                                    <img src="{{ asset('images/user.png') }}" style="width: 40px"
                                        class="img rounded-circle">
                                @endif



                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('user.dashboard') }}">My Dashboard</a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
