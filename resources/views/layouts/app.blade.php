<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlowerShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <header>
              <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="d-flex align-items-center gap-2">
    <a href="{{ route('products.index') }}" class="btn btn-outline-light">
        Produkty
    </a>

    @auth
        <a href="{{ route('products.create') }}" class="btn btn-success">
            Pridať produkt
        </a>

        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-warning">
                Odhlásiť sa
            </button>
        </form>
    @else
        <a href="{{ route('login') }}" class="btn btn-outline-light">
            Prihlásenie
        </a>
    @endauth
</div>
</nav>

        <hr>
    </header>

    <main class="py-4">
    <div class="container">
        @yield('content')
    </div>
</main>
</body>
</html>