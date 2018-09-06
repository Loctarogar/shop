<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Cart;
use Illuminate\Support\Facades\Input;
use Auth;


class UserController extends Controller
{
  public function getProfile()
  {
    $orders = Auth::user()->orders;
    $orders->transform(function($order, $key){
      $order->cart = unserialize($order->cart);
      return $order;
    });

    return view("userCabinet", compact("orders"));
  }
}
