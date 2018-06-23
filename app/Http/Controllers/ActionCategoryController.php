<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActionCategory;
use Session;

class ActionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //displays categories
        $categories = ActionCategory::all();
        return view ('dashboard.action_category.index')-> withCategories($categories);
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
        
        $category= new ActionCategory;
        $category->name = $request->name;
        $category->save();
        session::flash('success', $request->name.' has been added successfully ');
        return redirect()->route('action_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=ActionCategory::find($id);
        return view('dashboard.action_category.show')->withcategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=ActionCategory::find($id);
        return view('dashboard.action_category.edit')->withcategory($category);
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
        $category= ActionCategory::find($id);
        $category->name = $request->name;
        $category->save();
        
        session::flash('success', $request->name.' has been updated successfully ');
        return redirect()->route('action_categories.index');
    }

    public function delete($id)
    {
        $category = ActionCategory::find($id);
        return view("dashboard.action_category.delete")->withCategory($category);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ActionCategory::find($id);
        $category -> delete();
        Session::flash('success', 'The category was successfully deleted!!');

        //redirect to the show page
        return redirect()->route('action_categories.index', $category->id);
    }
}