<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Membre;
use App\Equipe;
use Session;
use Image;
use Storage;
use Sentinel;
use Notification;

class MembreController extends Controller
{
    public function index()
    {
        $membres = Membre::all();
        return view('dashboard.membres.index')->withMembres($membres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipes=Equipe::all();
        return view('dashboard.membres.create')->withEquipes($equipes);
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

        //store in the database
        $membre = new Membre;
        $membre ->nom = $request -> nom;
        $membre ->prenom = $request -> prenom;
        $membre ->contact = $request -> contact;
        $membre ->fonction = $request -> fonction;
        $membre ->image = $request -> image;
        $membre ->presentation = $request -> presentation;
        $membre ->equipe_id = $request -> equipe_id;

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/membre_image/'.$filename);
            Image::make($image)->resize(1000, 600)->save($location);

            $membre->image = $filename;
        }

        $membre -> save();

        Session::flash('success', ' Memebre crée');

        //redirect to the show page
        return redirect()->route('membres.show', $membre->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membre = Membre::find($id);
        return view('dashboard.membres.show')->withMembre($membre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipes=Equipe::all();
        $membre = Membre::find($id);
        return view('dashboard.membres.edit')->withMembre($membre)->withEquipes($equipes);
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
        $membre = Membre::find($id);
        
        $membre = Membre::findOrFail($id);
        $membre ->nom = $request -> nom;
        $membre ->prenom = $request -> prenom;
        $membre ->contact = $request -> contact;
        $membre ->fonction = $request -> fonction;
        $membre ->image = $request -> image;
        $membre ->presentation = $request -> presentation;
        $membre ->equipe_id = $request -> equipe_id;

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/membre_image/'.$filename);
            Image::make($image)->resize(1000, 600)->save($location);
            $oldFilename = $membre->image;

            $membre->image = $filename;
            Storage::delete($oldFilename);
        }

        $membre ->save();

        Session::flash('success', 'actualité modifiée');

        //redirect to the show page
        return redirect()->route('membres.show', $membre->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membre = Membre::find($id);
        
        $membre -> delete();
        Storage::delete($membre->image);
        Session::flash('success', 'The blog Membre was successfully deleted!!');

        //redirect to the show page
        return redirect()->route('membres.index', $membre->id);
    }
}