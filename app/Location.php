<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    public function getFullNameAttribute()
    {
    
        return $this->location;
    }
   
    public function jobs() {
        return $this->hasMany('App\Job');
    }
}
