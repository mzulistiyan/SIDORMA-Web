<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\senior_resident;

class Gedung extends Model
{
    use HasFactory;
    //assign primary key
    protected $primaryKey = 'id_gedung';
    protected $fillable = [
        'id_gedung',
        'nama_gedung',
        'nomor_gedung',
        'longitude',
        'lattitude',
    ];

}
