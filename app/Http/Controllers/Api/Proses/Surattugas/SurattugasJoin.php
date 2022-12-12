<?php

namespace App\Http\Controllers\Api\Proses\Surattugas;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SurattugasJoin extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $sutugjoin = DB::table('surattugas')
                    ->join('surattugasdetails', 'surattugas.id', '=', 'surattugasdetails.id_surat_tugas')
                    ->get();
       

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $sutugjoin);
    }
    public function show($sutugjoin)
    {
        $sutugjoin = DB::table('surattugas')
        ->join('surattugasdetails', 'surattugas.id', '=', 'surattugasdetails.id_surat_tugas')
        ->where( 'surattugasdetails.id', '=', $sutugjoin)
        ->get();
        //return single post as a resource
        return new PostResource(true, 'Data Post Ditemukan!', $sutugjoin);
    }
    
        
   
}

   