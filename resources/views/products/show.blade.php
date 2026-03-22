@extends('layouts.app')

@section('content')
<div class="container py-4">

    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary mb-4">
        ← Späť na zoznam
    </a>

    <div class="row">
        <!-- BAL OLDAL - KÉP -->
        <div class="col-md-6">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" 
                     alt="{{ $product->name }}"
                     class="img-fluid rounded shadow-sm">
            @else
                <div class="bg-light p-5 text-center rounded">
                    Bez obrázka
                </div>
            @endif
        </div>

        <!-- JOBB OLDAL - INFO -->
        <div class="col-md-6 d-flex flex-column">

            <h1 class="mb-3">{{ $product->name }}</h1>

            <p class="text-muted mb-2">
                Kategória: {{ $product->category?->name ?? 'Bez kategórie' }}
            </p>

            <h3 class="text-success mb-4">
                {{ $product->price }} €
            </h3>

            <p class="mb-4">
                {{ $product->description }}
            </p>

            <div class="mt-auto">
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning me-2">
                    Upraviť
                </a>

                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"
                            onclick="return confirm('Naozaj chcete vymazať tento produkt?')">
                        Vymazať
                    </button>
                </form>
            </div>

        </div>
    </div>

</div>
@endsection