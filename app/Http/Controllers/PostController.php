<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', [
            'rows' => Post::query()->paginate(10)
        ]);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		if( (bool)$request->post('is_published') ) 
			$published_at = date('Y-m-d H:i:s');
			
		
        $row = Post::create([
			'title'=>$request->post('title'),
			'short'=>$request->post('short'),
			'body'=>$request->post('body'),
			'language'=> $request->post('language'),
			
			'is_published'=> (bool)$request->post('is_published'),
			'published_at'=> (isset($published_at) ? $published_at : ''),
			
			'is_pinned'=> (bool)$request->post('is_pinned') ?? false,
			'is_featured'=> (bool)$request->post('is_featured')  ?? false,
			'is_commentable'=> (bool)$request->post('is_commentable')  ?? false,
			'has_roles'=> (bool)$request->post('has_roles')  ?? false,
			'is_editable'=> (bool)$request->post('is_editable') ?? false,
			'is_deleteable'=> (bool)$request->post('is_deleteable') ?? false,
			
			
			'user_id'=>auth()->id()
		]);
		
		$row->save();
		return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {	
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
		$post->title= $request->post('title');
		$post->short= $request->post('short');
		$post->body= $request->post('body');
		$post->language=  $request->post('language');
			
		$post->is_published=  (bool)$request->post('is_published');
		if( (bool)$request->post('is_published') ) 
			if( ! $post->published_at )
				$post->published_at= date('Y-m-d H:i:s');
			
		$post->is_pinned=  (bool)$request->post('is_pinned') ?? false;
		$post->is_featured=  (bool)$request->post('is_featured')  ?? false;
		$post->is_commentable=  (bool)$request->post('is_commentable')  ?? false;
		$post->has_roles=  (bool)$request->post('has_roles')  ?? false;
		$post->is_editable=  (bool)$request->post('is_editable') ?? false;
		$post->is_deleteable=  (bool)$request->post('is_deleteable') ?? false;
		
		$post->update();
		return $this->index();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
		return $this->index();
    }
	
	public function toDelete(Post $post)
	{
		return view('posts.delete', compact('post'));
	}
}
