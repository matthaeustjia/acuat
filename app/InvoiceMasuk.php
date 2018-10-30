<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceMasuk extends Model
{
    //
    protected $fillable = ['manufacturer_id'];


    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }

    public function itemmasuk()
    {
        return $this->hasMany('App\ItemMasuk');
    }
}
