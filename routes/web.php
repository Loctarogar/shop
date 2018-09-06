<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Routes for cart
Route::get("/add-to-cart/{id}", "ProductController@getAddToCart")->name("product.addToCart");
Route::get("/shopping-cart", "ProductController@getCart")->name("product.shoppingCart");
Route::get("/delOne/{id}", "ProductController@delOneCartItem")->name("product.delOneCartItem");
Route::get("/del/{id}", "ProductController@delCartItem")->name("product.delCartItem");
Route::get("/prodByCat/{category_id}", "ProductController@productsByCategory")->name("product.productsByCategory");
//End routes for cart

Route::get("userCabinet", "UserController@getProfile")->name("userCabinet");


//Resource routes
Route::resource("/category", "CategoryController");
Route::resource("/tag", "TagController");
Route::resource("/product", "ProductController", ["except" => ["create", "update", "store", "edit", "destroy"]]);
Route::resource("/order", "OrderController");
//End resource routes

//Authentication routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post("/logout", "Auth\LoginController@userLogout")->name("userLogout");

Route::prefix("admin")->group(function(){
  Route::get("/product/create", "AdminController@create")->name("admin.product.create");
  Route::post("/product/store", "AdminController@store")->name("admin.product.store");
  Route::get("/product/{id}/edit", "AdminController@edit")->name("admin.product.edit");
  Route::put("/product/{id}", "AdminController@update")->name("admin.product.update");
  Route::get("/product/{id}/destroy", "AdminController@destroy")->name("admin.product.destroy");

  Route::get("/product/{product}", "AdminController@show")->name("admin.product.show");
  Route::get("/prodByName", "AdminController@productsByName")->name("admin.productsByName");
  Route::get("/prodByPrice", "AdminController@productsByPrice")->name("admin.productsByPrice");
  Route::get("/prodByCat/{category_id}", "AdminController@productsByCategory")->name("admin.productsByCategory");
  Route::get("/", "AdminController@index")->name("admin.dashboard");



  Route::get("/login", "Auth\AdminLoginController@showLoginForm")->name("admin.login");
  Route::post("/login", "Auth\AdminLoginController@login")->name("admin.login.submit");
  Route::post("/logout", "Auth\AdminLoginController@logout")->name("admin.logout");

  Route::post("password/email", "Auth\AdminForgotPasswordController@sendResetLinkEmail")->name("admin.password.email");
  Route::post("password/reset", "Auth\AdminResetPasswordController@reset");
  Route::get("password/reset", "Auth\AdminForgotPasswordController@showLinkRequestForm")->name("admin.password.request");
  Route::get("password/reset/{token}", "Auth\AdminResetPasswordController@showResetForm")->name("admin.password.reset");
});
//End
