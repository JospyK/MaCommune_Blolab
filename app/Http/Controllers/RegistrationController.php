<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use App\User;
use App\Commune;
use Mail;

class RegistrationController extends Controller
{
    public function register()
    {
        $communes = Commune::all();
    	return view('authentication.register')->withCommunes($communes);
    }

    public function postRegister(Request $request)
    {
		$user = Sentinel::registerAndActivate($request->all());

        $usersCount = User::all()->count();
        if($usersCount==1)
            $role= Sentinel::findRoleBySlug('admin');
        else
            $role= Sentinel::findRoleBySlug('manager');
            
        $activation = Activation::create($user);
		$role->users()->attach($user);
        //$this->sendEmail($user, $activation->code);
		return redirect('/login');
    }

    private function sendEmail($user, $code)
    {
        Mail::send('emails.activation', ['user' => $user, 'code' => $code], 
            function($message) use ($user) {
                $message ->to($user->email);
                $message -> subject("Activation ".htmlspecialchars($user->first_name)." , du compte");
        });
    }
}
