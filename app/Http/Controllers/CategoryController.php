<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //displays categories
        $categories = Category::all();
        return view ('dashboard.categories.index')-> withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:255'));
        $category= new Category;
        $category->name = $request->name;
        $category->save();
        session::flash('success', $request->name.' has been added successfully ');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::find($id);
        //dd($category->actualites);
        return view('dashboard.categories.show')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('dashboard.categories.edit')->withCategory($category);
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
        $this->validate($request, array(
            'name' => 'required|max:255'));
        $category= Category::find($id);
        $category->name = $request->name;
        $category->save();
        
        session::flash('success', $request->name.' has been updated successfully ');
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $category = category::find($id);
        return view("dashboard.categories.delete")->withCategory($category);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category -> delete();
        Session::flash('success', 'The category was successfully deleted!!');

        //redirect to the show page
        return redirect()->route('categories.index', $category->id);
    }
}
