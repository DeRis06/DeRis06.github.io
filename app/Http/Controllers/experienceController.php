<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class experienceController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = riwayat::where('tipe','experience')->orderBy('tanggal_akir','desc')->get();
        return view('dashboard.experience.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('judul',$request->judul);
        Session::flash('info1',$request->info1);
        Session::flash('tanggal_mulai',$request->tanggal_mulai);
        Session::flash('tanggal_akir',$request->tanggal_akir);
        Session::flash('isi',$request->isi);
        $request->validate(
            [
            'judul'=>'required',
            'info1'=>'required',
            'tanggal_mulai'=>'required',
            'isi'=>'required',
            ],[
                'judul.required'=>'Judul wajib diisi',
                'info1.required'=>'Nama Perusahaan wajib diisi',
                'tanggal_mulai.required'=>'Tanggal Mulai wajib diisi',
                'isi.required'=>'isi wajib diisi',
            ]
        );
        $data = [
            'judul'=>$request->judul,
            'info1'=>$request->info1,
            'tipe'=>'experience',
            'tanggal_mulai'=>$request->tanggal_mulai,
            'tanggal_akir'=>$request->tanggal_akir,
            'isi'=>$request->isi
        ];
        riwayat::create($data);
        return redirect()->route('experience.index')->with('success','succesfully added');
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
        $data=riwayat::where('id',$id)->where('tipe','experience')->first();
        return view('dashboard.experience.edit')->with('data',$data);
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
                'tanggal_mulai'=>'required',
                'isi'=>'required',
                ],[
                    'judul.required'=>'Judul wajib diisi',
                    'info1.required'=>'Nama Perusahaan wajib diisi',
                    'tanggal_mulai.required'=>'Tanggal Mulai wajib diisi',
                    'isi.required'=>'isi wajib diisi',
                ]
        );
        $data = [
            'judul'=>$request->judul,
            'info1'=>$request->info1,
            'tipe'=>'experience',
            'tanggal_mulai'=>$request->tanggal_mulai,
            'tanggal_akir'=>$request->tanggal_akir,
            'isi'=>$request->isi
        ];
        riwayat::where('id',$id)->update($data);
        return redirect()->route('experience.index')->with('success','succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        riwayat::where('id', $id)->where('tipe','experience')->delete(); 
        return redirect()->route('experience.index')->with('success','succesfully deleted'); 
     }
 }