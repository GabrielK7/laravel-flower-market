@extends('layouts.app')

@section('content')
    <h1>Product detail</h1>

    <div style="margin-bottom: 15px;">
        <strong>Name:</strong> {{ $product->name }}
    </div>

    <div style="margin-bottom: 15px;">
        <strong>Price:</strong> {{ $product->price }} €
    </div>

    <div style="margin-bottom: 15px;">
        <strong>Category:</strong> {{ $product->category?->name ?? 'No category' }}
    </div>

    <div style="margin-bottom: 15px;">
        <strong>Description:</strong><br>
        {{ $product->description ?? 'No description' }}
    </div>

    @if($product->image)
        <div style="margin-bottom: 15px;">
            <strong>Image:</strong><br>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="250">
        </div>
    @endif

    <a href="{{ route('products.index') }}">Back to list</a>
    <a href="{{ route('products.edit', $product) }}">Edit</a>
@endsection