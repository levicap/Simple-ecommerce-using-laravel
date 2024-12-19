<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Dashboard - Product Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    
<main>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
            <div class="row">
                <div class="col-md-11">
                    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                        <img src="https://www.itsolutionstuff.com/assets/images/logo-it-2.png" alt="Logo" width="300">
                    </a>          
                </div>
                <div class="col-md-1">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </header>

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Hi, {{ auth()->user()->name }}</h1>
                <p class="col-md-8 fs-4">Welcome to your dashboard. Below is a list of products styled as a cart:</p>
            </div>
        </div>

        <!-- Product Cart Section -->
        <div class="row">
            @forelse ($products as $product)
                <div class="col-md-4 mb-4">
                  <div class="card">
                    @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    @else
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVyWrS6Yo7Agn2oMVtt1xgXsx4Bnsq8BVE1A&s" class="card-img-top" alt="Placeholder">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                        <p class="card-text"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                    </div>
                </div>
                </div>
            @empty
                <p class="text-center text-danger"><strong>No products available!</strong></p>
            @endforelse
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
