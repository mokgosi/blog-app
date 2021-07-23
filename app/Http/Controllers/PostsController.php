<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Actions\PostAction;
use App\Http\Requests\PostRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
 
    private $postAction;

    public function __construct(PostAction $postAction)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->postAction = $postAction;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.index')->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostRequest  $request
     * @param  PostAction $postAction
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $this->postAction->create($request->toDTO());

        return redirect('/blog')->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('blog.show')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostRequest $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $slug)
    {
        $this->postAction->update($request->toDTO(), $slug);    

        return redirect('/blog')->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')->with('message', 'Your post has been deleted!');
    }
}

