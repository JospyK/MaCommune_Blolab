<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\SessionCommunale;
use Sentinel;
use Session;
use Illuminate\Support\Facades\Storage;

class SessionCommunaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = SessionCommunale::where('user_id', '=', Sentinel::getUser()->id)->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.sessions.index')->withSessions($sessions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sessions.create');
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
            'body' => 'required',
            'file' => 'sometimes|mimes:pdf,docx,odt'
        ));

        //store in the database
        $session = new SessionCommunale;
        $session -> title = $request -> title;
        $session -> body = $request -> body;
        $session -> user_id = Sentinel::getUser()-> id;
        $session -> commune_id = Sentinel::getUser() -> commune -> id;

        if ($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $session->file = $filename;
            $file->move('files/session_file/', $filename);
        }

        $session -> save();

        Session::flash('success', 'La session communale a bien été ajoute.');

        //redirect to the show page
        return redirect()->route('sessions.show', $session->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session = SessionCommunale::find($id);
        return view('dashboard.sessions.show')->withSession($session);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = SessionCommunale::find($id);
        return view('dashboard.sessions.edit')->withSession($session);
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
        $session = SessionCommunale::find($id);
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required',
        ));
            
            /*print_r(Storage::allFiles(public_path('files')));
            if (Storage::delete('1503171764.docx')) {
                echo "string";
            }else {
                # code...
                echo "toto";
            }
            dd(Storage::allFiles('files/session_file/'));*/
        
        $session = SessionCommunale::findOrFail($id);
        $session -> title = $request -> title;
        $session -> body = $request -> body;
        $session -> user_id = Sentinel::getUser()-> id;
        $session -> commune_id = Sentinel::getUser() -> commune -> id;

        if ($request->hasFile('file')) {
            $file = $request -> file('file');
            $filename = time().'.'.$file->getClientOriginalExtension();

            $oldFilename = $session->file;
            $session->file = $filename;
            Storage::delete($oldFilename);
            $file->move('files/session_file/', $filename);

        }

        $session ->save();

        Session::flash('success', 'La session communale a bien été modifie.');

        //redirect to the show page
        return redirect()->route('sessions.show', $session->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = SessionCommunale::find($id);
        
        $session -> delete();
        Session::flash('success', 'La session communale a bien été supprimé');
        //redirect to the show page
        return redirect()->route('sessions.index', $session->id);
    }
}