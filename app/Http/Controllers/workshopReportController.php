<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\workshopModel;

class workshopReportController extends Controller
{
    public function submit(Request $request)
    {
    	//accepting parameters
    	$dept = $request->input("department");
    	$sdate = date_create("".$request->input('yearRangeStart')."-07-01");
		$edate = date_create("".$request->input('yearRangeEnd')."-06-30");

		//formatting date
		$sdate = date_format($sdate,"Y-m-d");
		$edate = date_format($edate,"Y-m-d");

    	$workshops = workshopModel::where('department','=',$dept)->where('startDate','>=',$sdate)->where('endDate','<',$edate)->get();
    	$arr = ["startDate" => $sdate,"endDate" => $edate];
    	// return view('reports.wreportTable',compact('workshops','arr'));
    	return response()->json($workshops);
    }
}
