<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MethodsPayment extends Model
{
    use SoftDeletes;
    protected $table="method_payments";

    protected $fillable = ['name','image'];

    protected $dates = ['deleted_at'];

    public function sales()
    {
        $this->hasMany('App\Sale');
    }

    public function method_shop()
    {
        return $this->belongsTo('App\MethodsPayment_Shops');
    }
}
