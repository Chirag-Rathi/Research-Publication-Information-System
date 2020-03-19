<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\workshopModel;
use App\Http\Requests;

class workshopController extends Controller
{
    public function submit(Request $request)
    {
    	$this->validate($request,[
    		'workshopName' => 'required',
    		'organisedBy' => 'required',
    		'venue' => 'required',
    		'sponsored' => 'required',
    		'fees' => 'required',
    		'doc' => 'required|mimes:pdf,docx'
    	]);
    	$dates = array(); // used for getting string daterange
    	$department = "computer"; // getting department name from session
    	$faculty = "vmeshram"; // getting faculty name from session
    	$destinationPath = "department\\".$department."\\"; //framing the dest path for storing the workshop document

    	// Taking all the inputs
    	$workshop = new workshopModel;
        $workshop->department = $department;
    	$workshop->workshopName = $request->input('workshopName');
    	$workshop->organisedBy = $request->input('organisedBy');
    	$workshop->venue = $request->input('venue');
    	$workshop->sponsoredByCollege = $request->input('sponsored');

    	//uploading image file
    	$image = $request->file('doc');
    	$imageName = rand().'.'.$image->getClientOriginalExtension();
    	$destinationPath = public_path($destinationPath);
     	$image->move($destinationPath, $imageName);
    	$workshop->fees = $request->input('fees');
    	$date_string = $request->input('daterange');
    	$dates = explode('-',$date_string);
    	$startDate = str_replace("/","-",$dates[0]);
    	$endDate = str_replace("/","-",$dates[1]);
    	$workshop->startDate = $startDate;
    	$workshop->endDate = $endDate;
    	$workshop->certificatePath = $destinationPath."\\".$imageName;
    	//Save workshop info in database
    	$workshop->save();

    	return redirect('/');
    }
}
