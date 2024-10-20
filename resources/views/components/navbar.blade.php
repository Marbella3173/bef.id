<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #38b6ff;">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="/" style="font-weight: bold">
                <img src="/assets/logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top" style="border-radius: 50%;">
                BEF.ID
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Combined navbar items into one collapse div -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <!-- Left-aligned menu -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>

                    @auth
                        @if (Gate::allows('admin') || Gate::allows('verified'))
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('class') }}">Class</a>
                            </li>
                        @elseif (Gate::allows('registered'))
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('form') }}">Registration Form</a>
                            </li>
                        @endif
                    @endauth
                </ul>

                <!-- Right-aligned menu for authenticated and guest users -->
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle text-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome!
                            </a>
                            <ul class="dropdown-menu">
                                //
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="text-light" href="#" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <!-- Logout form (hidden) -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
</nav>