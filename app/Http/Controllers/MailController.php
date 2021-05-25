<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
        	$rules = [
                'name' => 'required|string|min:4',
                'email' => 'required|email',
                'affair' => 'required|string|min:4',
                'message' => 'required|string|min:4'
            ];

            $messages = [
                'name.required' => 'El nombre del cliente es obligatorio.',
                'name.string' => 'El nombre debe contener caracteres válidos.',
                'name.min' => 'El nombre debe contener mínimo 4 caracteres.',
                'email.required' => 'El email del cliente es obligatorio.',
                'affair.required' => 'El asunto es obligatorio.',
                'affair.string' => 'El asunto debe contener caracteres válidos.',
                'affair.min' => 'El asunto debe contener mínimo 4 caracteres.',
                'message.required' => 'El mensaje es obligatorio.',
                'message.string' => 'El mensaje debe contener caracteres válidos.',
                'message.min' => 'El mensaje debe contener mínimo 4 caracteres.',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ( !$validator->fails() )
            {
                $data = array(
                'name'   =>   $request->input('name'),
                'email'      =>  $request->input('email'),
                'affair'      =>  $request->input('affair'),
                'message'      =>  $request->input('message'),
            	);
            	Mail::to('joryes1894@gmail.com')->send(new ContactMail($data));
            }
            DB::commit();
        } catch ( \Throwable $e ) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 422);
        }
        return response()->json($validator->messages(), 200);
    }
}
