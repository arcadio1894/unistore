<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;
use App\ContactUs;

class MailController extends Controller
{
    public function showContact()
    {
        return view('contact.contact');
    }

    public function storeContact(Request $request)
    {

        DB::beginTransaction();
        try {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        ContactUs::create($request->all());
        $correo = new contactMail($request->all());
        Mail::to('mailpruebacursophp@gmail.com')->send($correo);

        DB::commit();

        } catch ( \Throwable $e ) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 422);
        }

        return redirect('contacto')->with('info', 'Correo ha sido enviado Correctamente');
    }

}
