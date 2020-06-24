<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Inertia\Inertia;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    //
    public function index()
    {
        $documents = Documents::latest()->get()->map(function ($document) {
            return [
                'id' => $document->id,
                'name' => $document->name,
                'link' => asset($document->image),
                'description' => $document->description,
                'created_at' => $document->created_at
            ];
        });

        return Inertia::render('Documents/Documents', ['documents' => $documents]);
    }


    // Get a Single Document
    public function show($id)
    {
        $get_document = Documents::find($id);

        // dd($document);

        // $ron = $document->map(function ($d) {
        //     return asset($d->image);
        // });
        $document = array(
            'id' => $get_document->id, 'name' => $get_document->name, 'image' => asset($get_document->image),
            'description' => $get_document->description, 'department_id' => $get_document->department_id,
            'created_at' => $get_document->created_at
        );
        // dd($ron);

        return Inertia::render('DocumentDetails/DocumentDetails', ['document' => $document]);
    }
}
