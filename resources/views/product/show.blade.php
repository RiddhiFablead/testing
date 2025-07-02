@extends('app')

@section('content')
<div class="container my-5">
    <h2>{{ $product->name }}</h2>
    <div class="row">
        <div class="col-md-6">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
            @else
                <img src="https://via.placeholder.com/300x200?text=No+Image" class="img-fluid" alt="No Image">
            @endif
        </div>
        <div class="col-md-6">
            <p><strong>Description:</strong> {{ $product->description }}</p>
            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to All Products</a>
        </div>
    </div>
</div>
@endsection
