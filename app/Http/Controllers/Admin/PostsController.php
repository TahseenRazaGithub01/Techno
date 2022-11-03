<?php

namespace App\Http\Controllers\Admin;

use App\Models\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Helpers\helper as Helper;
use Input;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all()->toArray();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        // $post = Posts::select('id','name','description','status', 'user_id')
        //                     ->withCount('tags')
        //                     ->with(['meta', 'user','tags'])
        //                     ->orderBy('id', 'ASC')->get()->toArray();

        // $post = Posts::with('tags')->where('id', 4)->first();

        // $post->tags()->attach([9,2]);

        $post = Posts::select('id','name','description','status', 'user_id')
                            ->withCount('comments')
                            ->with(
                                'meta',
                                'user:id,name,email',
                                'comments.replies',
                                'comments.user:id,name',
                                'comments.replies.user:id,name,email,gender',
                                'comments.replies.replies',
                                'comments.replies.replies.user:id,name'
                            )
                            ->orderBy('id', 'ASC')
                            //->where('id', 7)
                            ->get()
                            ->toArray();

        dd( $post );

        return view('admin.post.listing', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
