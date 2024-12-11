<?php

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Password;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Web\Backend\Settings\ProfileController;
    use App\Http\Controllers\Web\Backend\Settings\SystemSettingController;
    use App\Http\Controllers\Web\Backend\Settings\DynamicPageController;
    use App\Http\Controllers\Auth\RoleSelectionController;
    use App\Http\Controllers\Web\Backend\Products\ProductController;
    use App\Http\Controllers\Web\Backend\AdminNotificationController;
    use App\Http\Controllers\Web\Backend\Users\UserController;
    use App\Http\Controllers\Web\frontend\Users\UserProfileController;
    use App\Http\Controllers\Web\frontend\PageController;

    // Public Routes
    Route::get('/', function () {
        return view('frontend.layouts.home.index');
    })->name('home');

    // Forgot Password

    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->middleware('guest')->name('password.request');

    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    })->middleware('guest')->name('password.email');

    // Authenticated Routes
    Route::middleware(['auth'])->group(function () {
        // Dashboard Route (This will use the showDashboard method in the ProductController)
        
        Route::get('/dashboard', function () {
            $user = Auth::user();
        
            if ($user->role === 'admin') {
                return view('backend.layouts.dashboard.dashboard');
            }
        
            if ($user->role === 'user') {
                return view('frontend.layouts.dashboard.dashboard'); // Or any appropriate view
            }
            return redirect()->route('home'); // Handle unexpected roles
        })->name('dashboard');
        
        
        
        
        // Profile
        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'showProfile'])->name('profile.setting');
            Route::post('/', [ProfileController::class, 'UpdateProfile'])->name('update.profile');
            Route::post('/update-picture', [ProfileController::class, 'UpdateProfilePicture'])->name('update.profile.picture');
            Route::post('/update-password', [ProfileController::class, 'UpdatePassword'])->name('update.password');
            // Route::post('/update-profile-picture', [ProfileController::class, 'updateProfilePicture'])->name('update.profile.picture');

        });


        // Product Management   
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::post('/products/photo/update', [ProductController::class, 'UpdateProductPhoto'])->name('update.products.photo');
        Route::get('/show/product/{id}', [ProductController::class, 'show'])->name('products.show');



        // From Admin Part - Users
        Route::get('/users', [UserController::class, 'index'])->name('users-list');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // For creating a new user
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');  // For editing an existing user
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // For updating user details
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // For deleting a user

        
        // About Us - Contact - Services 
        Route::get('/about-us', [PageController::class, 'about'])->name('about-us');
        Route::get('/contact', [PageController::class, 'contact'])->name('contact');
        Route::get('/services', [PageController::class, 'services'])->name('services');


        // Product 
        Route::get('/product-details', [PageController::class, 'product_details'])->name('product-details');
        

        
        // User Part - Update his Information
        Route::get('/user-profile', [UserProfileController::class, 'index'])->name('user-profile');
        Route::get('/user/{id}/edit', [UserProfileController::class, 'editProfile'])->name('user-profile-edit');
        Route::post('/update-user-picture', [UserProfileController::class, 'UpdateUserProfilePicture'])->name('update.user.profile.picture');
        Route::post('/user/{id}', [UserProfileController::class, 'UpdateUserProfile'])->name('user-profile-update');
        Route::post('/user/{id}/update-password', [UserProfileController::class, 'UpdateUserPassword'])->name('update-password');

        // System Settings
        Route::get('/system', [SystemSettingController::class, 'index'])->name('system.setting');
        Route::post('/update-system', [SystemSettingController::class, 'update'])->name('system.update');

        // Dynamic Page
        Route::get('/dynamic-page', [DynamicPageController::class, 'index'])->name('dynamic_page.index');
    });
    Route::middleware(['auth'])->get('/dashboard', [ProductController::class, 'showDashboard'])->name('dashboard');

    Route::get('/company-information', [PageController::class, 'company_information'])->name('company-information');    
    // Role Selection
    Route::get('/select-role', [RoleSelectionController::class, 'showRoleSelection'])->name('selectRole');

    // Auth Routes
    require __DIR__ . '/auth.php';
