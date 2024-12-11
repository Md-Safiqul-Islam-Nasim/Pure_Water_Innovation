<?php

namespace App\Http\Controllers\Web\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
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
