@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="my-4">Edit Product</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Product ID</label>
            <input type="text" name="product_id" value="{{ old('product_id', $product->product_id) }}" class="form-control">
            @error('product_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="form-control">
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control">
            @error('stock')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

<div class="file-upload-container">
    <label for="image" class="file-upload-label">
        <span class="file-upload-text">Choose Image</span>
        <input type="file" name="image" id="image" class="file-upload-input" accept="image/*">
    </label>
    <div class="file-preview" id="filePreview">
        <img id="imagePreview" src="{{ $product->image_url ?? '' }}" 
             alt="Image preview" 
             class="preview-image" 
             style="display: {{ $product->image_url ? 'block' : 'none' }}; max-width: 200px;">
    </div>
</div>



        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
