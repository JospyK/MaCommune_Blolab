<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Action;
use App\ActionCategory;
use Image;
use Storage;
use Session;
use Sentinel;

class ActionController extends Controller
{
    public function index()
    {
        $actions = Action::orderBy('id', 'desc')->get();
        return view('dashboard.actions.index')->withActions($actions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=ActionCategory::all();
        return view('dashboard.actions.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'description'=> 'required',
            'budget' => 'required|integer',
            'action_category_id' => 'required|integer',
            'sourcefinancement' => 'required',
            'localisation' => 'required'
        ));

        //store in the database
        $action = new Action;
        $action ->title = $request -> title;
        $action ->description = $request -> description;
        $action ->budget = $request -> budget;
        $action ->localisation = $request -> localisation;
        $action ->sourcefinancement = $request -> sourcefinancement;
        $action ->start = $request -> start;
        $action ->end = $request -> end;
        $action ->action_category_id = $request -> action_category_id;
        $action ->commune_id = Sentinel::getUser()->commune->id;
        $action ->user_id = Sentinel::getUser()->id;


        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/action_image/'.$filename);
            Image::make($image)->resize(1000, 600)->save($location);

            $action->image = $filename;
        }

        $action -> save();

        Session::flash('success', 'Votre action a bien été ajoutée');

        //redirect to the show page
        return redirect()->route('actions.show', $action->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action = Action::find($id);
        //dd($action->comments);
        return view('dashboard.actions.show')->withAction($action);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = Action::find($id);
        $categories=ActionCategory::all();
        return view('dashboard.actions.edit')->withAction($action)->withCategories($categories);
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
                //validate data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'image' => 'sometimes|image',
            'description'=> 'required',
            'budget' => 'required|integer',
            'action_category_id' => 'required|integer',
            'sourcefinancement' => 'required',
            'localisation' => 'required'
        ));
        
        $action = Action::findOrFail($id);
        $action ->title = $request -> title;
        $action ->description = $request -> description;
        $action ->budget = $request -> budget;
        $action ->localisation = $request -> localisation;
        $action ->sourcefinancement = $request -> sourcefinancement;
        $action ->start = $request -> start;
        $action ->end = $request -> end;
        $action ->action_category_id = $request -> action_category_id;
        $action ->commune_id = Sentinel::getUser()->commune->id;
        $action ->user_id = Sentinel::getUser()->id;

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/action_image/'.$filename);
            Image::make($image)->resize(1000, 600)->save($location);
            $oldFilename = $action->image;

            $action->image = $filename;
            Storage::delete($oldFilename);
        }

        $action ->save();

        Session::flash('success', 'Votre action a bien été modifié');

        //redirect to the show page
        return redirect()->route('actions.show', $action->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = Action::find($id);
        $action -> delete();

        Session::flash('success', 'Votre action a bien été supprimé');
        //redirect to the home page
        return redirect()->route('actions.index');
    }
}