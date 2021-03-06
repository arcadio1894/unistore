<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['cart_id', 'state', 'total', 'method_payment_id',
        'method_shipping_id', 'customer_address_id'];

    // TODO: Relaciones
    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function payment()
    {
        return $this->belongsTo('App\MethodsPayment', 'method_payment_id');
    }

    public function shipping()
    {
        return $this->belongsTo('App\MethodShipping', 'method_shipping_id');
    }

    public function address()
    {
        return $this->belongsTo('App\CustomerAddress', 'customer_address_id');
    }

}
