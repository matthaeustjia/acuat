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

    public function itemmasuks()
    {
        return $this->hasMany('App\ItemMasuk', 'invoiceMasuk_id');
    }
    
    public function getInvoiceTotal()
    {
        return $this->itemmasuks->sum(function ($itemmasuk) {
            return $itemmasuk->quantity * $itemmasuk->price;
        });
    }
}
