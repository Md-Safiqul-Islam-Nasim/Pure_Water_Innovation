@extends('backend.app')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div>
        <h3 class="mb-3 fw-bold">Dashboard</h3>
        <h6 class="mb-2 op-7">Free Bootstrap 5 Admin Dashboard</h6>
    </div>

    <div class="py-2 ms-md-auto d-flex justify-content-end">
        <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="text-center icon-big icon-primary bubble-shadow-small">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Products</p>
                                <h4 class="card-title">{{ number_format($productCount) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="text-center icon-big icon-info bubble-shadow-small">
                                <i class="fas fa-user-check"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Users</p>
                                <h4 class="card-title">{{ number_format($userCount) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="text-center icon-big icon-success bubble-shadow-small">
                                <i class="fas fa-luggage-cart"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Sales</p>
                                <h4 class="card-title">$ 0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="text-center icon-big icon-secondary bubble-shadow-small">
                                <i class="far fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Orders</p>
                                <h4 class="card-title">0 </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row flex">
        <div class="card flex-1" style="margin-top: 15px;">
            <div class="mb-3">
                <h3 class="m-2   text-center">Products List</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                              
                            <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">{{ $product->id }}</td>

                            <td>
                                @if ($product->photo)
                                    <img src="{{ asset($product->photo) }}" alt="{{ $product->name }}" class="h-20 w-20 object-cover rounded" style="width: 60px; height: 70px;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td> 
                            
                            <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">
                                {{ $product->name  }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">{{ $product->price }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">{{ $product->stock }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card" style="margin-left: 100px; margin-top: 15px; width:50%">
            <div class="mb-3">
                <h3 class="m-2   text-center">Users List</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User Photo</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        @if($user->role == "user")
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">{{ $user->id }}
                            </td>

                            <td>
                                @if ($user->photo)
                                    <img src="{{ asset($user->photo) }}" alt="{{ $user->name }}" class="h-20 w-20 object-cover rounded" style="width: 130px; height: 130px;>
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">{{ $user->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800 border-b border-gray-300">{{ $user->email }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection