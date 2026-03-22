@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Zoznam produktov</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

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
    @else
        <p>Zatiaľ nie sú pridané žiadne produkty.</p>
    @endif
</div>
@endsection