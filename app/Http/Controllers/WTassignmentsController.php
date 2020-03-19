<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WTmodel;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class WTassignmentsController extends Controller
{
	function login(Request $request)
	{
		$uname = $request->input('username');
		$pass = $request->input('pass');

		$loginDetails = new WTmodel;
		$loginCheck = WTmodel::where
	}
}