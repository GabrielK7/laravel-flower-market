<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Katalog rastlín</title>
</head>
<body>
    <h1>Zoznam rastlín</h1>
    <a href="{{ route('products.create') }}">Pridať nový produkt</a>
    @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif
    <ul>
        @foreach($products as $product)
            <li>
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Cena: {{ $product->price }} €</p>
                <p>Dostupnosť: {{ $product->stock > 0 ? 'Skladom' : 'Nedostupné' }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>