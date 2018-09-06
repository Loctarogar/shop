<?php

namespace App;
use App\Cart;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function user()
    {
      return $this->belongsTo("App\User");
    }
}
