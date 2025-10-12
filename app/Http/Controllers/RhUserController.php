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
}
