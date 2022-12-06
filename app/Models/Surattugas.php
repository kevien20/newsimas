<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surattugas extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'klasifikasi',
        'kodesurat',
        'maksudsurat',
        'awaltugas',
        'akhirtugas',
        'beban',
        'matang',
        'tglsurat',
        'tte',
        'penandatangan',
        'kuasa',
        'ppk',
        'transport',
        'tujuan',
    ];
}
