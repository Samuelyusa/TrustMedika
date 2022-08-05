<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    public function klinik()
    {
        return  $this->belongsTo('App\Models\Klinik');
    }
    public function pegawai()
    {
        return  $this->belongsTo('App\Models\Pegawai');
    }
}
