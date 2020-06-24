<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use Inertia\Inertia;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all()->map(function ($dept) {
            return [
                'name' => $dept->name,
                'id' => $dept->id,
            ];
        });

        return Inertia::render('Department/Department', ['departments' => $departments]);
    }

    public function show($id)
    {
        $department = Department::find($id);

        // $staff = Staff::latest()->get()->where('department_id', $id)->map(function ($s) {
        //     return [
        //         'id' => $s->id,
        //         'name' => $s->name,
        //         'email' => $s->email,
        //         'image' => $s->image
        //     ];
        // });

        $staff = Staff::all()->map(function ($s) {
            return [
                'id' => $s->id,
                'name' => $s->name,
                'email' => $s->email,
                'image' => asset($s->image),
                'department' => $s->department_id,
            ];
        });
        //print_r($staff);
        return Inertia::render('SingleDepartment/SingleDepartment', ['department' => $department, 'staff' => $staff]);
    }
}
