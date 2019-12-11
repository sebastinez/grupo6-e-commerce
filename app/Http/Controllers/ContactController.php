<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("contact");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        \Mail::send('emails.contacto', [
            'name' => $request->get("name"),
            'mail' => $request->get("mail"),
            'mensaje' => $request->get("message")
        ], function ($message) {
            $message->to('contact.themusiccompany@gmail.com', "The Music Company")->subject('Solicitud de contacto');
        });
        return redirect("/contact")->with("status", "success");
    }
}
