<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class senior_resident extends Model
{
    use HasFactory;
    protected $table = 'senior_residents';
    //assign primary key
    protected $primaryKey = 'nim';

    protected $fillable = [
        'nim',
        'name',
        'fakultas',
        'prodi',
        'no_telp',
        'alamat',
        'id_gedung',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'nim', 'nim');
    }
}
