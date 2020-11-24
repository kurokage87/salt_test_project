<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopUpBalance extends Model
{
    protected $table = 'top_up_balance';

    protected $fillable  = [
        'user_id', 'no_telp','top_up_value'
    ];
}
