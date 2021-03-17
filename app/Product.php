<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'stock', 'unit_price', 'shop_id'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    // TODO: Relaciones
    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function infos()
    {
        return $this->hasMany('App\ProductInfo');
    }

    public function carts()
    {
        return $this->belongsToMany('App\Cart', 'cart_products')->withPivot('cart_id', 'quantity', 'unit_price');
    }

    public function sales()
    {
        return $this->belongsToMany('App\Sale', 'sale_products')->withPivot('sale_id', 'quantity', 'unit_price');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function top()
    {
        return $this->hasOne('App\ProductTop');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_products')->withPivot('category_id');
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
