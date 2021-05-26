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

use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/',[

    'uses' => 'FrontEndController@index',
    'as' => 'index'

]);

Route::get('/test', function () {

    return App\User::find(1)->profile;

});

Route::get('/single/{id}',[
    'uses'=> 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

Route::get('/category/{id}', [

    'uses' => 'FrontEndController@category',
    'as'=> 'category.single'
]);

Route::get('/results','FrontEndController@results');




Auth::routes();


//middleware used to filter users wheather authenticated or not
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){ //route grouping helps route to grouped for same function which only authenticated users allowed
    
    
    Route::get('/dashboard', [
        'uses' => 'HomeController@index',
        'as' => 'home'

    ]);     
    
    
    Route::get('/post/create', [
        'uses'=> 'PostsController@create',
        'as'=> 'post.create'
    ]);
    
    Route::post('/post/store', [
        'uses'=> 'PostsController@store',
        'as'=> 'post.store'
    ]);

    Route::get('/post/delete/{id}', [
        'uses'=> 'PostsController@destroy',
        'as'=> 'post.delete'
    ]);

    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);

    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as' => 'categories'//this redirects the create category section to categories route which is the categories section
    ]);

    Route::get('/category/edit/{id}', [

        'uses' => "CategoriesController@edit",
        'as' => 'category.edit'
    ]);

    Route::get('/category/delete/{id}', [

        'uses' => "CategoriesController@destroy",
        'as' => 'category.delete'
    ]);

    Route::post('/category/update/{id}', [
        'uses' => "CategoriesController@update",
        'as' => 'category.update'
    ]);

    Route::get('/posts', [

        'uses' => 'PostsController@index',
        'as' => 'posts'
    ]);

    Route::get('/posts/trashed', [

        'uses' => 'PostsController@trashed',
        'as' => 'posts.trashed'
    ]); 

    Route::delete('/posts/kill/{id}', [

        'uses' => 'PostsController@kill',
        'as' => 'posts.kill'

    ]);

    Route::get('/posts/restore/{id}', [

        'uses' => 'PostsController@restore',
        'as' => 'posts.restore'
    ]);

    Route::get('/posts/edit/{id}', [

        'uses' => 'PostsController@edit',
        'as' => 'post.edit'
    ]);

    Route::post('/posts/update/{id}', [

        'uses' => 'PostsController@update',
        'as' => 'post.update'
    ]);

    Route::get('/tags', [
        'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);

    Route::get('/tag/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);

    Route::post('/tag/update/{id}', [
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);

    Route::get('/tag/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);

    Route::get('/tag/create', [
        'uses' => 'TagsController@create',
        'as' => 'tag.create'
    ]);

    Route::post('/tag/store', [
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);

    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    Route::get('/users/create', [
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);

    Route::post('/users/store', [
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);

    Route::get('user/admin/{id}', [
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);

    Route::get('user/not-admin/{id}', [

        'uses' => 'UsersController@notadmin',
        'as' => 'user.not.admin'
    ]);

    Route::get('user/profile', [

        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    Route::get('user/delete/{id}', [

        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]); 

    Route::post('user/profile/update', [
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
    ]);

    Route::get('/settings',[
        'uses'=> 'SettingsController@index',
        'as'=> 'settings'
    ]);

    Route::post('/settings/update',[
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);



        

});




