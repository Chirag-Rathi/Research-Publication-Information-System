<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mouModel;
use App\Http\Requests;

class mouController extends Controller
{
	public function submit(Request $request)
	{
		$this->validate($request,[
						'mouTitle' => 'required',
					    'mouno' => 'required',
					    // 'moudoc' => 'required',
					    'yearRangeEnd' => 'required|date'
					    ]);
		$dates = array();
		$empid = "1224";

		$mou = new mouModel;
		$mou->empid = $empid;
		$mou->mouTitle = $request->input('mouTitle');
		$mou->mouNo = $request->input('mouno');
		$mou->mouDate = $request->input('yearRangeEnd');

		$mou->save();

		return view('register');
	}
}