<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getUser() {
        return $this->belongsTo('App\NormalUSer', 'user_id');
    }
}
