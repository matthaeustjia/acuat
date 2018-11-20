<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    public function scopeItemHistory($query, $id)
    {
        $itemmasuks = DB::table('item_masuks')->selectRaw('invoiceMasuk_id as invoiceid,quantity,price,created_at, 1 as tablename')->where('item_id', '=', $id);
        $itemsinout = DB::table('item_keluars')->selectRaw('invoiceKeluar_id as invoiceid,quantity,price,created_at, 2 as tablename')->where('item_id', '=', $id)->union($itemmasuks)->orderBy('created_at', 'desc');
        return $itemsinout;
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
        return $this->itemmasuks->sum('quantity')-$this->itemkeluars->sum('quantity');
    }
}
