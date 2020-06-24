<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\LogoutCollection as LogoutResource;

use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //
    public function store()
    {
        try {
            $logout = Auth::logout();
            return Redirect::route('login');

            // return new LogoutResource($names);

        } catch (\Exception $e) {
            return new LogoutResource($e);
            // return \Response::json(['error' => $e->getMessage()]);
        }
    }
}
