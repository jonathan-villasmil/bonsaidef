<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(){
        // $products = Product::where('active', 2)->paginate(12);
        $products = Product::orderBy('id', 'ASC')->paginate(20);
        return view('products.index', compact('products'));
    }

    public function show(Product $product){
        $similars = Product::where('category_id', $product->category_id)
        ->latest('id')
        ->where('id', '!=', $product->id)
        ->take(4)
        ->get();

        return view('products.show', compact('product', 'similars'));
    }

    public function category(Category $category){
        $products = Product::where('category_id', $category->id)
        ->where('active', 2)
        ->latest('id')
        ->paginate(6);

        return view('products.category',compact('products', 'category') );
    }
}
