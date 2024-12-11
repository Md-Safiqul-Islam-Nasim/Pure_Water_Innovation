@extends('backend.app')
@section('title', 'Product-Create')
@section('content')

    <div class="container px-4 mx-auto sm:px-6 lg:px-8">
        <!-- Heading Section -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Add New Product</h2>
        </div>

        <!-- Form Section -->
        <div class="p-6 bg-white rounded-md shadow-md">
            
            <form action="{{ route('products.store') }}" method="POST" class="space-y-6" id="productForm" enctype="multipart/form-data">
                @csrf

 
                <div class="p-6 space-y-6 bg-white rounded-md shadow-md">
                    <!-- Product Name -->
                    <div class="form-group">
                        <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter product name"  />
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    
                    {{-- Product Photo --}}

                    <div class="form-group">
                        <label for="photo" class="block text-sm font-medium text-gray-700">Product Photo</label>
                        <input id="photo" name="photo" type="file" 
                               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                               accept="image/*"  />
                        @error('photo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    

                    <!-- Product Description -->
                    <div class="form-group">
                        <label for="description" class="block text-sm font-medium text-gray-700">Product Description</label>
                        <textarea id="description" name="description"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter product description" rows="4" >{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div class="form-group">
                        <label for="price" class="block text-sm font-medium text-gray-700">Product Price</label>
                        <input id="price" name="price" type="number" step="0.01" value="{{ old('price') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter product price"  />
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Stock Quantity -->
                    <div class="form-group">
                        <label for="stock" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
                        <input id="stock" name="stock" type="number" value="{{ old('stock') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter stock quantity" />
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
                </div>
            </form>
        </div>
    </div>
@endsection
