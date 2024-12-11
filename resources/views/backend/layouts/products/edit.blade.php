@extends('backend.app')
@section('title', 'Product-Edit')
@section('content')
    <div class="container px-4 mx-auto sm:px-6 lg:px-8">
        <h2 class="mb-6 text-2xl font-semibold text-gray-800">Edit Product</h2>
        <div class="p-6 bg-white rounded-md shadow-md">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $product->name) }}" required
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Enter product name" required />
                </div>

                <!-- Product Description -->
                <div class="form-group">
                    <label for="description" class="block text-sm font-medium text-gray-700">Product Description</label>
                    <textarea id="description" name="description"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Enter product description" rows="4" required>{{ old('description', $product->description) }}</textarea>

                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price" class="block text-sm font-medium text-gray-700">Product Price</label>
                    <input id="price" name="price" type="number" step="0.01"
                        value="{{ old('name', $product->price) }}" required
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Enter product price" required />
                    @error('price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stock Quantity -->
                <div class="form-group">
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
                    <input id="stock" name="stock" type="number" value="{{ old('name', $product->stock) }}" required
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Enter stock quantity" required />
                    @error('stock')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end form-group">
                    <button class="btn btn-success" type="submit">
                        <span class="btn-label">
                            <i class="fa fa-check"></i>
                        </span>
                        Save Product
                    </button>
                </div>
            </form>
        </div>
    @endsection
