<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
    public function login(){
    	return  view('authentication.login');
    }

    public function postLogin(Request $request){
        
        try {
            $rememberMe = false;

            if(isset($request->remember_me))
                $rememberMe = true;

        	if (Sentinel::authenticate($request->all())){
                return response()->json(['redirect' =>'/dashboard/maires/']);
            }
            else{
                return response()->json(['error' => 'Wrong Credentials. Please enter good credentials.'], 500);
            }
        }
        catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            return response()->json(['error' =>'You are banned for '.htmlspecialchars($delay).' seconds. Please come back later'], 500);
        }
         catch (NotActivatedException $e) {
            return response()->json(['error' =>'You account has not been acticated yet. Please open your mail box and click on the activation link.'], 500);
        }
    }
 
    public function logout(){
    	Sentinel::logout();
		return redirect('/login');
    }
}
