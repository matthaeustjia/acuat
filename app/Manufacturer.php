<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    //
    protected $fillable = ['name', 'phone', 'email'];

    public function scopeSearch($query, $value)
    {
        return $query->where('name', 'LIKE', '%'.$value.'%');
    }
}
