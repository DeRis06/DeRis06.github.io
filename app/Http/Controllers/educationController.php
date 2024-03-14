<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class educationController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = riwayat::where('tipe','education')->orderBy('tanggal_akir','desc')->get();
        return view('dashboard.education.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('judul',$request->judul);
        Session::flash('info1',$request->info1);
        Session::flash('info2',$request->info2);
        Session::flash('tanggal_mulai',$request->tanggal_mulai);
        Session::flash('tanggal_akir',$request->tanggal_akir);
        $request->validate(
            [
            'judul'=>'required',
            'info1'=>'required',
            'info2'=>'required',
            'tanggal_mulai'=>'required',
            ],[
                'judul.required'=>'Judul wajib diisi',
                'info1.required'=>'Nama Sekolah wajib diisi',
                'info2.required'=>'IPK/Nilai wajib diisi',
                'tanggal_mulai.required'=>'Tanggal Mulai wajib diisi',
            ]
        );
        $data = [
            'judul'=>$request->judul,
            'info1'=>$request->info1,
            'tipe'=>'education',
            'info2'=>$request->info2,
            'tanggal_mulai'=>$request->tanggal_mulai,
            'tanggal_akir'=>$request->tanggal_akir,
        ];
        riwayat::create($data);
        return redirect()->route('education.index')->with('success','succesfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=riwayat::where('id',$id)->where('tipe','education')->first();
        return view('dashboard.education.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'judul'=>'required',
                'info1'=>'required',
                'info2'=>'required',
                'tanggal_mulai'=>'required',
                ],[
                    'judul.required'=>'Judul wajib diisi',
                    'info1.required'=>'Nama Sekolah wajib diisi',
                    'info2.required'=>'IPK/Nilai wajib diisi',
                    'tanggal_mulai.required'=>'Tanggal Mulai wajib diisi',
                ]
        );
        $data = [
            'judul'=>$request->judul,
            'info1'=>$request->info1,
            'info2'=>$request->info2,
            'tipe'=>'education',
            'tanggal_mulai'=>$request->tanggal_mulai,
            'tanggal_akir'=>$request->tanggal_akir,
        ];
        riwayat::where('id',$id)->update($data);
        return redirect()->route('education.index')->with('success','succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        riwayat::where('id', $id)->where('tipe','education')->delete(); 
        return redirect()->route('education.index')->with('success','succesfully deleted'); 
     }
 }