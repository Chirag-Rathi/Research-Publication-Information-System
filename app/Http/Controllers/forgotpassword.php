<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\register;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;
use Mail;

class forgotpassword extends Controller
{
    //
    public function submit (Request $request)
    {
    	// $user = User::whereEmail($request->email)->first();
    	 $user = User::where('email', request()->input('email'))->first();
    $token = Password::getRepository()->create($user);

    Mail::send(['text' => 'emails.password'], ['token' => $token], function (Message $message) use ($user) {
        $message->subject(config('app.name') . ' Password Reset Link');
        $message->to($user->email);
    });
    	// $credentials = ['email' => $request->email];
    	// $response = Password::sendResetLink($credentials); 
     //    switch ($response) {
     //        case Password::RESET_LINK_SENT:
     //            return redirect()->back()->with('status', trans($response));
     //        case Password::INVALID_USER:
     //            return redirect()->back()->withErrors(['email' => trans($response)]);
     //    					}
     //    				}
    }
}


    	// $sentinelUser = Sentinel::findById($user->id);

    	// if(count($user) == 0)
    	// 	return redirect()->back()->with([
    	// 		'success' => 'Reset code was sent to your email.'
    	// 	]);

    	// $reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);

    	// $this->sendEmail($user,$reminder->code);

    	// return redirect()->back()->with([
    	// 		'success' => 'Reset code was sent to your email.'
    	// 	]); 

    // private function sendEmail($user,$code)
    // {
    // 	Mail::send('emails.forgotpassword',[
    // 		'user' => $user,
    // 		'code' => $code
    // 	],function ($message) use ($user) {
    // 		$message->to($user->email);

    // 		$message->subject("Hello $user->name,reset your password.");
    // 	});
    // }

