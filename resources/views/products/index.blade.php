@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Zoznam produktov</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif
    <h5>Filtrovanie produktov</h5>
<form method="GET" action="{{ route('products.index') }}" style="margin-bottom: 20px;">
    <input 
        type="text" 
        name="search" 
        placeholder="Hľadať podľa názvu..."
        value="{{ request('search') }}"
    >

    <select name="category">
        <option value="">Všetky kategórie</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Filtrovať</button>
    <a href="{{ route('products.index') }}">Resetovať</a>
</form>
    <a href="{{ route('products.create') }}">Pridať nový produkt</a>

    <br><br>

    @if($products->count())
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Obrázok</th>
                    <th>Názov</th>
                    <th>Cena</th>
                    <th>Kategória</th>
                    <th>Popis</th>
                    <th>Akcie</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" width="100">
                            @else
                                Bez obrázka
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} €</td>
                        <td>{{ $product->category ? $product->category->name : 'Bez kategórie' }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('products.show', $product) }}">Detail</a> |
                            <a href="{{ route('products.edit', $product) }}">Upraviť</a>

                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Naozaj chcete vymazať tento produkt?')">
                                    Vymazať
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="margin-top: 20px;">
    {{ $products->links() }}
</div>
    @else
        <p>Zatiaľ nie sú pridané žiadne produkty.</p>
    @endif
</div>
@endsection