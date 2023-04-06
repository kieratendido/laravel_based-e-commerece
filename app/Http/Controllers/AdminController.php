<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();

        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request){

        $data = new Category;

        $data->categoryName = $request->category;
    
        $data->save();
    
        return redirect()->back()->with('message', 'Category Added Succesfully');
        
    }
    public function delete_category($id){
        $data= Category::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Succesfully');

    }
    public function view_product(){

        $category = Category::all();

        return view('admin.product', compact('category'));   
    }

    public function add_product(Request $request){

        $category = Auth::user();

        $product = new Products;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        // $image=$request->image;

        // $imageName = time().'.'. $image->getClientOriginalExtension();

        // $request->image->move('product', $imageName);

        // $product->image = $imageName;
        
        $product->save();

        return redirect()->back()->with('message', 'Product Added Succesfully');

    }
    public function show_product(){

        $products = Products::all();

        return view('admin.showProducts', compact('products'));
    }

    public function delete_product($id){
        $product = Products::find($id);

        $product->delete();

        return redirect()->back()->with('message', 'Product deleted succesfully');
    }

    public function edit_product($id){

        $product = Products::find($id);
        $category = Category::all();

        return view('admin.updateProduct', compact('product','category'));

    }

    public function update_product_confirm(Request $request, $id){

        $product = Products::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        
        
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save();

        return redirect()->back()->with('message', 'Product updated succesfully');


    }
}
