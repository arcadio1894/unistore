<?php

namespace App\Observers;

use App\Category;
use App\Mail\CategoryMail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CategoryObserver
{
    
    public function created(Category $category)
    {

        $user = User::find(Auth::user()->id);
        Mail::to('joryes1894@gmail.com')->send( new CategoryMail($category, $user) );
        logger('Email enviado ...');
    }

    
    public function updated(Category $category)
    {
        //
    }

    
    public function deleted(Category $category)
    {
        //
    }

  
    public function restored(Category $category)
    {
        //
    }

   
    public function forceDeleted(Category $category)
    {
        //
    }
}
