<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function admin(){
        return view('admin.dashboard');
    }

    public function wisatawan(){
        return view('wisatawan.dashboardwisatawan');
    }
}
