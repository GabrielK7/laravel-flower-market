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
    <div class="container">
        <a class="navbar-brand" href="{{ route('products.index') }}">
            🌸 FlowerShop
        </a>

        <div>
            <a href="{{ route('products.index') }}" class="btn btn-outline-light me-2">
                Produkty
            </a>

            <a href="{{ route('products.create') }}" class="btn btn-success">
                Pridať produkt
            </a>
        </div>
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