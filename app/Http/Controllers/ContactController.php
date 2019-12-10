<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;


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

        $reglas = [
            "name" => "required",
            "email" => "required|email",
            "message" => "required",
        ];

        $mensajes = [
            "required" => "El :attribute es necesario",
            "numeric" => "El campo :attribute debe ser un numero",
        ];

        $this->validate($request, $reglas, $mensajes);

        $request = $request->all();
        Mail::to("contact@sebastinez.dhalumnos.com")->send(new Contact($request));
    }
}
