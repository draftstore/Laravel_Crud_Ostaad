@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="my-4">Product Details</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
            <p><strong>Name:</strong> {{ $product->name }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>
            <p><strong>Price:</strong> ${{ $product->price }}</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>
            <p><strong>Image:</strong></p>
            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="width:40px; height:auto;">
        </div>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Back to Products</a>
</div>
@endsection
