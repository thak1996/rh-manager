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
            'name' => 'required|string|max:50|unique:departments,name',
        ]);
        Department::create([
            'name' => $request->name,
        ]);
        return redirect()->route('departments')->with('success', 'Department created successfully.');
    }

    public function editDepartment($id)
    {
        !Auth::user()->is_admin ?: abort(403, 'Unauthorized action.');
        if (intval($id) === 1 ) {
            return redirect()->route('departments')->with('error', 'Invalid department ID.');
        }
        $department = Department::findOrFail($id);
        if (!$department) {
            return redirect()->route('departments')->with('error', 'Department not found.');
        }
        return view('department.edit-department', compact('department'));
    }

    public function updateDepartment(Request $request)
    {
        !Auth::user()->is_admin ?: abort(403, 'Unauthorized action.');
        $id = $request->id;
        if (intval($id) === 1 ) {
            return redirect()->route('departments')->with('error', 'Invalid department ID.');
        }
        $request->validate([
            'id' => 'required',
            'name' => 'required|string|max:50|unique:departments,name,' . $id,
        ]);
        Department::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        return redirect()->route('departments');
    }
}
