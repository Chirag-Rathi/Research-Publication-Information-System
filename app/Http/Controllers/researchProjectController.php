<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\researchDetailsModel;
use App\researchProjectModel;
use Illuminate\Support\Facades\Input;
use Auth;

class researchProjectController extends Controller
{
    function index()
    {
        return view('researchProject');
    }

    function insertResearchDetails(Request $request) {

        if(!Auth::user())
        {
            return view('/login');
        }

        if(session()->get('notExists') == 1)
        {
            $this->validate($request,[
                'fundingAgency' => 'required',
                'fundingAgencyType' => 'required',
                'amountSanctioned' => 'required',
                'projectStatus' => 'required',
                'projectSanctionLetter' => 'required',
            ]);
        }
        $role = $request->input('authorRole');
        $eid = $request->input('authorEmpid');
        $fname = $request->input('authorFname');
        $lname = $request->input('authorLname');
        $email = $request->input('authorEmail');
        $type = $request->input('authorType');
        $department = $request->input('authorDepartment');

        $projectTitle = session()->get('projectTitle');
        $projectTitleTrimmed = str_replace(" ","",strtolower($projectTitle));
        $proposalId = session()->get('proposalId');

        $newEntryFlag = 0;

        if (session()->get('notExists') == 1) {
            $newEntryFlag = 1;
        } else {
            $newEntryFlag = 0;
        }

        $size = count($role);
        $researchDetails = new researchDetailsModel;
        $researchMain = new researchProjectModel;

        // $department = strtolower(Auth::user()->department); // getting department name from session
        // $faculty = Auth::user()->id; // getting faculty name from session
        $destinationPath = "department\\researchPapers"; //framing the dest path for storing the workshop document

        if($newEntryFlag == 1)
        {
            $amtSanctioned = $request->input('amountSanctioned');
            $agencyName = $request->input('fundingAgency');
            $agencyType = $request->input('fundingAgencyType');
            $date = $request->input('date');

            //uploading image file
            $file = $request->file('projectSanctionLetter');
            $fileName = $projectTitle.'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path()."\\".$destinationPath;

            $enddate = "05-31";
            $trialDate = $date;
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

            $researchMain->projectTitle = $projectTitleTrimmed;
            $researchMain->proposalId = $proposalId;
            $researchMain->originalTitle = $projectTitle;
            $researchMain->amountSanctioned = $amtSanctioned;
            $researchMain->agencyName = $agencyName;
            $researchMain->agencyType = $agencyType;
            $researchMain->researchFilePath = $destinationPath;
            $researchMain->date = $date;
            // $researchMain->save();
        }   

        for ($i=0; $i < $size; $i++) {
            $empid = $eid[$i];
            $researchDetailsCheck = researchDetailsModel::where(['employeeId'=>$empid,'projectTitle'=>$projectTitle])->first();
            if($researchDetailsCheck == NULL)
            {
                $researchDetails->role = $role[$i];
                $researchDetails->employeeId = $eid[$i];
                $researchDetails->projectTitle = $projectTitle;
                $researchDetails->proposalId = $proposalId;
                $researchDetails->name = $fname[$i]." ".$lname[$i];
                $researchDetails->email = $email[$i];
                $researchDetails->investigatorType = $type[$i];
                $researchDetails->department = $department[$i];
                // $researchDetails->save();
            }
        }

        session()->forget('notExists');
        return redirect('/');
    }

    function checkProject(Request $request)
    {
        if(!Auth::user())
        {
            return view('/login');
        }
        
        $this->validate($request,[
            'projectTitle' => 'required',
            'proposalId' => 'required'
        ]);

        $projectTitle = $request->input('projectTitle');
        $proposalId = $request->input('proposalId');
        $projectTitleTrimmed = str_replace(" ","",strtolower($projectTitle));
        $project = researchProjectModel::where(['projectTitle'=>$projectTitleTrimmed,'proposalId'=>$proposalId])->first();

        if($project == NULL)
        {
            session()->put('notExists',1);
        }
        else
        {
            session()->put('notExists',0);
        }
        session()->put('projectTitle',$projectTitle);
        session()->put('proposalId',$proposalId);

        return view('researchProject');
    }

}
