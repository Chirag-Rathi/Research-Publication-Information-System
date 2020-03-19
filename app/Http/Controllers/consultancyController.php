<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\consultancyModel;
use App\Http\Requests;

class consultancyController extends Controller
{
     public function submit(Request $request)
     {
        $this->validate($request,['consulTitle' => 'required',
                                  'consultamt' => 'required',
                                  'consultDoneFor' => 'required',
                                  'socialrelevance' => 'required',
                                  'daterange' => 'required',
                                   // 'consultdoc' => 'required'
                                 ]);
        $dates = array();
        $empid = "1234";
        $department = "Computer";
        $destinationPath = "department\\".$department."\\";

        $consulTitl = $request->input('consulTitle');

        $consultancy = new consultancyModel;
        $consultancy->empid = $empid;
        $consultancy->title = $request->input('consulTitle');
        $consultancy->amount = $request->input('consultamt');
        $consultancy->client = $request->input('consultDoneFor');
        $consultancy->socialRelevance = $request->input('socialrelevance');
        $consultancy->consultancyType = $request->input('consultancyType');

        $date_string = $request->input('daterange');
        $dates = explode('-',$date_string);
        $startDate = str_replace("/","-",$dates[0]);
        $endDate = str_replace("/","-",$dates[1]);

        $consultancy->consultStartDate = $startDate;
        $consultancy->consultEndDate = $endDate;

        $consultTitleTrimmed = str_replace(" ","", strtolower($consulTitl));

        $fileName = $consultTitleTrimmed.'.'.$file->getClientOriginalExtension();
      $destinationPath = public_path()."\\".$destinationPath;

      $enddate = "05-31";
            $trialDate = $yearRangeEnd;
            $datSomething = strtotime($trialDate);
            $year = date('Y',$datSomething);
            $monthNo = date('m',$datSomething);
            $dateNo = date('d',$datSomething);
            $enddate = ($year)."-".$enddate;
            $date1 = date_create($trialDate);
            $date3 = date_create($enddate);
            if(date_diff($date3,$date1)->format('%R%a')<0) {
               $fileYear = ($year-1)."-".($year);
            }
            else if(date_diff($date3,$date1)->format('%R%a')>0) {
               $fileYear = ($year)."-".($year+1);
            }

            //making every directory if it doesn't exist in the file hierarchy
            if(!is_dir($destinationPath)){mkdir($destinationPath);}
            $destinationPath .= "\\".$fileYear;
            $file->move($destinationPath, $fileName);
        
        // $file = $request->file('consultdoc');
        // $fileName = rand().'.'.$file->getClientOriginalExtension();
        // $destinationPath = public_path($destinationPath);
        
        // $consultancy->file = $destinationPath."\\".$fileName;

       

        $consultancy->save();

        

        return redirect('/');

             }
}