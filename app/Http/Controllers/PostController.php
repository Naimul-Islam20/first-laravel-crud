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

    public function editFile($id){
        $post = post::findOrFail($id);
        return view('edit',['ourPost'=>$post]);
    }

    public function updateData(Request $request, $id){
      

               $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpg,gif',
        ]);

        
        //add new pos
         $post = post::findOrFail($id);

        $post->name = $request->name;
        $post->description = $request->description;

        //img upload
        if(isset($request->image)){
              $imgName= time().'.'.$request->image->extension();
              $request->image->move(public_path('images'), $imgName);
               $post->image = $imgName;
        }
      
       
        $post->save();

        return redirect()->route('home')->with('success', 'Post updated successfully');


    }

    public function deleteData($id){

        $post = post::findOrFail($id);
        $post->delete();
        return redirect()->route('home')->with('success', 'Post deleted successfully');

    }


}
