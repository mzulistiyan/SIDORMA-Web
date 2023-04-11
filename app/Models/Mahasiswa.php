<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswas';
    //assign primary key
    protected $primaryKey = 'nim';
    protected $fillable = [
        'name',
        'nim',
        'fakultas',
        'prodi',
        'alamat',
        'no_telp',
        'id_gedung',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'nim', 'nim');
    }
}
