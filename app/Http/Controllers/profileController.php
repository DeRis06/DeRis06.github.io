<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    public function index(){
        return view('dashboard.profile.index');
    }

    public function update(Request $request){
        $request->validate([
            '_foto' => 'mimes:jpeg,jpg,png,gif',
            '_email' => 'required|email'
        ], [
            '_foto.mimes' => 'Hanya support JPEG,JPG,PNG dan Gif',
            '_email.required' => 'wajib diisi',
            '_email.email' => 'format tidak sesuai'
        ]);

        if($request->hasFile('_foto')){
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis'). ".$foto_ekstensi";
            $foto_file->move(public_path('foto'), $foto_baru);

            //kl update baru
            $foto_lama = get_meta_value('_foto');
            File::delete(public_path('foto')."/".$foto_lama);
            metadata::updateOrCreate(['meta_key' => '_foto'], ['meta_value'=>$foto_baru]);
        }
        metadata::updateOrCreate(['meta_key' => '_email'], ['meta_value'=>$request->_email]);
        metadata::updateOrCreate(['meta_key' => '_kota'], ['meta_value'=>$request->_kota]);
        metadata::updateOrCreate(['meta_key' => '_provinsi'], ['meta_value'=>$request->_provinsi]);
        metadata::updateOrCreate(['meta_key' => '_nomor'], ['meta_value'=>$request->_nomor]);
        metadata::updateOrCreate(['meta_key' => '_facebook'], ['meta_value'=>$request->_facebook]);
        metadata::updateOrCreate(['meta_key' => '_github'], ['meta_value'=>$request->_github]);
        metadata::updateOrCreate(['meta_key' => '_linkedin'], ['meta_value'=>$request->_linkedin]);

        return redirect()->route('profile.index')->with('success', 'Successfully added/created');
    }
}
