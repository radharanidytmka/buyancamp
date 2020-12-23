<?php

namespace App\Http\Controllers;

use \App\fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class fasilitasController extends Controller
{
    public function showFasilitas(){
        $data_fasilitas = \App\fasilitas::all();
        return view('admin.facility', ['data_fasilitas' => $data_fasilitas]);
    }

    public function warningFacility() {
        return redirect('/facility')->with(['warning' => 'Semua data harus diisi!']);
    }

    public function successFacility() {
        return redirect('/facility')->with(['success' => 'Sukses!']);
    }

    public function errorFacility() {
        return redirect('/facility')->with(['error' => 'Format data tidak sesuai']);
    }

    public function addFasilitas(Request $request){
        $rules = array( 'create_namafasilitas' => 'required|max:50',
            'create_harga' => 'required|numeric',
            'create_jumlah' => 'required|numeric',);
            $messages = array( 'required' => 'This field is required', 
            'numeric' => 'This field must be numeric',
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if($validator->fails()){
            $message = $validator->messages();
            return redirect()->route('warningFasilitas')->withErrors($validator);
        } else {
            $data = new fasilitas();
            $data->nama_fasilitas = $request->create_namafasilitas;
            $data->harga = $request->create_harga;
            $data->jumlah = $request->create_jumlah;
            $data->save();
            return redirect()->route('successFasilitas');
        }
    }

    public function editFasilitas(Request $request, $id){
        $rules = array( 'edit_namafasilitas' => 'required|max:50',
            'edit_harga' => 'required|numeric',
            'edit_jumlah' => 'required|numeric',);
            $messages = array( 'required' => 'This field is required', 
            'numeric' => 'This field must be numeric',
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if($validator->fails()){
            $message = $validator->messages();
            return redirect()->route('errorFasilitas')->withErrors($validator);
        } else {
            $data = fasilitas::where('id', $id)->first();
            $data->nama_fasilitas = $request->edit_namafasilitas;
            $data->harga = $request->edit_harga;
            $data->jumlah = $request->edit_jumlah;
            $data->save();
            return redirect()->route('successFasilitas');
        }
    }

    public function hapusFasilitas($id){
        $data = fasilitas::where('id', $id)->first();
        $data->delete(); 
        return redirect()->route('successFasilitas');
    }
}
