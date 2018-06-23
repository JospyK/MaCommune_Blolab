<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Maire;
use App\Commune;
use Session;
use Sentinel;
use Image;
use Storage;

class MaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$maires = Maire::all();
        $maires = Maire::all();
        return view('dashboard.maires.index')->withMaires($maires);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.maires.create');
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
            'name' => 'required|max:255',
            'discours' => 'required',
            'image' => 'sometimes|image'
        ));

        //store in the database
        $maire = new Maire;
        $maire ->name = $request -> name;
        $maire ->discours = $request -> discours;
        $maire ->user_id = Sentinel::getUser()->id;
        $maire ->commune_id = Sentinel::getUser()->commune->id;

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/maires_images/'.$filename);
            Image::make($image)->resize(600, 600)->save($location);

            $maire->image = $filename;
        }

        $maire -> save();

        Session::flash('success', 'Le maire a bien été ajouté.');

        //redirect to the show page
        return redirect()->route('maires.show', $maire->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maire = Maire::find($id);
        return view('dashboard.maires.show')->withMaire($maire);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maire = Maire::find($id);
        return view('dashboard.maires.edit')->withMaire($maire);
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
        $maire = Maire::find($id);
        $this->validate($request, array(
            'name' => 'required|max:255',
            'discours' => 'required',
            'image' => 'sometimes|image'
        ));
        
        $maire = Maire::findOrFail($id);
        $maire ->name = $request -> input('name');
        $maire ->discours = $request -> input('discours');
        
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/maires_images/'.$filename);
            Image::make($image)->resize(600, 600)->save($location);
            $oldFilename = $maire->image;

            $maire->image = $filename;
            Storage::delete($oldFilename);
        }

        $maire ->save();

        Session::flash('success', 'Les données du maire ont bien été modifié.');

        //redirect to the show page
        return redirect()->route('maires.show', $maire->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maire = Maire::find($id);
        
        $maire -> delete();
        Storage::delete($maire->image);
        Session::flash('success', 'Le maire a bien été supprimé.');

        //redirect to the show page
        return redirect()->route('maires.index', $maire->id);
    }
}
