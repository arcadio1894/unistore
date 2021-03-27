<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MethodsPayment_Shops extends Model
{
    protected $table="shops_method_payments";

    protected $fillable = ['shop_id','method_payments_id'];

    public function shop()
    {
        $this->hasMany('App\Shop');
    }

    public function methods()
    {
        $this->hasMany('App\MethodsPayment');
    }
}
