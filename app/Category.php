<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'image', 'shop_id'];

    protected $dates = ['deleted_at'];

    // TODO: Relaciones con otras tablas
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'category_products')->withPivot('product_id');
    }

}
