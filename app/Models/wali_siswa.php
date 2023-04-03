<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wali_siswa extends Model
{
    use HasFactory;
    protected $table ='wali_siswas';

    //assign primary key
    protected $primaryKey = 'id_wali';

    //fillable
    protected $fillable = [
        'id_wali',
        'nama',
        'no_telp',
        'nim',
        'alamat',
        'hubungan',
    ];
}
