<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view("dashboard", [
            "posts_count"       => Post::all()->count(),
            "trashed_count"     => Post::onlyTrashed()->get()->count(),
            "users_count"       => User::all()->count(),
            "categories_count"  => Category::all()->count(),
            "tags_count"        => Tag::all()->count()
        ]);
    }
}
