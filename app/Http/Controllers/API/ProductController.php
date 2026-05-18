<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HardwareProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Return all products, or use pagination
        $products = HardwareProduct::all();
        
        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }
}
