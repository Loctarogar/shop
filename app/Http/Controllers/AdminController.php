<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\Tag;
use Session;
use App\Cart;
use Illuminate\Support\Facades\Input;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        //dd($products);
        return view('admin.admin', compact("categories", "products"));
    }

    public function productsByCategory($category_id){
      $products = Product::all();
      $categories = Category::all();
      $productsByCat = Product::where('category_id', $category_id)->get();
      $chousenCat = Category::find($category_id);
      //dd($chousenCat);
      return view("admin.productsByCategory", compact("products", "categories", "productsByCat", "chousenCat"));
    }

    public function productsByName(){
      $products = Product::orderBy("name")->get();
      $categories = Category::all();
      //dd($chousenCat);
      return view("admin.productsByName", compact("products", "categories"));
    }

    public function productsByPrice(){
      $products = Product::orderBy("price")->get();
      $categories = Category::all();
      //dd($chousenCat);
      return view("admin.productsByName", compact("products", "categories"));
    }


    public function show($id)
    {
        //
        $categories = Category::all();
        $product = Product::find($id);
        
        //dd($product);
        return view("admin.show", compact("product", "categories"));

      }

      public function create()
      {
        $categories = Category::all();
        $tags = Tag::all();
        $products = Product::all();
        return view("admin.create", compact("products", "categories", "tags"));
      }

      public function store(Request $request)
      {
          //

          $this->validate($request, [
            'name'        => 'required|max:255',
            "price"       => "required",
            "description" => "required",
            "category_id" => "required|integer",
          ]);

          if(Input::hasFile('file')){

            $image = Input::file('file');
            $imageName = $image->getClientOriginalName();
            $image->move('uploads', $image->getClientOriginalName());

          }else{
            $imageName = "no_file.jpg";

          }

          $product = new Product;
          $product->name = $request->name;
          $product->price = $request->price;
          $product->description = $request->description;
          $product->image = $imageName;
          $product->category_id = $request->category_id;
          $product->save();

          $product->tags()->sync($request->tags, false);

          return redirect()->route("admin.dashboard");


      }

      public function edit($id)
      {
          //
          $categories = Category::all();
          $product = Product::find($id);
          return view("admin.edit", compact("product", "categories"));

      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, $id)
      {
          //
          $product = Product::find($id);

          $this->validate($request, [
            'name'  => 'required|max:255',
            "price" => "required",
            "description" => "required",
          ]);

          if(Input::hasFile('file')){

            $image = Input::file('file');
            $imageName = $image->getClientOriginalName();
            $image->move('uploads', $image->getClientOriginalName());

          }else{
            $imageName = $product->image;

          }

          $product->name = $request->name;
          $product->price = $request->price;
          $product->description = $request->description;
          $product->image = $imageName;
          $product->save();

          return redirect()->route("admin.product.show", compact("product"));

      }

      public function destroy($id)
      {
          //
          $product = Product::find($id);
          $product->delete();

          return redirect()->route("admin.dashboard");
      }
}
