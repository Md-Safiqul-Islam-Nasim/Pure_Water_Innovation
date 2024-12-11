@extends('backend.app')
@section('title', 'User-Edit')
@section('content')
<div class="container px-4 mx-auto sm:px-6 lg:px-8">
    <h2 class="mb-6 text-2xl font-semibold text-gray-800">Edit User Information</h2>
    <div class="p-6 bg-white rounded-md shadow-md">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- User Name --}}

            <div class="form-group">
                <label for="name" class="block text-sm font-medium text-gray-700">User Name</label>
                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Enter User name" required />
            </div>

            <!-- User Email -->

            <div class="form-group">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-control focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Enter User Email" required />
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end form-group">
                <button class="btn btn-success" type="submit">
                    <span class="btn-label">
                        <i class="fa fa-check"></i>
                    </span>
                    Save User
                </button>
            </div>
        </form>
    </div>
    @endsection