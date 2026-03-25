<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FlowerMarket')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-light">

    <nav class="bg-white border-bottom shadow-sm">
    <div class="container d-flex justify-content-between align-items-center py-3">

        <!-- LOGO -->
     <span class="logo fw-bold fs-5">
    🌿<span style="color:#e91e63;">Flower</span><span style="color:#4CAF50;">Market</span>
</span>

        <!-- MENU -->
        <div class="d-flex align-items-center gap-3">

            <a href="{{ route('products.index') }}"
               class="text-decoration-none text-dark small fw-semibold">
                Produkty
            </a>

            @auth
                <span class="text-muted small">
    Prihlásený: Admin
</span>

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button class="btn btn-outline-secondary btn-sm">
                        Odhlásiť
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-success btn-sm">
                    Prihlásiť
                </a>
            @endguest

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