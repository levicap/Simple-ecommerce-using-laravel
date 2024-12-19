<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        /* Remove left margin of sidebar */
        .sidebar {
            margin-left: 0 !important;
        }

        /* Adjust margin-top between sidebar items */
        .nav-item {
            margin-top: 1.5rem; /* Adjust this value as needed */
        }

        /* Add margin-right between icon and text */
        .nav-link i {
            margin-right: 10px; /* Adjust this value to control space */
        }
    </style>
</head>
<body class="d-flex flex-column" style="min-height: 100vh;">   

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand fw-bold" href="#">Admin Dashboard</a>
            <!-- Toggler for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Add any additional links here -->
                </ul>
                <!-- Login/Logout Button -->
                <a class="btn btn-outline-light btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>       
                </div>
        </div>
    </nav>
       
    <div class="container-fluid d-flex" style="height: 100vh;margin-left: 0px;">
        <!-- Sidebar Section -->
        <div class="col-md-4 col-lg-2 bg-dark text-white p-4 min-vh-100 ml-0 sidebar">
            <ul class="nav flex-column mt-4">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-house-door"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-box"></i> Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-file-earmark"></i> Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-person"></i> Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-graph-up"></i> Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-gear"></i> Settings
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content Section -->
        <div class="col-md-8 col-lg-9 p-4">
            @yield('content')

            <div class="row justify-content-center text-center mt-3">
                <div class="col-md-12">
                    <!-- Additional content goes here -->
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
