<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemKeluar extends Model
{
    //
    public function invoicekeluar()
    {
        $this->belongsTo('App\InvoiceKeluar');
    }
}
