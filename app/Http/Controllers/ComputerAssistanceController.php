<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;
use App\Models\Computerassistance;
use App\Http\Resources\ComputerAssistanceResource;
use App\Models\Department;
use App\Models\Staff;
use App\Notifications\ComputerAssistanceReport;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Prologue\Alerts\Facades\Alert;

class ComputerAssistanceController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $departments = Department::all();
      //  $user_id = Auth::id();

        return Inertia::render('ComputerAssistance/ComputerAssistance', ['departments' => $departments]);
    }

    // Store a new computer assistance request
    public function store(Request $request)
    {
        // $assistance = $request->isMethod('put')
        $assistance = new Computerassistance();

        $assistance->title = $request->input('title');
        $assistance->description = $request->input('description');
        $assistance->department_id = $request->input('department_id');
        $assistance->staff_id =Auth::user()->id;

        $admins =User::all();
        $employees = Staff::all()->except(Auth::id());
        $user=Auth::user();

        $assistance->save();
        
        $staff = [
            'title' =>$assistance->title,
            'description' =>$assistance->description,
            'department'=>$assistance->departments->name,
            'name'=>$user->name,
        ];
        Notification::send($employees, new ComputerAssistanceReport($staff));
        Notification::send($admins, new ComputerAssistanceReport($staff));
        Alert::info('A mail notification was successfully sent')->flash();
        return Redirect::to('/');
        return new ComputerAssistanceResource($assistance);
    }
 
    }