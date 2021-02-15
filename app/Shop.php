<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'address', 'phone'];

    protected $dates = ['delete_at'];

    // TODO: Faltan las relaciones
    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function payments()
    {
        return $this->hasMany('App\MethodPayment');
    }

    public function shippings()
    {
        return $this->hasMany('App\MethodShipping');
    }

    public function shops()
    {
        return $this->hasMany('App\Shop');
    }

}
