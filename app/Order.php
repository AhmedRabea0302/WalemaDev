<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getUser() {
        return $this->belongsTo('App\NormalUSer', 'user_id');
    }

    public function getChef() {
        return $this->belongsTo('App\Chef', 'chef_id');
    }
}
