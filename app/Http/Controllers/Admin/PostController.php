<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SharePostMail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $posts = Post::all();


  
        $posts = Post::where('user_id', Auth::id())->get();
        // dd($posts);
        $posts = User::find(Auth::id())->posts;

        // dd($posts);

        $chunk = $posts->chunk(2);
        $count = $posts->count();
        $filter = $posts->filter(function ($item) {
            return $item->photo != 'default';
        });
        // $posts = $filter->all();

        $group = $posts->groupBy('user_id');
        $pluck = $posts->pluck('title');
        $reverse = $posts->reverse();
        $except = $posts->except([1]);
        // $posts = Post::onlyTrashed()->get();
      
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.posts.create');
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
            'title' => 'required|min:50'
        ]);
        
        $photo = $request->file('photo');
        if($request->hasFile('photo')){
            $filenameWithExt = $photo->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $image = $filename.'_'.time().'.'.$extension;
            $path = $photo->storeAs('public/img', $image);
        
        }else{
            $image = '';
        }



        $post = new Post();
        // $post->title = $request->title;
        // $post->description = $request->description;
        $post->fill($request->all());
        $post->photo = $image;
        $post->user_id = Auth::id();
        $post->save();

        return redirect('/admin/posts');
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
        $post = Post::find($id);

        return view('admin.posts.show')->with('post',$post);
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
        $post = Post::find($id);
        // dd($post);
        return view('admin.posts.edit')->with('post',$post);
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
        // dd($request);
        $post = Post::find($id);
        // $post->title = $request->title;
        // $post->description = $request->description;
        $post->fill($request->all());
        $post->save();

        return redirect('/admin/posts');
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
        return redirect('/admin/posts');
    }

    public function sharePost(Request $request, $id){    
        $post = Post::find($id);
        // dd($post);
        Mail::to($request->email)->send(new SharePostMail($post));
        return redirect()->back();
    }
}
