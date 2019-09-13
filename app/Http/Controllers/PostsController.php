<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view("posts.index", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        if($categories->count() == 0) {

            return view("categories.create");

        } elseif ($tags->count() == 0) {
            
            return view("tags.create");
        }

        return view("posts.create", [
            "categories" => $categories,
            "tags" => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responses
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|min:4',
            'content' => 'required|max:256',
            'category_id' => 'required',
            'featured' => 'required|image|mimes:jpeg,png,jpg,svg,JPEG,PNG,JPG,SVG|max:2048',
            'tags' => "required"
        ]);

        $imageName = time() . $request->featured->getClientOriginalName();

        $featured = $request->featured->move("uploads/posts", $imageName);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'featured' => 'uploads/posts/' . $imageName,
            'slug' => str_slug($request->title)
        ]);

        $post->tags()->attach($request->tags);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("posts.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Category::all();

        $tags = Tag::all();

        return view("posts.edit", [
            "post" => $post,
            "categories" => $categories,
            "tags" => $tags
        ]);
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
        

        $validatedData = $request->validate([
            'title'         => 'required|min:4',
            'content'       => 'required|max:256',
            'category_id'   => 'required',
            // 'featured' => 'required|image|mimes:jpeg,png,jpg,svg,JPEG,PNG,JPG,SVG|max:2048'
        ]);

        if($request->hasFile('featured'))
        {
            $request->validate([
                'featured' => 'required|image|mimes:jpeg,png,jpg,svg,JPEG,PNG,JPG,SVG|max:2048'
            ]);

            $imageName = time() . $request->featured->getClientOriginalName();

            $featured = $request->featured->move("uploads/posts", $imageName);

            $post = Post::whereId($id)->update([
                'featured' => 'uploads/posts/' . $imageName
            ]);
        }

        $post = Post::whereId($id)->update($validatedData + [
            'slug' => str_slug($request->title)
        ]);

        $post = Post::find($id);

        $post->tags()->sync($request->tags);

        return redirect("/posts");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id)->delete();
        
        return redirect("/posts");
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view("posts.softdeleted", ["posts" => $posts]);
    }

    public function restore($id)
    {
        $posts = Post::withTrashed()->where("id", $id)->first();

        $posts->restore();

        return redirect("/posts");
    }

    public function hdelete($id)
    {
        $posts = Post::withTrashed()->where("id", $id)->first();

        $posts->forceDelete();

        return redirect()->back();
    }
}
