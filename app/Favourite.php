<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    public function getChefs() {
        return $this->belongsTo('App\Chef', 'chef_id');
    }
}
