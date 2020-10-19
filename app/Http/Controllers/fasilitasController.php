<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fasilitasController extends Controller
{
    public function facility(){
        $data_fasilitas = \App\fasilitas::all();
        return view('admin.facility', ['data_fasilitas' => $data_fasilitas]);
    }
}
