<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function index()
    {
        !Auth::user()->is_admin ?: abort(403, 'Unauthorized action.');
        $departments = Department::all();
        return view('department.departments', compact('departments'));
    }

    public function newDepartment()
    {
        !Auth::user()->is_admin ?: abort(403, 'Unauthorized action.');
        return view('department.add-department');
    }

    public function createDepartment(Request $request)
    {
        !Auth::user()->is_admin ?: abort(403, 'Unauthorized action.');
        $request->validate([
            'name' => 'required|string|max:50|unique:departments',
        ]);
        Department::create([
            'name' => $request->name,
        ]);
        return redirect()->route('departments')->with('success', 'Department created successfully.');
    }
}
