<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ColaboratorsController extends Controller
{
    public function index()
    {
        !Auth::user()->is_admin ?: abort(403, 'Unauthorized action.');
        $colaborators = User::with('detail', 'department')->where('role', '<>', 'admin')->get();
        return view('colaborators.admin-all-colaborators', compact('colaborators'));
    }

    public function showDetails($id)
    {
        !Auth::user()->is_admin ?: abort(403, 'Unauthorized action.');
        if (Auth::user()->id === $id) {
            return redirect()->route('home');
        }
        $colaborator = User::with('detail', 'department')->where('id', $id)->first();
        return view('colaborators.show-details')->with('colaborator', $colaborator);
    }
    public function deleteColaborator($id)
    {
        !Auth::user()->is_admin ?: abort(403, 'Unauthorized action.');
        if (Auth::user()->id === $id) {
            return redirect()->route('home');
        }
        $colaborator = User::findOrFail($id);
        return view('colaborators.delete-colaborator-confirm')->with('colaborator', $colaborator);
    }
    public function deleteColaboratorConfirm($id)
    {
        !Auth::user()->is_admin ?: abort(403, 'Unauthorized action.');
        if (Auth::user()->id === $id) {
            return redirect()->route('home');
        }
        $colaborator = User::findOrFail($id);
        $colaborator->delete();
        return redirect()->route('colaborators.all-colaborators')->with('success', 'Colaborator deleted successfully.');
    }
}
