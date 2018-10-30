<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemMasuk extends Model
{
//
    protected $fillable = ['invoiceMasuk_id','item_id','quantity','price'];
    public function invoicemasuk()
    {
        return $this->belongsTo('App\InvoiceMasuk');
    }
    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
