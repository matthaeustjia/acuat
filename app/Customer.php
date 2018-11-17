<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = ['name','phone','email'];

    public function scopeSearch($query, $value)
    {
        return $query->where('name', 'LIKE', '%'.$value.'%');
    }
    
    public function invoicekeluars()
    {
        return $this->hasMany('App\InvoiceKeluar');
    }
}
