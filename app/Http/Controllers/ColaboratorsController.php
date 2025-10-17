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
       $colaborators = User::with('detail', 'department')
           ->where('role', '<>', 'admin')
           ->get();
       return view('colaborators.admin-all-colaborators', compact('colaborators'));
   }
}
