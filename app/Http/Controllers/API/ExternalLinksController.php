<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Internalsystem;
// use Illuminate\Http\Request;

class ExternalLinksController extends Controller
{
    public function index(){
        try
        {
            $internal_system = Internalsystem::select('id', 'name','link')->get();

            return \Response::json(['departments' => $internal_system]);
            
        }
        catch(\Exception $e)
        {
            return \Response::json(['error' => $e->getMessage()]);
        }
    }
}
