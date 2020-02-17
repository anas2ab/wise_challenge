<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function foods() {
        return $this->hasMany('App\Food');
    }
}
