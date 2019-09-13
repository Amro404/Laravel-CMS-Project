<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Post;
use App\Category;
use App\Tag;

class SiteUIController extends Controller
{

    public function index()
    {
    	// $blog_name 	= Setting::first()->blog_name;
    	// $categories = Category::take(5)->get();
    	// $first_post	= Post::orderBy('created_at','DESC')->first();

    	return view("index", [
    		"settings" 		=> Setting::first(),
    		"categories" 	=> Category::take(5)->get(),
    		"tags"			=> Tag::take(10)->get(),
    		"first_post" 	=> Post::orderBy('created_at','DESC')->first(),
    		"second_post"	=> Post::orderBy('created_at','DESC')->skip(1)->first(),
    		"third_post"	=> Post::orderBy('created_at','DESC')->skip(2)->first(),
    		"recent_posts"	=> Post::take(4)->orderBy('created_at','DESC')->get(),
    		"laravel_posts" => Category::find(1)->posts,
    		"java_posts"	=> Category::find(2)->posts,
    		"ruby_posts"	=> Category::find(3)->posts,
    		"posts"			=> Post::take(4)->get()
    	]);
    }

    public function show($slug)
    {
    	$post = Post::where("slug", $slug)->first();
    	$next_page = Post::where("id", ">" , $post->id)->min("id");
    	$prev_page = Post::where("id", "<" , $post->id)->max("id");


    	return view("posts.show", [
    		"post" 			=> $post,
    		"next"			=> Post::find($next_page),
    		"prev"			=> Post::find($prev_page),
    		"categories" 	=> Category::take(5)->get(),
    		"settings" 		=> Setting::first(),
    		"tags"			=> Tag::take(10)->get()
    	]);
    }

    public function category($id)
    {
    	return view("categories.category",[
    		"category"		=> Category::find($id),
    		"categories" 	=> Category::take(5)->get(),
    		"settings" 		=> Setting::first(),
    		"tags"			=> Tag::take(10)->get()
    	]);
    }

    public function tag($id)
    {
    	return view("tags.tag",[
    		"tag"			=> Tag::find($id),
    		"categories" 	=> Category::take(5)->get(),
    		"settings" 		=> Setting::first(),
    		"tags"			=> Tag::All()
    	]);
    }

    public function search()
    {
    	$posts = Post::where('title', 'like' ,'%' . request('search') . '%')->get();

    	return view("results", [
    		"posts" 		=> $posts,
    		'title'			=> request('search'),
    		"categories" 	=> Category::take(5)->get(),
    		"settings" 		=> Setting::first(),
    		"tags"			=> Tag::All()

    	]);

    	
    }
}
