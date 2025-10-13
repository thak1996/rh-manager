<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RhUserController extends Controller
{
    public function index()
    {
        !Auth::user()->is_admin ?: abort(403, 'Unauthorized action.');
        $colaborators = User::where('role', 'rh')->get();
        return view('colaborators.rh-users', compact('colaborators'));
    }
    public function newColaborator()
    {
        !Auth::user()->is_admin ?: abort(403, 'Unauthorized action.');
        $departments = Department::all();
        return view('colaborators.add-rh-user', compact('departments'));
    }
    public function createRhColaborator(Request $request)
    {
        !Auth::user()->is_admin ?: abort(403, 'Unauthorized action.');
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'select_department' => 'required|exists:departments,id',
            'address' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'city' => 'required|string|max:50',
            'phone' => 'required|string|max:50',
            'salary' => 'required|decimal:2',
            'admission_date' => 'required|date_format:Y-m-d',
        ]);

        if ($request->select_department != 2) {
            return redirect()->route('home');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'rh';
        $user->department_id = $request->select_department;
        $user->permissions = '["rh"]';
        $user->save();

        $user->detail()->create([
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'admission_date' => $request->admission_date,
        ]);

        return redirect()->route('colaborators.rh-users')->with('success', 'Colaborator created successfully.');
    }
}
