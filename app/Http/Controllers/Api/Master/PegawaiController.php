<?php

namespace App\Http\Controllers\Api\Master;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $pegawai = Pegawai::latest()->paginate(5);

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $pegawai);
    }
    public function show(Pegawai $pegawai)
    {
      
        //return single post as a resource
        return new PostResource(true, 'Data Post Ditemukan!', $pegawai);
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
            'nama'   => 'required',
            'nip'     => 'required',
            'pangkat'   => 'required',
            'jabatan'   => 'required',
            'unit'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
       // $image = $request->file('image');
       // $image->storeAs('public/posts', $image->hashName());

        //create post
        $pegawai = Pegawai::create([
            'nama'     => $request->nama,
            'nip'     => $request->nip,
            'pangkat'   => $request->pangkat,
            'jabatan'     => $request->jabatan,
            'unit'     => $request->unit,
        ]);

        //return response
        return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $pegawai);
    }
        
    public function update(Request $request, Pegawai $pegawai)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'nama',
            'nip'   => 'nip',
            'pangkat'   => 'pangkat',
            'jabatan'   => 'jabatan',
            'unit'   => 'unit',
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
            $pegawai->update([
                'nama'     => $request->nama,
                'nip'     => $request->nip,
                'pangkat'   => $request->pangkat,
                'jabatan'     => $request->jabatan,
                'unit'   => $request->unit,
            ]);

        //} else {

            
        //}

        //return response
        return new PostResource(true, 'Data Post Berhasil Diubah!', $pegawai);
    }
    public function destroy(Pegawai $pegawai)
    {
        //delete image
       // Storage::delete('public/posts/'.$post->image);

        //delete post
        $pegawai->delete();

        //return response
        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}

   