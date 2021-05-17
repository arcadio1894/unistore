<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function showContact()
    {
        return view('contact.contact');
    }

    public function sendMail(Request $request)
    {
        $this->validate($request, [
            'name'     =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required'
           ]);
           
         $data = array(
              'name'      =>  $request->input('name'),
              'message'   =>   $request->input('message'),
              'email'   =>   $request->input('email'),
          );
      
          //$email = $request->input('email');
      
        Mail::to('joryes1894@gmail.com')->send(new ContactMail($data));
      
        return back()->with('success', 'Enviado exitosamente!');
    }
}
