<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actualite;
use App\Category;
use Session;
use Image;
use Storage;
use Sentinel;
use Notification;

class ActualiteController extends Controller
{
    public function index()
    {
        $actualites = Actualite::where('user_id', '=', Sentinel::getUser()->id)->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.actualites.index')->withActualites($actualites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('dashboard.actualites.create')->withCategories($categories);
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
            'category_id' => 'required|integer',
            'body' => 'required',
            'image' => 'sometimes|image'
        ));

        //store in the database
        $actualite = new Actualite;
        $actualite ->title = $request -> title;
        $actualite ->body = ($request -> body);
        $actualite ->category_id = $request -> category_id;
        $actualite ->commune_id = Sentinel::getUser()->commune->id;
        $actualite ->user_id = Sentinel::getUser()->id;

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/actualite_image/'.$filename);
            Image::make($image)->resize(1000, 600)->save($location);

            $actualite->image = $filename;
        }

        $actualite -> save();

        Session::flash('success', ' Actualité crée');

        //redirect to the show page
        return redirect()->route('actualites.show', $actualite->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actualite = Actualite::find($id);
        return view('dashboard.actualites.show')->withActualite($actualite);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $actualite = Actualite::find($id);
        return view('dashboard.actualites.edit')->withActualite($actualite)->withCategories($categories);
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
        $actualite = Actualite::find($id);
        $this->validate($request, array(
            'title' => 'required|max:255',
            'category_id' => 'required|integer',
            'body' => 'required',
            'image' => 'image'
        ));
        
        $actualite = Actualite::findOrFail($id);
        $actualite ->title = $request -> input('title');
        $actualite ->category_id = $request -> input('category_id');
        $actualite ->body = $request -> input('body');

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/actualite_image/'.$filename);
            Image::make($image)->resize(1000, 600)->save($location);
            $oldFilename = $actualite->image;

            $actualite->image = $filename;
            Storage::delete($oldFilename);
        }

        $actualite ->save();

        Session::flash('success', 'actualité modifiée');

        //redirect to the show page
        return redirect()->route('actualites.show', $actualite->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actualite = Actualite::find($id);
        
        $actualite -> delete();
        Storage::delete($actualite->image);
        Session::flash('success', 'The blog Actualite was successfully deleted!!');

        //redirect to the show page
        return redirect()->route('actualites.index', $actualite->id);
    }
}