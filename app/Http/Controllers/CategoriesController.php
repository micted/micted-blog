<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index')->with('categories', Category::all());//here categories is the view and Category::all is used to access all datas created
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');

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


            'name' => 'required'
        ]);

        $category = new Category;

        $category->name = $request->name;
        $category->save();


        Session::flash('success', 'Category created succesfully.');

        return redirect()->route('categories');
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
        $category = Category::find($id); //with the model called Category find the id using find method

        return view('admin.categories.edit')->with('category', $category);//edit view in categories folder in view
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
        $category = Category::find($id);//we find the post

        $category->name = $request->name;//we change its name since the only thing we need to change

        $category->save();// then save it 

        Session::flash('success', 'Category updated succesfully.');//toastr flash


        return redirect()->route('categories');//redirect to categories route

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id); //with the model called Category find the id using find method

        foreach($category->posts as $post) {

            $post->forceDelete();
        }
       
        $category->delete();

        Session::flash('success', 'Category deleted succesfully.');


        return redirect()->route('categories');
    }
}
