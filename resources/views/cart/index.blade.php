@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Košík</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart))
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Názov</th>
                            <th>Cena</th>
                            <th>Množstvo</th>
                            <th>Spolu</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp

                        @foreach($cart as $id => $item)
                            @php $subtotal = $item['price'] * $item['quantity']; @endphp
                            @php $total += $subtotal; @endphp

                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ number_format($item['price'], 2) }} €</td>
                                <td> <div class="d-flex align-items-center gap-2">
        <form action="{{ route('cart.decrease', $id) }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-danger">-</button>
        </form>

        <span class="fw-semibold">{{ $item['quantity'] }}</span>

        <form action="{{ route('cart.increase', $id) }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-success">+</button>
        </form>
    </div></td>
                                <td>{{ number_format($subtotal, 2) }} €</td>
                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Odstrániť
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h4 class="text-end">Celkom: {{ number_format($total, 2) }} €</h4>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            Košík je zatiaľ prázdny.
        </div>
    @endif

    <a href="{{ route('products.index') }}" class="btn btn-outline-primary mt-3">
        Späť na produkty
    </a>
</div>
@endsection