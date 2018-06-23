<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Equipe;
use Sentinel;
use Session;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //displays equipes
        $equipes = Equipe::all();
        return view ('dashboard.equipes.index')-> withEquipes($equipes);
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
        $equipe= new Equipe;
        $equipe->name = $request->name;
        $equipe->commune_id = Sentinel::getUser()->commune->id;
        $equipe->save();
        session::flash('success', $request->name.' has been added successfully ');
        return redirect()->route('equipes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipe=Equipe::find($id);
        //dd($equipe->actualites);
        return view('dashboard.equipes.show')->withEquipe($equipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipe=Equipe::find($id);
        return view('dashboard.equipes.edit')->withEquipe($equipe);
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
        $equipe= Equipe::find($id);
        $equipe->name = $request->name;
        $equipe->save();
        
        session::flash('success', $request->name.' has been updated successfully ');
        return redirect()->route('equipes.index');
    }

    public function delete($id)
    {
        $equipe = equipe::find($id);
        return view("dashboard.equipes.delete")->withEquipe($equipe);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipe = Equipe::find($id);
        $equipe -> delete();
        Session::flash('success', 'The equipe was successfully deleted!!');

        //redirect to the show page
        return redirect()->route('equipes.index', $equipe->id);
    }
}
