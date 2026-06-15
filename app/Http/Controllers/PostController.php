<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::with("user")->get();
        return view("index",compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'descraption'=>'required',
            'image'=>'required|mimes:jpg,png,jped|max:5048',
        ]);
        $Post = new Post;
        $Post->title = $request->input('title');
        $Post->descraption = $request->input('descraption');
        $Post->user_id = Auth::user()->id;
        $slug = Str::slug($request->title,'-');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $request->image->extension();
            $filename = $request->input('title').'.'.$extension;
            $file->move('uploads/Post/', $filename);
            $Post->image = $filename;
        };
        $Post->save();
        return redirect()->route("posts.index")->with('message_create','your post is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id' , $id)->get();
        return view("update" , compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        $post->update($request->except('image','user_id'));
        if($request->file('image'))
        {
            $file=$request->file('image');
            $extenstion = 'jpg';
            $filename = $request->input('title').'.'.$extenstion;
            $file->move('uploads/Post/',$filename);
            $path='images/'.$filename;
            $post->update(['image'=>$filename]);   
        };
        
        return redirect()->route('posts.index')->with('message_update','your post is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function delete($id)
    {
        $post = Post::where('id' , $id)->delete();
        return redirect()->route('posts.index')->with('message_delete','your post is deleted');
    }
}



//if($request->file('image'))
//{use Illuminate\Support\str;
//use App\Http\trait\uploadimage;
//$file=$request->file('image');
//$filename=str::uuid().$file->getClientOriginalName();
//$file->move(public_path('images'),$filename);
//$path='images/'.$filename;
//$post->update(['image'=>$path]);   
//};
