<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Products;



class HomeController extends Controller
{

    public function index(){
       
        if(!empty(Auth::user()) && Auth::user()->usertype == 1 ){
            return view('admin.home');
        }

        $products = Products::paginate(10);

        return view('home.userpage', compact('products'));
        
    }

    public function redirect(){
        //policy 
        if(!empty(Auth::user()) && Auth::user()->usertype == 1 ){
            return view('admin.home');
        }
        else{
            return view('home.userpage');
        }
    }

    public function product_details($id){

        $product = Products::find($id);


        return view('home.productDetails', compact('product'));
    }

    public function add_cart($id){

        if(Auth::user()){

            $product = Products::find($id);

            dd($product);



            return view('home.addCart', compact('product'));
        }
        else{
            return redirect('login');
        }

    }
}
