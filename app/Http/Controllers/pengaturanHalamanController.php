<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\metadata;
use Illuminate\Http\Request;

class pengaturanHalamanController extends Controller
{
    public function index(){
        $datahalaman = halaman::orderBy('judul', 'asc')->get();
        return view("dashboard.pengaturanhalaman.index")->with('datahalaman', $datahalaman);
    }
    public function update(Request $request){
        metadata::updateOrCreate(['meta_key'=>'_halaman_about'], ['meta_value'=>$request->_halaman_about]);
        metadata::updateOrCreate(['meta_key'=>'_halaman_interest'], ['meta_value'=>$request->_halaman_interest]);
        metadata::updateOrCreate(['meta_key'=>'_halaman_awards'], ['meta_value'=>$request->_halaman_awards]);
        metadata::updateOrCreate(['meta_key'=>'_halaman_profile'], ['meta_value'=>$request->_halaman_profile]);
        metadata::updateOrCreate(['meta_key'=>'_halaman_education'], ['meta_value'=>$request->_halaman_education]);
        metadata::updateOrCreate(['meta_key'=>'_halaman_experience'], ['meta_value'=>$request->_halaman_experience]);
        return redirect()->route('pengaturanhalaman.index')->with('success','succesfully updated page');
    }
}