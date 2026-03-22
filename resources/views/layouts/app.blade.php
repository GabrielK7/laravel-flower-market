<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlowerShop</title>
</head>
<body>

    <header>
        <h1>FlowerShop</h1>

        <nav>
            <a href="{{ route('products.index') }}">Produkty</a> |
            <a href="{{ route('products.create') }}">Pridať produkt</a>
        </nav>

        <hr>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>