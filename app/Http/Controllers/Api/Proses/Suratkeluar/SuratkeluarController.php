<?php

namespace App\Http\Controllers\Api\Proses\Suratkeluar;

use App\Models\Suratkeluar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SuratkeluarController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $sukel = Suratkeluar::latest()->paginate(5);

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $sukel);
    }
    public function show(Suratkeluar $sukel)
    {
      
        //return single post as a resource
        return new PostResource(true, 'Data Post Ditemukan!', $sukel);
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
            'isiringkas'   => 'required',
            'tujuan'     => 'required',
            'tglsurat'    => 'required',
            'ket'         => 'required',
            'file'     => 'required|file|mimes:pdf|max:2048',
        ]);
        
       
        
        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload file
        $file = $request->file('file');
       $file->storeAs('public/sukel', $file->hashName());

        //create post
        $sukel = Suratkeluar::create([
            'klasifikasi'   => $request->klasifikasi,
            'kodesurat'     => $request->kodesurat,
            'isiringkas'   => $request->isiringkas,
            'tujuan'        => $request->tujuan,
            'tglsurat'    => $request->tglsurat,
            'ket'         => $request->ket,
            'file'     => $file->hashName(),
         
        ]);

        //return response
        return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $sukel);
    }
        
     public function update(Request $request, Suratkeluar $sukel)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'klasifikasi'   => 'required',
            'kodesurat'     => 'required',
            'isiringkas'   => 'required',
            'tujuan'     => 'required',
            'tglsurat'    => 'required',
            'ket'         => 'required',
          
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
       }
        //check if image is not empty
        if ($request->hasFile('file')) {

            //upload file
            $file = $request->file('file');
           $file->storeAs('public/sukel', $file->hashName());

            //delete old file
            Storage::delete('public/sukel/'.$sukel->file);

            //update post with new file
            $sukel->update([
                'klasifikasi'   => $request->klasifikasi,
                'kodesurat'     => $request->kodesurat,
                'isiringkas'    => $request->isiringkas,
                'tujuan'        => $request->tujuan,
                'tglsurat'      => $request->tglsurat,
                'ket'           => $request->ket,
                'file'          => $file->hashName(),
                
           
            ]);

        } else {

            //update post without file
            $sukel->update([
                'klasifikasi'   => $request->klasifikasi,
                'kodesurat'     => $request->kodesurat,
                'isiringkas'    => $request->isiringkas,
                'tujuan'        => $request->tujuan,
                'tglsurat'      => $request->tglsurat,
                'ket'           => $request->ket,
            ]);
        }

        //return response
        return new PostResource(true, 'Data Post Berhasil Diubah!', $sukel);
    }
    public function destroy(Suratkeluar $sukel)
    {
        //delete file
       Storage::delete('public/sukel/'.$sukel->file);

        //delete post
        $sukel->delete();

        //return response
        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);
    }
      
}

   