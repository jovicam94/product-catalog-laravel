<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">Product Catalog App</a>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @if (Auth::check())
            <li class="nav-item">
                <span class="nav-link auth-user" style="white-space: nowrap;">
                    Welcome, {{ Auth::user()->name }}
                </span>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}" >Register</a>
                </li>
            @else
                @if(Auth()->user()->isAdmin())
                    <li class="nav-item admin-dashboard">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}" >Admin dashboard</a>
                    </li>
                @endif
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="nav-link log-out" href="#">
                        Logout
                    </a>
                </li>
            @endguest
        </ul>
    </div>
</nav>

