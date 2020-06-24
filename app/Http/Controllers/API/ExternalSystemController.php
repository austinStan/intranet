<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Internalsystem;
use Illuminate\Http\Request;

class ExternalSystemController extends Controller
{
    public function index()
    {
        try {
            $external_systems = Internalsystem::select('id', 'name', 'link')->get();

            return \Response::json(['external_systems' => $external_systems]);
        } catch (\Exception $e) {
            return \Response::json(['error' => $e->getMessage()]);
        }
    }
}
