<?php

namespace App\Http\Controllers\Api\Proses\Surattugas;

use App\Models\Surattugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SurattugasController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $sutug = Surattugas::latest()->get();

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $sutug);
    }
    public function show(Surattugas $sutug)
    {
      
        //return single post as a resource
        return new PostResource(true, 'Data Post Ditemukan!', $sutug);
    }
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'klasifikasi'   => 'required',
            'kodesurat'     => 'required',
            'maksudsurat'   => 'required',
            'awaltugas'     => 'required',
            'akhirtugas'    => 'required',
            'beban'         => 'required',
            'matang'        => 'required',
            'tglsurat'      => 'required',
            'kuasa'         => 'required',
            'penandatangan' => 'required',
            'kuasa'         => 'required',
            'ppk'         => 'required',
            'transport'         => 'required',
            'tujuan'         => 'required',
          
          

        ]);
        
        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
       // $image = $request->file('image');
       // $image->storeAs('public/posts', $image->hashName());

        //create post
        $sutug = Surattugas::create([
            'klasifikasi'   => $request->klasifikasi,
            'kodesurat'     => $request->kodesurat,
            'maksudsurat'   => $request->maksudsurat,
            'awaltugas'     => $request->awaltugas,
            'akhirtugas'    => $request->akhirtugas,
            'beban'         => $request->beban,
            'matang'        => $request->matang,
            'tglsurat'      => $request->tglsurat,
            'tte'           => $request->tte,
            'penandatangan'  => $request->penandatangan,
            'kuasa'  => $request->kuasa,
            'ppk'           => $request->ppk,
            'transport'  => $request->transport,
            'tujuan'         => $request->tujuan,
        ]);

        //return response
        return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $sutug);
    }
        
    public function update(Request $request, Surattugas $sutug)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'klasifikasi'   => 'klasifikasi', 
            'kodesurat'     => 'kodesurat', 
            'maksudsurat'   => 'maksudsurat', 
            'awaltugas'     => 'awaltugas',  
            'akhirtugas'    => 'akhirtugas',
            'beban'         => 'beban',
            'matang'        => 'matang',
            'tglsurat'      => 'tglsurat',
            'tte'           => 'tte',
            'penandatangan'         =>'penandatangan',
            'kuasa'         => 'kuasa' ,
            'ppk'         => 'ppk' ,
            'transport'         =>  'transport',
            'tujuan'         =>'tujuan',
        ]);

        //check if validation fails
        //if ($validator->fails()) {
            //return response()->json($validator->errors(), 422);
       // }
        //check if image is not empty
        //if ($request->hasFile('image')) {

            //upload image
            //$image = $request->file('image');
           // $image->storeAs('public/posts', $image->hashName());

            //delete old image
            //Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $sutug->update([
                'klasifikasi'   => $request->klasifikasi,
                'kodesurat'     => $request->kodesurat,
                'maksudsurat'   => $request->maksudsurat,
                'awaltugas'     => $request->awaltugas,
                'akhirtugas'    => $request->akhirtugas,
                'beban'         => $request->beban,
                'matang'        => $request->matang,
                'tglsurat'      => $request->tglsurat,
                'tte'           => $request->tte,
                'penandatangan'  => $request->penandatangan,
                'kuasa'  => $request->kuasa,
                'ppk'           => $request->ppk,
                'transport'  => $request->transport,
                'tujuan'         => $request->tujuan,
            ]);

        //} else {

            
        //}

        //return response
        return new PostResource(true, 'Data Post Berhasil Diubah!', $sutug);
    }
    public function destroy(Surattugas $sutug)
    {
        //delete image
       // Storage::delete('public/posts/'.$post->image);

        //delete post
        $sutug->delete();

        //return response
        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}

   