<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts =  Post::orderBy('id' , 'desc')->paginate(2);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         tap($this->validate($request, [ 

            'title' => 'required',
            'body' => 'required'

        ]), 

        function(){ 

            if(request()->hasFile('image')){ 

                request()->validate([ 

                    'image'=> 'file|image' 

                ]); 

            } 

        }

    ); 


        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        
        if(request()->has('image')){

            request()->image->store('upload','public');
            $post->image =  request()->image->store('upload','public');

        };
        
        $post->save();

     
        return redirect('/posts/create')->with('success', 'Post Created');
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
        $posts =  Post::find($id);
        return view('posts.show')->with('post', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $posts =  Post::find($id);
        return view('posts.edit')->with('post', $posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        tap($this->validate($request, [ 

            'title' => 'required',
            'body' => 'required'

        ]), 

        function(){ 

            if(request()->hasFile('image')){ 

                request()->validate([ 

                    'image'=> 'file|image' 

                ]); 

            } 

        }

    ); 


        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        if(request()->has('image')){
            request()->image->store('upload','public');
            $post->image =  request()->image->store('upload','public');
        };
       
        $post->save();

     
        return redirect('/posts')->with('success', 'Post Updated');

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
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('delete', 'Post Deleted');
    }
}
