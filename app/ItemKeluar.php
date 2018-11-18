<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemKeluar extends Model
{
    //
    protected $fillable = ['invoiceKeluar_id', 'item_id', 'quantity', 'price'];
    public function invoicekeluar()
    {
        return $this->belongsTo('App\InvoiceKeluar');
    }

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function getTotal()
    {
        return $this->quantity * $this->price;
    }
}
