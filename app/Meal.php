<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        'chef_id', 'image_name', 'name', 'ingredients', 'price', 'description'
    ];
}
