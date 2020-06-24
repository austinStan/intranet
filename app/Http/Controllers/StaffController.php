<?php

namespace App\Http\Controllers;

use App\Models\Staff;
// use App\Models\UserProfile;
use Inertia\Inertia;

// use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $staff_members = Staff::latest()->get()->map(function ($staff) {
            return [
                'id' => $staff->id,
                'name' => $staff->name,
                'email' => $staff->email,
                'department' => $staff->departments->name,
                'image' => asset($staff->image)
            ];
        });

        return Inertia::render('Staff/Staff', ['staff_members' => $staff_members]);
    }

    public function show($user_id)
    {
        $staff_image = Staff::find($user_id);

      //  $staff = UserProfile::find($user_id);

        return Inertia::render('StaffDetails/StaffDetails', ['staff_image' => $staff_image]);
    }
}
