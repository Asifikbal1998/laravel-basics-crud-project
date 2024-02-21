<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {

        //validation data
        $request->validate([
            'productname' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,gif|max:1000'
        ]);

        //upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $products = new Product();
        $products->image = $imageName;
        $products->name = $request->productname;
        $products->description = $request->description;
        $products->save();
        return redirect('/')->withSuccess('Product Created!!!!!!');
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('products.edit')->with('products', $products);
    }

    public function update($id, Request $request)
    {
        //validation data
        $request->validate([
            'productname' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpg,gif|max:1000'
        ]);

        $products = Product::find($id);

        if(isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $products->image = $imageName;
        }
        
        $products->name = $request->productname;
        $products->description = $request->description;
        $products->save();
        return redirect('/')->withSuccess('Product Updated!!!!!!');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return back()->withError('Product Deleted Successfully!!!!!');
    }

    public function view($id) {
        $products = Product::find($id);
        return view('products.view')->with('products',$products);
    }
}
