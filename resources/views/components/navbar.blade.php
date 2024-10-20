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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('class') }}">Class</a>
                    </li>

                    @auth
                        @if (Gate::allows('admin'))
                            <li class="nav-item">
                                <a class="nav-link active" href="/database">Database</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/calendar-admin">Calendar</a>
                            </li>
                        @elseif (Gate::allows('registered'))
                            <li class="nav-item">
                                <a class="nav-link active" href="/calendar-student">Calendar</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" href="/form">Registration Form</a>
                            </li>
                        @endif
                    @endauth
                </ul>

                <!-- Right-aligned menu for authenticated and guest users -->
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle text-warning" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome, {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item text-warning" href="/logout">Sign Out</a></li>
                        </ul>
                    </li>
                    @endauth

                    @guest
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="/register">Register</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
</nav>