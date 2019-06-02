<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    public $primaryKey = 'id';
    public $timestamps = false;

    public function getFullNameAttribute()
    {
    
        return $this->name;
    }

    public function jobs() {
        return $this->hasMany('App\Job');
    }
}
