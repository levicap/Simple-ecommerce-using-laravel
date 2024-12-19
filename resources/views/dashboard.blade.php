<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Product Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .hero {
            position: relative;
            background: url('/sh2.png') no-repeat center center/cover;
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
        }

        .prodcontain {
            width: 1250px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-top: 50px;
            margin-left: 50px;
        }

        .p {
            background-color: white;
            width: 220px;
            height: 280px;
            margin-right: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
        }

        .hero-content {
            margin-top: 140px;
            position: relative;
            text-align: center;
            z-index: 1;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .shop-now-btn {
            background-color: #d71d63;
            color: white;
            padding: 12px 30px;
            font-size: 1.25rem;
            border-radius: 50px;
            text-decoration: none;
        }

        .shop-now-btn:hover {
            background-color: #c2185b;
        }
    </style>
</head>
<body>
<main>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand fw-bold" href="#">Isims Store</a>
            <!-- Toggler for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <!-- Search Bar -->
                <form class="d-flex me-3">
                    <input class="form-control form-control-sm" type="search" placeholder="Search" aria-label="Search">
                </form>
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1>Isims Store</h1>
                <p>Where style meets comfort. Discover our exclusive collection.</p>
                <a href="#shop" class="shop-now-btn">Shop Now</a>
            </div>
        </div>
    </section>
    

    <!-- Product Cart Section -->
    <div class="prodcontain row g-4">
    <h1 class="mb-4 text-center fw-bold ">Our Products:</h1>
    @forelse ($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card shadow-lg border-0 h-100 rounded-3 overflow-hidden transform-hover">
                @if ($product->image)
                    <div class="position-relative">
                        <!-- Image with object-fit to cover the card -->
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top rounded-top" alt="{{ $product->name }}" style="object-fit: cover; height: 220px;">
                        <div class="badge bg-primary position-absolute top-0 end-0 m-2 px-3 py-2 rounded-pill">New</div>
                    </div>
                @else
                    <!-- Fallback placeholder image -->
                    <img src="https://via.placeholder.com/350x250?text=No+Image" 
                         class="card-img-top rounded-top" 
                         alt="Placeholder" 
                         style="object-fit: cover; height: 220px;">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-dark">{{ $product->name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($product->description, 90, '...') }}</p>
                    <div class="mt-auto">
                        <p class="mb-2"><strong class="text-secondary">Price:</strong> ${{ number_format($product->price, 2) }}</p>
                        <p><strong class="text-secondary">Quantity:</strong> {{ $product->quantity }}</p>
                        <a href="#" class="btn btn-outline-primary btn-sm w-100 mt-2 rounded-pill">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center text-danger"><strong>No products available!</strong></p>
    @endforelse
</div>



    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <!-- About Section -->
                <div class="col-md-4 mb-4">
                    <h5>About Us</h5>
                    <p class="small">We are a modern e-commerce platform providing the best products at affordable prices. Customer satisfaction is our priority.</p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-4 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Shop</a></li>
                        <li><a href="#" class="text-white text-decoration-none">About</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-md-4 mb-4">
                    <h5>Contact Us</h5>
                    <p class="small"><i class="bi bi-geo-alt-fill"></i> route tunis km10</p>
                    <p class="small"><i class="bi bi-envelope-fill"></i> support@isims.com</p>
                    <p class="small"><i class="bi bi-telephone-fill"></i> +216 20202020</p>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="text-center mt-4">
                <a href="#" class="text-white mx-2"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white mx-2"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-white mx-2"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-white mx-2"><i class="bi bi-linkedin"></i></a>
            </div>

            <hr class="border-light my-4">

            <!-- Footer Bottom -->
            <div class="text-center small">
                &copy; 2024 Isims Store. All rights reserved.
            </div>
        </div>
    </footer>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
