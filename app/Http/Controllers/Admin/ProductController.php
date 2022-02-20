<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
Use App\Models\Product;
use App\Models\User;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        $products = Product::all();
        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.create', compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userID = request()->user()->id ;
        
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'description' => 'required',
            'category_id' => 'required',
        
        ]);

        

        //$product = Product::create($request->all());

        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description =$request->description;
        $product->user_id = $userID;
        $product->category_id = $request->category_id;

        $product->save();


        return redirect()->route('admin.products.edit', compact('product'))->with('info', 'the product was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show (Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit (Product $product)
    {   
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:products,slug,$product->id",
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('admin.products.edit', $product)->with('info', 'the product was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy (Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('info', 'the product was deleted successfully');
    }
}
