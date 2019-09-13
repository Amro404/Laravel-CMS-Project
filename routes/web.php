<?php
use App\Mail\TestEmail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// Route::get("/testmail", function() {


//     $data = ['message' => 'This is a test!'];

//     Mail::to('amrsaied47@gmail.com')->send(new TestEmail($data));

// });

Route::get('/', "SiteUIController@index");
Route::get('/category/{id}', "SiteUIController@category");
Route::get('/tag/{id}', "SiteUIController@tag");
Route::get('/post/{slug}', "SiteUIController@show"); // need to fix
Route::get('/posts/search', "SiteUIController@search");


Route::get("/dashboard", "HomeController@dashboard");

// Resource for users
route::resource("users", "UsersController"); 
Route::get("/users/admin/{id}", "UsersController@admin");
Route::get("/users/delete-admin/{id}", "UsersController@notAdmin");

// Resource for posts
route::resource("posts", "PostsController"); 

// Resource for categories
route::resource("category", "CategoriesController");

// Resource for tags
route::resource("tag", "TagController");

// Route for softdeletes
Route::get('post/trashed', 'PostsController@trashed');
Route::get('post/hdelete/{id}', 'PostsController@hdelete');
Route::get('post/restore/{id}', 'PostsController@restore');

// Route for settings
Route::get("/settings", "SettingsController@index");
Route::post("/settings/update", "SettingsController@update");




