@extends('backend.app')
@section('title', 'User-Create')
@section('content')

    <div class="container px-4 mx-auto sm:px-6 lg:px-8">
        <!-- Heading Section -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Add New User</h2>
        </div>

        <!-- Form Section -->
        <div class="p-6 bg-white rounded-md shadow-md">
            <form action="{{ route('users.store') }}" method="POST" class="space-y-6" id="userForm">
                @csrf

                <!-- User Name -->
                <div class="p-6 space-y-6 bg-white rounded-md shadow-md">
                    <!-- User Name -->
                    <div class="form-group">
                        <label for="name" class="block text-sm font-medium text-gray-700">User Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter user name" required />
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- User Email -->
                    <div class="form-group">
                        <label for="email" class="block text-sm font-medium text-gray-700">User Email</label>
                        <input id="email" name="email" type="text" value="{{ old('email') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter user email" required />
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="block text-sm font-medium text-gray-700">User Password</label>
                        <input id="password" name="password" type="password"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter user password" required />
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm User Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter user password" required />
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Submit Button -->
                    <div class="flex justify-end form-group">
                        <button class="btn btn-success" type="submit">
                            <span class="btn-label">
                                <i class="fa fa-check"></i>
                            </span>
                            Save User Information
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
