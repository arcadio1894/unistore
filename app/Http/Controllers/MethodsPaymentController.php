<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MethodsPayment as methodPay;
use App\Shop;

class MethodsPaymentController extends Controller
{
    public function index()
    {
    $metodos = methodPay::with('shop')->get();
    $shops = Shop::get(['id', 'name']);
    //dd($categories);
    return view('methodspayment.index', compact('metodos', 'shops'));
    }
}
