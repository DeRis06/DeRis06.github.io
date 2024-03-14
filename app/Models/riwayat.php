<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class riwayat extends Model
{
    use HasFactory;
    protected $table = "riwayat";
    protected $fillable = ['judul','tipe','tanggal_mulai','tanggal_akir','info1','info2','info3','isi'];

    protected $appends = ['tanggal_mulai_kerja','tanggal_akir_kerja'];
    public function gettanggalMulaiKerjaAttribute(){
        return Carbon::parse($this->attributes['tanggal_mulai'])->translatedFormat('d F Y');
    }
    public function gettanggalAkirKerjaAttribute(){
        if( $this->attributes['tanggal_akir']){
        return Carbon::parse($this->attributes['tanggal_akir'])->translatedFormat('d F Y');
        }else {
            return 'Present';
        }
    }
}
