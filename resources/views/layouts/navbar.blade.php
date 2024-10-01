<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">Product App</a>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto"> <!-- ms-auto stavlja elemente udesno -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" >About</a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" >Register</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" >Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Logout</a>
                </li>
            @endguest
        </ul>
    </div>
</nav>

