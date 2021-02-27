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
}
