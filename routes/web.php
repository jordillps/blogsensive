<?php

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

Route::get('locale/{locale}', 'LocalizationController@setLocale')->name('setLocale');

Route::get('/', 'PagesController@home')->name('pages.home');

//Route::get('category', 'PagesController@category')->name('pages.category');

Route::get('contact', 'PagesController@contact')->name('pages.contact');

Route::post('contact', 'PagesController@contactform')->name('pages.contactform');


//Utilitzem id com identificador
//Route::get('/post/{id}', 'PostsController@show');

//route per a fer proves del email
// Route::get('email', function(){
//     return new App\Mail\LoginCredentials(App\User::first(), '12345');
// });

Route::get('/post/{post}', 'PostsController@show')->name('posts.show');

Route::get('/categories/{category}', 'CategoriesController@show')->name('categories.show');

Route::get('/tags/{tag}', 'TagsController@show')->name('tags.show');

Route::get('/users/{user}', 'UsersController@show')->name('users.show');

Route::post('posts/{post}/comments', 'CommentsController@store')->name('comments.store');


Route::group(['prefix' => 'admin', 'middelware'=>'auth'], function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin');

    //Per agrupar totes les routes de posts
    //Except show perque la ruta show no la hem creat
    //Route::resource('posts', 'PostsController', [except => 'show', 'as' => 'admin']);

    Route::get('posts', 'Admin\PostsController@index')->name('admin.posts.index');

    Route::get('posts/create', 'Admin\PostsController@create')->name('admin.posts.create');

    Route::post('posts', 'Admin\PostsController@store')->name('admin.posts.store');

    Route::get('posts/{post}', 'Admin\PostsController@edit')->name('admin.posts.edit');

    Route::put('posts/{post}', 'Admin\PostsController@update')->name('admin.posts.update');

    Route::delete('posts/{post}', 'Admin\PostsController@destroy')->name('admin.posts.destroy');

    //photos
    Route::post('posts/{post}/photos', 'Admin\PhotosController@store')->name('admin.posts.photos.store');

    Route::delete('photos/{photo}', 'Admin\PhotosController@destroy')->name('admin.photos.destroy');


    //Users
    Route::resource('users', 'Admin\UsersController', ['as' => 'admin']);

    Route::middleware('role:Admin')->put('users/{user}/roles', 'Admin\UsersRolesController@update')->name('admin.users.roles.update');

    Route::middleware('role:Admin')->put('users/{user}/permissions', 'Admin\UsersPermissionsController@update')->name('admin.users.permissions.update');

    //Roles
    Route::resource('roles', 'Admin\RolesController', ['except' => 'show', 'as' => 'admin']);

    //Permissions
    Route::resource('permissions', 'Admin\PermissionsController', ['only' => ['index', 'edit', 'update'], 'as' => 'admin']);

    //Reply the comments
    Route::post('posts/post/{comment}/reply', 'Admin\RepliesController@store')->name('admin.comments.reply');

    Route::delete('replies/{reply}', 'Admin\RepliesController@destroy')->name('admin.replies.destroy');

});

Route::auth();
