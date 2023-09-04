<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand align-self-start" href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menú</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Inicio</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url()->current() }}"><i class="fa fa-earth"></i> Placeholder</a>
                        <a class="nav-link" aria-current="page" href="{{ route('movie.favorites') }}"><i class="fa fa-film"></i> My Favorites</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('login') }}">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('movie.search') }}"><i class="fa fa-search"></i> Search</a>
                    </li>

                    <hr>

                </ul>
            </div>
        </div>
    </div>
</nav>
