<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Tag;
use Session;
use App\Cart;
use Illuminate\Support\Facades\Input;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth:admin', ['only' => 'edit', 'update']);
     }


    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $carousels = Product::all()->random(4);
        return view("layouts._shop", compact("products", "categories", "carousels"));
    }

     // Cart functions

     public function getAddToCart(Request $request, $id) {
         $product = Product::find($id);
         $oldCart = Session::has('cart') ? Session::get('cart') : null;
         $cart = new Cart($oldCart);
         $cart->add($product, $product->id);
         $request->session()->put('cart', $cart);
         //Session::flush();
         //dd($request->session()->get("cart"));
         return back();
     }

     public function getCart() {
         //Session::flush();
         //dd($request->session()->get("cart"));
       if (!Session::has('cart')) {
           return view('cart.shopping-cart');
       }
       $oldCart = Session::get('cart');
       $cart = new Cart($oldCart);
       //dd($cart);
       return view('cart.shopping-cart', ['cart' => $cart, 'products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
     }

     public function delOneCartItem(Request $request, $id){
       $product = Product::find($id);
       $oldCart = Session::has('cart') ? Session::get('cart') : null;
       $cart = new Cart($oldCart);
       $cart->delOne($product, $product->id);
       $request->session()->put('cart', $cart);
       //Session::flush();
       //dd($request->session()->get("cart"));
       return redirect()->route('product.shoppingCart');

     }

     public function delCartItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->del($id);
        Session::put('cart', $cart);

        return redirect()->route('product.shoppingCart');
     }

     //End of cart functions

     //Product by category

     public function productsByCategory($category_id){
       $products = Product::all();
       $categories = Category::all();
       //$carousels = Product::all()->random(4);
       $productsByCat = Product::where('category_id', $category_id)->get();
       //dd($chousenCat);
       return view("layouts._productsByCategory", compact("products", "categories", "productsByCat"));
     }

     //End of product by category

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $categories = Category::all();
        $product = Product::find($id);
        return view("layouts._show", compact("product", "categories"));

      }

}
