<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Walloffame;

use Illuminate\Http\Request;

class WalloffameController extends Controller
{
    //
    public function index()

    {
        $famous_employees = Walloffame::all()->map(function($em) {
            return [
                'id' => $em->id,
                'name' => $em->staffs->name,
                'email' => $em->staffs->email,
                'department' => $em->departments->name,
                'duration' =>$em->duration,
                'image' => asset($em->staffs->image)
            ];
        });
        return Inertia::render('WallOfFame/WallOfFame', ['famous_employees' => $famous_employees]);
        # code...
    }
    
}
