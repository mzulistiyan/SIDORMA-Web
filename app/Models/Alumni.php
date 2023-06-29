<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Alumni extends Model
{
    use HasFactory;
    protected $table = 'alumnis';
    //assign primary key
    protected $primaryKey = 'nim';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'nim',
        'jenis_kelamin',
        'jurusan',
        'tahun_angkatan',
        'alamat',
        'no_telp',
        'pekerjaan',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'nim', 'nim');
    }
}
