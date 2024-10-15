<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .carousel-img {
            height: 300px;
            object-fit: cover;
        }
    
        .carousel-inner .row.no-gutters {
            margin-right: 0;
            margin-left: 0;
        }
    
        .carousel-inner .col-md-4 {
            padding-right: 0;
            padding-left: 0;
        }

        .self-active-learning-promo {
            background: linear-gradient(135deg, #FFA500, #FFDD94);
            padding: 50px 0;
        }

        .price-box {
            border: 2px solid #FF4500;
            padding: 20px;
            background-color: #FFF3E0;
            display: inline-block;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            transition: transform 0.3s ease-in-out;
        }

        .price-box:hover {
            transform: scale(1.05);
        }

        .price {
            color: #FF0000;
            font-size: 2.5rem;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
        }

        .best-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #FF6347;
        }

        .list li {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .list i {
            margin-right: 10px;
            color: #FFA500;
        }

        .daftar-btn {
            background-color: #D35400;
            color: #fff;
            padding: 12px 30px;
            font-size: 1.2rem;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .daftar-btn:hover {
            background-color: #C0392B;
            transform: translateY(-5px);
        }

        h2.price {
            animation: fade-in 1.2s ease-out;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1.text-primary {
            animation: fadeInDown 1.5s ease-in-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <title>BEF.ID | @yield('title')</title>
    <link rel="icon" href="/assets/logo.png">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #38b6ff;">
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

    <div>
        @yield('content')
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#carouselExample').on('slide.bs.carousel', function (e) {
                var $e = $(e.relatedTarget);
                var idx = $e.index();
                var itemsPerSlide = 3;
                var totalItems = $('.carousel-item').length;
    
                if (idx >= totalItems - (itemsPerSlide - 1)) {
                    var it = itemsPerSlide - (totalItems - idx);
                    for (var i = 0; i < it; i++) {
                        if (e.direction == "left") {
                            $('.carousel-item').eq(i).appendTo('.carousel-inner');
                        } else {
                            $('.carousel-item').eq(0).appendTo('.carousel-inner');
                        }
                    }
                }
            });
        });
    </script>

</body>
</html>
