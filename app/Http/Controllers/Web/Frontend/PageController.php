<?php

namespace App\Http\Controllers\Web\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    public function home()
    {
        $user = Auth::user();

        $products = Product::all();
        
        if ($user->role === 'admin') {
            return view('backend.layouts.dashboard.dashboard');
        }
    
        if ($user->role === 'user') {
            return view('frontend.layouts.dashboard.dashboard', compact('products')); // Or any appropriate view
        }
        return redirect()->route('home');
    }

    public function about()
    {
        return view('frontend.layouts.about-us');
    }

    public function contact()
    {
        return view('frontend.layouts.contact');
    }

    public function company_information(){
        return view('frontend.layouts.company.company-information');
    }

    public function product_details(){
        return view('frontend.layouts.product.product-details');
    }
 
}
