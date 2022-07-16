<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
//use Psy\Util\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::when(request('keyword'),function ($q){
            $keyword = request('keyword');
            $q->orWhere("title","like","%$keyword%")
                ->orWhere("description","like","%$keyword%");
        })->
        latest()->Paginate(10)->withQueryString();
//        return $posts;
        return  view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description,50,".....");
        $post->user_id = Auth::id();
        $post->category_id = $request->category;

        //        file photo ကို public ထဲ save မယ်


        if($request->hasFile('featured_image')){
           $newName = uniqid().'_featured_image.'.$request->file('featured_image')->extension();
           $request->file('featured_image')->storeAs('public',$newName);
           $post->featured_image = $newName;
       }
        $post->save();
       return redirect()->route('post.index')->with('status',$post->title.'is created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description,50,".....");
        $post->user_id = Auth::id();
        $post->category_id = $request->category;

        //        file photo ကို public ထဲ save မယ်


        if($request->hasFile('featured_image')){

//            update လုပ်ပြီးရင် ပုံအဟောင်းတေွဖျက်မယ်
            Storage::delete('public/'.$post->featured_image);

//            ပုံအသစ်တေွထပ်ထည့်တာ
            $newName = uniqid().'_featured_image.'.$request->file('featured_image')->extension();
            $request->file('featured_image')->storeAs('public',$newName);
//            photo တွေကို database ထဲ သိမ်း
            $post->featured_image = $newName;
        }
        $post->update();
        return redirect()->route('post.index')->with('status',$post->title.'is updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        if(isset($post->featured_image)){
            Storage::delete('public/'.$post->featured_image);
        }
        $post->delete();
        return redirect()->route('post.index')->with('status',$post->title.'is deleted successfully !');


    }
}
