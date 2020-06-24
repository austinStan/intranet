<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidentreporting;
use App\Http\Resources\IncidentReportingResource;
use App\Models\Staff;
use App\Notifications\IncidentReporting as IncidentMail;
use App\Notifications\InvoicePaid;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Facades\Redirect;
use Prologue\Alerts\Facades\Alert;

class IncidentReportingController extends Controller

{   
    // Store a reported incident
    public function store(Request $request)
    {
       
        $incident = new Incidentreporting();      

        $incident->title = $request->input('title');
        $incident->description = $request->input('description');
        $user=Auth::user();
        $incident->staff_id =$user->id;
        $employees = Staff::all()->except(Auth::id());
        $admins =User::all();
        $incident->save();
       
        $staff = [
            'title' => $incident->title,
            'description' => $incident->description,
            'name'=>$user->name
        ];
        FacadesNotification::send($employees, new IncidentMail($staff));
        FacadesNotification::send($admins, new IncidentMail($staff));
        Alert::info('A mail notification was successfully sent')->flash();
        return Redirect::to('/');

        return new IncidentReportingResource($incident);
    }
}
