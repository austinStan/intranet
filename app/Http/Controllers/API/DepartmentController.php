<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        try {
            $departments = Department::select('id', 'name')->get();

            return \Response::json(['departments' => $departments]);
        } catch (\Exception $e) {
            return \Response::json(['error' => $e->getMessage()]);
        }
    }
}
