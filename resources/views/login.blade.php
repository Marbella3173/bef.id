@extends('guest')

@section('title', 'Login')

@section('content')

    <div class="container-fluid d-flex align-items-center justify-content-center vh-100" style="background-color: #38b6ff;">
        <div class="position-relative w-100" style="max-width: 400px;">
            <!-- Login Form inside the white box -->
            <div class="bg-white p-4 rounded shadow">
                <!-- Logo at the top of the box -->
                <div class="text-center mb-3"> 
                    <img src="/assets/logo.png" class="rounded-circle" alt="logo" style="width: 100px; height: 100px; background-color: white; border: 2px solid black;">
                </div>

                <form class="row g-3 align-items-center" action="/login" method="POST">
                    @csrf
                    <div class="row-auto">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required>
                    </div>

                    <div class="row-auto">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    </div>

                    <div class="col-12 text-end">
                        <a href="/forgot-password" class="text-muted">Forgotten your username or password?</a>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success w-100">Log in</button>
                    </div>

                    <div class="col-12 text-center mt-2">
                        <p class="text-dark" style="margin: 0;">Not yet a student? Register <a href="/register" class="text-dark">here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
