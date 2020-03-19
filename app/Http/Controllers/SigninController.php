<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class SigninController extends Controller
{
    function index()
    {
     	return view('login');
    }

    function checkLogin(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'required',
    		'password' => 'required'
    	]);

    	$user_data = array(
    		'email' => $request->get('email'),
    		'password' => $request->get('password')
    	);

    	if(Auth::attempt($user_data))
    	{
    		return redirect('/success');
    	}
    	else
    	{
    		return back()->with('error', "Wrong Login Details");
    	}
    }

    function successlogin()
    {
    	return view('successlogin');
    }

    function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }
}

?>
