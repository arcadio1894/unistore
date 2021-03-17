<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['cart_id', 'state', 'total', 'method_payment_id',
        'method_shipping_id', 'customer_address_id', ''];

    // TODO: Relaciones
    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function payment()
    {
        return $this->belongsTo('App\MethodsPayment');
    }

    public function shipping()
    {
        return $this->belongsTo('App\MethodShipping');
    }

    public function address()
    {
        return $this->belongsTo('App\CustomerAddress');
    }


}
