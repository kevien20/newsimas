<?php

namespace App\Http\Controllers\Api\Proses\Surattugas;

use App\Models\Surattugasdetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SurattugasdetailController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $sutugdetail = Surattugasdetail::latest()->get();

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $sutugdetail);
    }
    public function show(Surattugasdetail $sutugdetail)
    {
      
        //return single post as a resource
        return new PostResource(true, 'Data Post Ditemukan!', $sutugdetail);
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
            'id_surat_tugas'    => 'required',
            'tingkat'           => 'required',
            'nama'              => 'required',
            'nip'               => 'required',
            'pangkat'           => 'required',
            'jabatan'           => 'required',
            

        ]);
        
        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
       // $image = $request->file('image');
       // $image->storeAs('public/posts', $image->hashName());

        //create post
        $sutugdetail = Surattugasdetail::create([
            'id_surat_tugas'    => $request->id_surat_tugas,
            'tingkat'           => $request->tingkat,
            'nama'              => $request->nama,
            'nip'               => $request->nip,
            'pangkat'           => $request->pangkat,
            'jabatan'           => $request->jabatan,
           
        ]);

        //return response
        return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $sutugdetail);
    }
        
    public function update(Request $request, Surattugasdetail $sutugdetail)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'id_surat_tugas'    => 'id_surat_tugas',
            'tingkat'           => 'tingkat',
            'nama'              => 'nama',
            'nip'               => 'nip',
            'pangkat'           => 'pangkat',
            'jabatan'           => 'jabatan',
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
            $sutugdetail->update([
                'id_surat_tugas'    => $request->id_surat_tugas,
                'tingkat'           => $request->tingkat,
                'nama'              => $request->nama,
                'nip'               => $request->nip,
                'pangkat'           => $request->pangkat,
                'jabatan'           => $request->jabatan,
            ]);

        //} else {

            
        //}

        //return response
        return new PostResource(true, 'Data Post Berhasil Diubah!', $sutugdetail);
    }
    public function destroy(Surattugasdetail $sutugdetail)
    {
        //delete image
       // Storage::delete('public/posts/'.$post->image);

        //delete post
        $sutugdetail->delete();

        //return response
        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}

   