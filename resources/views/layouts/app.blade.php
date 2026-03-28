<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FlowerMarket')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-light">

    <nav class="bg-white border-bottom shadow-sm">
    <div class="container d-flex justify-content-between align-items-center py-3">

        <!-- LOGO -->
     <a href="{{ route('products.index') }}" class="d-flex align-items-center gap-3 text-decoration-none">
    <img src="{{ asset('images/logo.png') }}" alt="FlowerMarket" style="height:62px; width:auto;">

    <span style="
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        font-weight: 600;
        color: #355e3b;
        line-height: 1;
    ">
        FlowerMarket
    </span>
</a>

       <!-- MENU -->
<div class="d-flex align-items-center gap-2">

    <a href="{{ route('products.index') }}"
       class="text-decoration-none fw-semibold"
style="color:#355e3b;">
        Produkty
    </a>

    @auth
       
            Prihlásený: <span class="text-muted small me-1">
    {{ auth()->user()->name }} ({{ auth()->user()->role }})
</span>
       

        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button class="btn nav-btn nav-btn-secondary">
                Odhlásiť
            </button>
        </form>
    @endauth

    @guest
        <a href="{{ route('login') }}" class="btn nav-btn nav-btn-primary">
            Prihlásiť
        </a>
    @endguest

    <a href="{{ route('cart.index') }}" class="btn nav-btn nav-btn-primary position-relative">
        🛒 Košík
       @php
    $cartKey = auth()->check() ? 'cart_user_' . auth()->id() : 'cart_guest';
    $cart = session($cartKey, []);
    $cartCount = array_sum(array_column($cart, 'quantity'));
@endphp

        @if($cartCount > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-badge">
                {{ $cartCount }}
            </span>
        @endif
    </a>
</div>
    </div>
</nav>

    <main class="container py-4">
        @if (session('success'))
            <div class="alert alert-success shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger shadow-sm">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>