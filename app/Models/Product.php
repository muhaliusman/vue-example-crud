<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['person_id', 'product_name', 'product_total', 'product_price'];

    public function person() {
        return $this->belongsTo('App\Models\Person');
    }
}
