<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratkeluar extends Model
{
    use HasFactory;
    protected $fillable = [
        'klasifikasi',
        'kodesurat',
        'isiringkas',
        'tujuan',
        'tglsurat',
        'ket',
        'file',
    ];
}
