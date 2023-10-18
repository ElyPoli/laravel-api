<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Salvo i dati relativi al form inviato dal frontend
    public function store(Request $request) {
        $data = $request->validate([
            "email" => "required|email",
            "name" => "required",
            "text" => "required"
        ]);

        // Salvo all'interno della tabella contatti i dati del form
        $newContact = new Contact();
        $newContact->email = $data["email"];
        $newContact->name = $data["name"];
        $newContact->message = $data["text"];
        $newContact->save();

        return response()->json([
            "message" => "Grazie del messaggio"
        ], 201);
    }
}
