@extends('backend.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <!-- Heading Section -->
        <div class="mb-3">
            <h3 class="m-0 text-center">Product List</h3>
        </div>
        <!-- Table Section -->
        <div class="card flex items-center justify" style="margin-top: 15">

            <div class="card-   body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td>
                                    @if ($product->photo)
                                        <img src="{{ asset($product->photo) }}" alt="{{ $product->name }}" class="h-20 w-20 object-cover rounded" style="width: 130px; height: 130px;>
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                
                                <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">{{ $product->name }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">
                                    ${{ number_format($product->price, 2) }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">
                                    <!-- Display description as list -->
                                    <ul class="pl-5 list-disc">
                                        @foreach (explode("\n", $product->description) as $line)
                                            <li>{{ $line }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">{{ $product->price }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">{{ $product->stock }}
                                </td>
                                <td class="flex items-center px-6 py-4 space-x-4 text-sm text-gray-800">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-secondary btn-round btn-xs">
                                        <span class="btn-label"><i class="fas fa-pen-square"></i></span>Edit
                                    </a>

                                    <!-- Delete Form (with SweetAlert on button click) -->
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        class="d-inline-block" id="deleteForm{{ $product->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-round btn-xs" style="margin-top: 5"
                                            id="deleteBtn{{ $product->id }}">
                                            <span class="btn-label"><i class="fas fa-trash-alt"></i></span>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

<!-- SweetAlert and Delete Confirmation Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Loop through all delete buttons
        @foreach ($products as $product)
            document.getElementById('deleteBtn{{ $product->id }}').addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default form submission

                // Show SweetAlert
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form if confirmed
                        document.getElementById('deleteForm{{ $product->id }}').submit();
                    }
                });
            });
        @endforeach
    });
</script>
