<nav class="navbar navbar-toggleable-md navbar-light">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{route('pages.index')}}">
        <img src="{{asset('favicon.png',true)}}" alt="">
    </a>
    &nbsp;
    &nbsp;
    &nbsp;
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link"><i class="material-icons badge"
                                                                      style="color: #2ab27b;"></i></a>
            </li>
            @auth
                <li class="nav-item">
                    <a href="{{ route('carts.index') }}" class="nav-link"><i class="material-icons">shopping_basket</i>
                        <span class="badge badge-success">{{ $user->cartCount() }}</span>

                    </a>
                </li>
                <li class="nav-item">
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                </li>
                <li class="nav-item dropdown">
                    <a class="btn btn-default dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <a href="">Profile</a>
                        </li>
                        @if($user->admin)
                            <li class="dropdown-item">
                                <a href="{{route('admin.dashboard')}}">Dashboard</a>
                            </li>
                        @endif
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item">
                            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    @endauth
        </ul>
        @include('pages.partials.search_box')
    </div>
</nav>