<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentViewController extends Controller
{
    public function index(Request $request){
        $contents = Storage::disk('uploads')->get('infectious disease.pdf');
        echo $contents;
    }
}
