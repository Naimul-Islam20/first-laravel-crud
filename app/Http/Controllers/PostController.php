<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('create');
    }

     public function ourFileStore(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpg,gif|max:2048',
        ]);

        //img upload
        $imgName = null;
        if(isset($request->image)){
              $imgName= time().'.'.$request->image->extension();
              $request->image->move(public_path('images'), $imgName);
        }
      


        //add new pos
        $post = new post();

        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imgName;
        $post->save();

        return redirect()->route('home')->with('success', 'Post created successfully');
    }

    public function editFile(){
        return view('edit');
    }


}
