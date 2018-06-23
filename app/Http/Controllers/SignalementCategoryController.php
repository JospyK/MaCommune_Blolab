<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SignalementCategory;
use Session;

class SignalementCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //displays categories
        $categories = SignalementCategory::all();
        return view ('dashboard.signalement_category.index')-> withCategories($categories);
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
        
        $category= new SignalementCategory;
        $category->name = $request->name;
        $category->save();
        session::flash('success', $request->name.' has been added successfully ');
        return redirect()->route('signalement_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=SignalementCategory::find($id);
        return view('dashboard.signalement_category.show')->withcategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=SignalementCategory::find($id);
        return view('dashboard.signalement_category.edit')->withcategory($category);
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
        $category= SignalementCategory::find($id);
        $category->name = $request->name;
        $category->save();
        
        session::flash('success', $request->name.' has been updated successfully ');
        return redirect()->route('signalement_categories.index');
    }

    public function delete($id)
    {
        $category = SignalementCategory::find($id);
        return view("dashboard.signalement_category.delete")->withCategory($category);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = SignalementCategory::find($id);
        $category -> delete();
        Session::flash('success', 'The category was successfully deleted!!');

        //redirect to the show page
        return redirect()->route('signalement_categories.index', $category->id);
    }
}