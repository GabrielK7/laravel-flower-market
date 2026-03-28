@extends('layouts.app')

@section('content')
<div class="container">

   
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Zoznam produktov</h2>

    @auth
        <a href="{{ route('products.create') }}" class="btn btn-outline-success">
            + Pridať produkt
        </a>
    @endauth
</div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title">Filtrovanie produktov</h5>

            <form method="GET" action="{{ route('products.index') }}" class="row g-3">
                <div class="col-md-5">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control"
                        placeholder="Hľadať podľa názvu..."
                        value="{{ request('search') }}"
                    >
                </div>

                <div class="col-md-4">
                    <select name="category" class="form-select">
                        <option value="">Všetky kategórie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-success w-100">Filtrovať</button>
                </div>

                <div class="col-md-1">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
                </div>
            </form>
        </div>
    </div>



    <br><br>

    @if($products->count())
      <div class="row">
    @forelse($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="card-img-top"
                         alt="{{ $product->name }}"
                         style="height: 220px; object-fit: cover;">
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->name }}</h5>

                    <p class="text-muted mb-1">
                        <span class="badge text-bg-secondary">
    {{ $product->category->name ?? '-' }}
</span>
                    </p>

                    <p class="card-text">
                        {{ \Illuminate\Support\Str::limit($product->description, 70) }}
                    </p>

                    <p class="fw-bold mb-3">{{ $product->price }} €</p>

                    <div class="mt-auto d-flex gap-2 flex-wrap ">
                          <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                          <form action="{{ route('cart.add', $product) }}" method="POST">
    @csrf
    <button class="btn btn-outline-success btn-sm"">Do košíka</button>
</form>
                        @auth          
                         @if(auth()->user()->role === 'admin')              
                        <a href="{{ route('products.edit', $product) }}" class=" btn-sm btn btn-outline-warning">Upraviť</a>                 
                        

                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            
                              <button type="submit"
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Naozaj chcete vymazať tento produkt?')">
                                Vymazať
                            </button>  
                            @endif
                            @endauth
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>Žiadne produkty neboli nájdené.</p>
    @endforelse
</div>
        <div class="mt-4">
            Zobrazených {{ $products->count() }} z {{ $products->total() }} produktov
    {{ $products->links() }} 
</div>
    @else
        <p>Zatiaľ nie sú pridané žiadne produkty.</p>
    @endif
</div>
@endsection