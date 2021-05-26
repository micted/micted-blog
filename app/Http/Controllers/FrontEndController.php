<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Setting;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        

        return view('index')
            ->with('title', Setting::first()->site_name)
            ->with('categories', Category::take(5)->get())
            ->with('first_post', Post::orderBy('created_at', 'desc')->first())//in order pass the latest post from the database
            ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
            ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
            ->with('Programming', Category::find(1))
            ->with('Games', Category::find(5))
            ->with('settings', Setting::first());
    }

    public function singlePost($id)
    {
        $post = Post::where( 'id', $id)->first();

        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');

       

        return view('single')->with('post', $post)
                             ->with('title', $post->title)
                             ->with('settings', Setting::first())
                             ->with('categories', Category::take(5)->get())
                             ->with('next', Post::find($next_id))
                             ->with('previous', Post::find($prev_id));
    }

    public function category($id)

    {
        $category = Category::find($id);

        return view('category')->with('category', $category)
                               ->with('title', $category->name)
                               ->with('settings', Setting::first())
                               ->with('categories', Category::take(5)->get());
    }

    public function results(Request $request){
                
                $posts = Post::where('title','like','%'.request('query').'%')->get();
                
                return view('results')
                ->with('posts',$posts)                
                ->with('settings', Setting::first())
                ->with('categories', Category::take(5)->get())
                ->with('title','Search Results: '.request('query'));
            
            }
}
