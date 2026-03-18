<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vytvoriť produkt</title>
</head>
<body>
    <h1>Pridať nový produkt</h1>

    <a href="{{ route('products.index') }}">Späť na zoznam produktov</a>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Názov:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="description">Popis:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="price">Cena:</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}">
        </div>

        <div>
            <label for="stock">Sklad:</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', 0) }}">
        </div>

        <div>
            <label for="image">Obrázok (cesta):</label>
            <input type="text" id="image" name="image" value="{{ old('image') }}">
        </div>

        <div>
            <label for="category_id">Kategória:</label>
            <select name="category_id" id="category_id">
                <option value="">-- Vyber kategóriu --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Uložiť produkt</button>
    </form>
</body>
</html>