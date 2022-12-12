<?php

namespace App\Http\Controllers\Api\Master;

use App\Models\Ttdbalai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TtdbalaiController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $ttdbalai = Ttdbalai::latest()->get();

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $ttdbalai);
    }
    public function show(Ttdbalai $ttdbalai)
    {
      
        //return single post as a resource
        return new PostResource(true, 'Data Post Ditemukan!', $ttdbalai);
    }
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'kuasa'     => 'required',
           
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
       // $image = $request->file('image');
       // $image->storeAs('public/posts', $image->hashName());

        //create post
        $ttdbalai = Ttdbalai::create([
            'nama'     => $request->nama,
            'kuasa'     => $request->kuasa,
            
        ]);

        //return response
        return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $ttdbalai);
    }
    public function update(Request $request, Ttdbalai $ttdbalai)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'nama',
            'kuasa'   => 'kuasa',
           
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
            $ttdbalai->update([
                'nama'     => $request->nama,
                'kuasa'     => $request->kuasa,
              
            ]);

        //} else {

            
        //}

        //return response
        return new PostResource(true, 'Data Post Berhasil Diubah!', $ttdbalai);
    }
    public function destroy(Ttdbalai $ttdbalai)
    {
        //delete image
       // Storage::delete('public/posts/'.$post->image);

        //delete post
        $ttdbalai->delete();

        //return response
        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);
    }
    /**
   
    /**
    
    
        
    
   
    **/
}

   