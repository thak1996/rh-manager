<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function index()
    {
        Auth::user()->is_admin ?: abort(403, 'Unauthorized action.');
        $departments = Department::all();
        return view('department.departments', compact('departments'));
    }
}
