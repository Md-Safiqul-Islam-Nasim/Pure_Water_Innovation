@extends('backend.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <!-- Heading Section -->
        <div class="mb-3">
            <h3 class="m-0 text-center">Users List</h3>
        </div>
        <!-- Table Section -->
        <div class="card" style="margin-top: 15px;">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if($user->role == "user")
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">{{ $user->id }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">{{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">{{ $user->email }}
                                    </td>
                                    <td class="flex items-center px-6 py-4 space-x-4 text-sm text-gray-800">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="btn btn-secondary btn-round btn-xs">
                                            <span class="btn-label"><i class="fas fa-pen-square"></i></span>Edit
                                        </a>

                                        <!-- Delete Form (with SweetAlert on button click) -->
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="d-inline-block" id="deleteForm{{ $user->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-round btn-xs" style="margin-top: 5"
                                                id="deleteBtn{{ $user->id }}">
                                                <span class="btn-label"><i class="fas fa-trash-alt"></i></span>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
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
        @foreach ($users as $user)
            document.getElementById('deleteBtn{{ $user->id }}').addEventListener('click', function(e) {
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
                        document.getElementById('deleteForm{{ $user->id }}').submit();
                    }
                });
            });
        @endforeach
    });
</script>
