<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index($nom) {
        return view('accueil', ['nom' => $nom]);
    }
    public function checkAge(Request $request) {
        $request->validate([
            'nom' => 'required|string',
            'age' => 'required|integer',
        ]);
    
        if ($request->age >= 18) {
            return redirect()->route('accueil', ['nom' => $request->nom]);
        } else {
            return "Désolé, vous êtes encore mineur.";
        }
    }
    
}