<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';

    protected $fillable = [
        'nama_barang', 'alamat', 'price',
    ];

    public function order()
    {
        return $this->hasOne('App\Order','product_id','id');
    }
}
