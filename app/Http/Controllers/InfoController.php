<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Info;
use Session;
use Sentinel;

class InfoController extends Controller
{

    public function index()
    {
        $infos = Info::all();
        return view('dashboard.infos.index')->withInfos($infos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.infos.create');
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
            'nom' => 'required|max:255',
            'contact'=> 'required'
        ));

        //store in the database
        $info = new Info;
        $info ->nom = $request -> nom;
        $info ->contact = $request -> contact;
        $info ->user_id = Sentinel::getUser()->id;

        $info -> save();

        Session::flash('success', 'Votre info a bien été ajoutée');

        //redirect to the show page
        return redirect()->route('infos.show', $info->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Info::find($id);
        return view('dashboard.infos.show')->withInfo($info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Info::find($id);
        return view('dashboard.infos.edit')->withInfo($info);
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
            'nom' => 'required|max:255',
            'contact'=> 'required'
        ));
        
        $info = Info::findOrFail($id);
        $info ->nom = $request -> nom;
        $info ->contact = $request -> contact;
        $info ->user_id = Sentinel::getUser()->id;

        $info ->save();

        Session::flash('success', 'Votre info a bien été modifié');

        //redirect to the show page
        return redirect()->route('infos.show', $info->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Info::find($id);
        $info -> delete();

        Session::flash('success', 'Votre info a bien été supprimé');
        //redirect to the home page
        return redirect()->route('infos.index');
    }
}