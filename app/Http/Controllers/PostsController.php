<?php

namespace App\Http\Controllers;


use Session;
use App\Category;

use App\Post;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count() == 0) {

            Session::flash('info', 'Category must be selected');

            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories', $categories);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [ 

         'title' => 'required|max:255',//maximum 255 words allowed
         'featured' => 'required|mimes:jpg,png,jpeg,bmp,webp,svg', //image only allowed
         'content' => 'required',
         'category_id' => 'required' 


       ]);

       $featured = $request->featured;

       $featured_new_name = time().$featured->getClientOriginalName();//error in here

       $featured->move('uploads/posts', $featured_new_name);

       $post = Post::create([

        'title' => $request->title,
        'content' => $request->content,
        'featured' => 'uploads/posts/' . $featured_new_name,
        'category_id' => $request->category_id,
        'slug' => $request->title

       ]);

       Session::flash('success', 'Post created succesfully.');

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
        //
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

        return view('admin.posts.edit')->with('post', $post)->with('categories', Category::all());
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

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);//find the post first

        if($request->hasFile('featured')) //check if the request has a file called featured to edit it
        {
            $featured = $request->featured;//if it has we need to upload it

            $featured_new_name = time() . $featured->getClientOriginalName();//give the feature new name which going to be unique by getting the client name and time
            
            $featured->move('uploads/posts', $featured_new_name);//we move the file to uploads directory with new name
            
            $post->featured = 'uploads/posts/'.$featured_new_name;//finally the feature updated with new name

        }

        //we update the other sections

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        Session::flash('success', 'Post updated successfully');

        return redirect()->route('posts');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $post = Post::find($id);     

    //  return view('admin.posts.delete', compact('post'));

     $post->delete();

     Session::flash('success', 'Post trashed successfully');

     return redirect()->back();

    }

    public function trashed() {

        $posts = Post::onlyTrashed()->get();//this method only query the database for trashed posts and the get method identifies the trashed items
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id) {
       
       //where is a query builder and first means as we find the fist one we stop for searching posts

        $post = Post::withTrashed()->where( 'id', $id)->first();//we get the database records with trashed then we find particular one with the id then get the result
        
        if ($post != null) {
        $post->forceDelete();//it means to delete permanently

        Session::flash('success', 'Post deleted permanently');

        return redirect()->back();
        
        }

            
    }

    public function restore($id) 
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('success', 'Post restored successfully!');

        return redirect('admin/posts');
    }


   
}
