@extends('layouts.app')

@section('content')
    <h1>Pridať produkt</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Názov:</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label>Cena:</label>
            <input type="text" name="price" value="{{ old('price') }}">
        </div>
        
        <div>
        <label>Kategória:</label>
        <select name="category_id">
            <option value="">-- Vyber kategóriu --</option>

            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

        <div>
            <label>Popis:</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label>Obrázok:</label>
            <input type="file" name="image">
        </div>

        <button type="submit">Uložiť</button>
    </form>
@endsection