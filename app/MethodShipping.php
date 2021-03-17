<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MethodShipping extends Model
{

    protected $fillable = ['name', 'image', 'shop_id'];

    // TODO: Relaciones
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
     
    public function sales()
    {
        $this->hasMany('App\Sale');
    }
}
