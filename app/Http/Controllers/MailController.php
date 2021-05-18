<?php

namespace App\Http\Controllers;

use App\Mail\MailContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function showContact()
    {
        return view('contact.contact');
    }

    public function showContactStore(Request $request){
    
       // dd($request);

        $this->validate($request,[
            'message' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
        ]);

        $attribute = array(
            'message'   =>   $request->input('message'),
            'email'      =>  $request->input('email'),
            'name'      =>  $request->input('name'),
            'phone'      =>  $request->input('phone'),
        );
        Mail::to('joryes1894@gmail.com')->send(new MailContactMail($attribute));
      
        return back()->with('success', 'Mensaje enviado exitosamente!');



    }
}
