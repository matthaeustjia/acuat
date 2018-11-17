<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceKeluar extends Model
{
    //
    protected $fillable = ['customer_id'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function itemkeluars()
    {
        return $this->hasMany('App\ItemKeluar', 'invoiceKeluar_id');
    }

    public function getInvoiceTotal()
    {
        return $this->itemkeluars->sum(function ($itemkeluar) {
            return $itemkeluar->quantity * $itemkeluar->price;
        });
    }
}
