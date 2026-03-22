<form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Názov:</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
        
        @error('name')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>Cena:</label>
        <input type="text" name="price" value="{{ old('price', $product->price) }}">
        
        @error('price')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>Kategória:</label>
        <select name="category_id">
            <option value="">-- Vyber kategóriu --</option>

            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        @error('category_id')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>Popis:</label>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>

        @error('description')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    @if($product->image)
        <div>
            <p>Aktuálny obrázok:</p>
            <img src="{{ asset('storage/' . $product->image) }}" width="150">
        </div>
    @endif

    <div>
        <label>Obrázok:</label>
        <input type="file" name="image">
        
        @error('image')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Uložiť</button>
</form>