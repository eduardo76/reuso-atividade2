<?php

namespace App;

use App\Item;
use App\Costumer;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['costumer_id', 'total'];

    public function costumer() {
        return $this->belongsTo(Costumer::class);
    }

    public function items() {
        return $this->hasMany(Item::class);
    }
}
