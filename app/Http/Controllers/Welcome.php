<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Illuminate\Http\Request;

class Welcome extends Controller
{
    
    public function show()
    {
        return Inertia::render('Pages/Welcome');
    }
}
