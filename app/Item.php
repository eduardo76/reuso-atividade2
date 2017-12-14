<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['order_id', 'service', 'price'];
    protected $hidden   = ['created_at', 'updated_at'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
