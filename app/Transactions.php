<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //relation to user
    public function users(){
        return $this->belongsTo('App\Users');
    }
}
