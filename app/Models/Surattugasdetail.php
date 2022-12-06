<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surattugasdetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_surat_tugas',
        'tingkat',
        'nama',
        'nip',
        'pangkat',
        'jabatan',

    ];
}
