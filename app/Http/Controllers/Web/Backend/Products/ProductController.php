<?php


namespace App\Http\Controllers\Web\Backend\Products;

use App\Models\Users;
use App\Models\Product; 
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\helpers;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Storage;

use function App\Helpers\uploadImage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('backend.layouts.products.index', compact('products'));;
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        dd($product);
        return view('frontend.layouts.product.product-details', compact('product'));
    }

    public function create()
    {

        return view('backend.layouts.products.create');
    }
    public function showDashboard()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            
            $products = Product::all();
            $users = Users::all();  // Changed Users to User (correct model name)
            $productCount = Product::count();
            $userCount = Users::where('role', 'user')->count();  // Make sure to use 'user' role correctly

            // Return view with all necessary data
            return view('backend.layouts.dashboard.dashboard', compact('products', 'users', 'productCount', 'userCount'));
        } else {
            return view('frontend.layouts.dashboard.dashboard');
        }
    }




    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'nullable|string|max:255',
            'photo' => 'nullable|mimes:jpeg,png,jpg|max:4048',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'stock' => 'nullable|numeric',
        ]);
    
        // Store the product
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price ?? 0,
            'stock' => $request->stock ?? 0,
        ]);
    
        // Check if a photo has been uploaded and store it
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = uploadImage($file, 'products/', Str::random(10)); 
            
            // You can pass any name or leave it dynamic
            $product->photo = $fileName;
            $product->save();
        }
    
        // Flash success message to session
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }
    
    
    

    public function edit(Product $product)
    {
        return view('backend.layouts.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
    // public function UpdateProductPhoto(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             // 'product_id' => 'required|exists:products,id',
    //             'photo' => 'required|image|mimes:jpeg,png,jpg|max:4048',
                
    //         ]);
    
    //         $product = Product::find($request->product_id);
    
    //         // Delete old photo if exists
    //         if ($product->photo && Storage::exists($product->photo)) {
    //             Storage::delete($product->photo);
    //         }
    
    //         // Store new photo
    //         if ($request->hasFile('photo')) {
    //             $file = $request->file('photo');
    //             $fileName = Str::random(10) . '.' . $file->getClientOriginalExtension();
    //             $filePath = $file->storeAs('products', $fileName, 'public');
    //             $product->photo = 'storage/' . $filePath;
    //         }
    
    //         $product->save();
    
    //         return response()->json([
    //             'success' => true,
    //             'image_url' => asset($product->photo),
    //         ]);
    //     } catch (\Exception $e) {
    //         Log::error('Error occurred: ', ['error' => $e->getMessage()]);
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'An error occurred while updating the product photo.',
    //         ]);
    //     }
    // }
    

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
