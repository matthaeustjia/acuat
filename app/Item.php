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
        return $query->where('id', 'LIKE', '%' . $value . '%')->
        orWhere('name', 'LIKE', '%' . $value . '%')->limit(10);
    }

    public function itemmasuks()
    {
        return $this->hasMany('App\ItemMasuk');
    }

    public function itemkeluars()
    {
        return $this->hasMany('App\ItemKeluar');
    }
    
    public function countStock()
    {
        return $this->itemmasuks->sum('quantity');
    }
}
