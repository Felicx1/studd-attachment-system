<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    
    {  
        $internshipsCount = Internship::where('user_id', Auth::id())->count();

        return view('dashboard', ['internshipsCount' => $internshipsCount]);
    }
}
