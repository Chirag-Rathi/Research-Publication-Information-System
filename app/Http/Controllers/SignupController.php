<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\registerModel;
use Redirect;
use Session;
use Mail;
use Illuminate\Support\Facades\Input;
use App\Mail\verifyEmail;

class SignupController extends Controller
{

    function index()
    {
      return view('register');
    }

    function register(Request $request)
    {
      $this->validate($request,[
        'name' => 'bail|required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required_with:repassword|alphaNum|min:6',
        'repassword' => 'required_with:password|same:password',
        'position' => 'required|string',
        'department' => 'nullable|string'
      ]);
      $registerObj = new registerModel;
      $registerObj->name = $request->input('name');
      $registerObj->email = $request->input('email');
      $registerObj->password = Hash::make($request->input('password'));
      $position = $request->input('position');
      $registerObj->position = $position;
      if(strcmp($position,"HOD")==0 || strcmp($position,"Faculty")==0)
      {
        $registerObj->department = $request->input('department');
      }
      else if(strcmp($position,"Director")==0)
      {
        $registerObj->department = NULL;
      }
        $registerObj->verifyToken = rand(10000,99999);
        $registerObj->remember_token = Str::random(20);
        session()->put('email', $registerObj->email);
        session()->put('verifyToken', $registerObj->verifyToken);
      // if($registerObj->save())
        // {
        $this->sendEmail($registerObj);
        // }
        return Redirect::route('verifyEmailFirst')->with(['data' => $registerObj]);
    }

    function verifyEmailFirst()
    {
        return view('verifyEmailFirst');
    }

    function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    function sendEmailDone($email,$verifyToken)
    {
        $user = registerModel::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();
        if($user)
        {
            return registerModel::where(['email'=>$email,'verifyToken'=>$verifyToken])->update(['status'=>1,'verifyToken'=>NULL]);
        }
        else
        {
            return "User not found";
        }
    }

    function resend(Request $request)
    {
        $registerObj = new registerModel;
        $registerObj->email = session()->get('email');
        $registerObj->verifyToken = session()->get('verifyToken');
        return $this->sendEmail($registerObj);
    }

    function verifyOTP(Request $request)
    {
      $verifyobj = new registerModel;
      $verifyobj->otp = $request->input('otp');
      $verifyobj->sess = session()->get('verifyToken')
      if($verifyobj->otp == $verifyobj->sess)
      {
        
      }

    }
}