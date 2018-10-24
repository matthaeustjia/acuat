<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'description'];
    public function scopeSearch($query, $value)
    {
        return $query->where('id', 'LIKE', '%' . $item . '%');
    }
}
