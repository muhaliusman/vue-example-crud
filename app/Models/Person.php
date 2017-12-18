<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['people_name', 'people_address', 'people_phone_number'];
    
    public function products() {
        return $this->hasMany('App\Models\Product');
    }
}