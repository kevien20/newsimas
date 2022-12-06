<?php

namespace App\Http\Controllers\Api\Master;

use App\Models\Ppk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PpkController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $ppk = Ppk::latest()->paginate(5);

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $ppk);
    }
    public function show(Ppk $ppk)
    {
      
        //return single post as a resource
        return new PostResource(true, 'Data Post Ditemukan!', $ppk);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            
           
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
       // $image = $request->file('image');
       // $image->storeAs('public/posts', $image->hashName());

        //create post
        $ppk = Ppk::create([
            'nama'     => $request->nama,
           
            
        ]);

        //return response
        return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $ppk);
    }
    public function update(Request $request, Ppk $ppk)
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
            $ppk->update([
                'nama'     => $request->nama,
               
              
            ]);

        //} else {

            
        //}

        //return response
        return new PostResource(true, 'Data Post Berhasil Diubah!', $ppk);
    }
    public function destroy(Ppk $ppk)
    {
        //delete image
       // Storage::delete('public/posts/'.$post->image);

        //delete post
        $ppk->delete();

        //return response
        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);
    }
      /**
    
    
   
  
   
    
    
    
        
    
   
    **/
}

   