<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'order_no', 'user_id','product_id','total_balance', 'status'
    ];
    
    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
