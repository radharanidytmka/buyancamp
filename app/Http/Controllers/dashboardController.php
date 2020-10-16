<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function wisatawan(){
        return view('dashboardwisatawan');
    }
}
