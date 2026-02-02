<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage with products
     */
    public function index()
    {
        // Get all active products
        $products = Product::where('is_active', true)
                          ->latest()
                          ->get();
        
        // Get new arrivals (latest 5 products)
        $newArrivals = Product::where('is_active', true)
                             ->latest()
                             ->take(5)
                             ->get();
        
        // Get best sellers (you can customize this logic)
        $bestSellers = Product::where('is_active', true)
                             ->inRandomOrder()
                             ->take(6)
                             ->get();
        
        return view('welcome', compact('products', 'newArrivals', 'bestSellers'));
    }
}