<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use App\Models\Emergencycontacts;


use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    //
    public function index()
    {
        $emergency_contacts = Emergencycontacts::all();

        return Inertia::render('Emergency/Emergency', ['emergency_contacts' => $emergency_contacts]);
    }
}
