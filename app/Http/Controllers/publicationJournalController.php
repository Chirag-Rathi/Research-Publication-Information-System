<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\publicationJournalModel;
use App\publicationJournalAuthorModel;
use Illuminate\Support\Facades\Input;

class publicationJournalController extends Controller
{
	function insertJournalInfo(Request $request)
	{
		if(session()->get('paperNotExists') == 1)
		{
			// $this->validate($request,[//'journalName' => 'required',
			// 						  // 'journalNumber' => 'required',
			// 						  // 'impactFactor' => 'required',
			// 						  // 'journalType' => 'required',
			// 						  // 'journalIssueNumber' => 'required',
			// 						  // 'journalPaid' => 'required',
			// 						  // 'paperNoOfPages' => 'required',
			// 						  // 'yearRangeEnd' => 'required'
			// 						  	]);
		}
		$empId = $request->input('empId');
		$fname = $request->input('fname');
		$lname = $request->input('lname');
		$email = $request->input('email');
		$authorType = $request->input('authorType');
		$authorDepartment = $request->input('authorDepartment');
		// $mainAuthor = $request->input('mainAuthor');
		$paperTitle = session()->get('paperTitle');
		$firstAuthorFinal = $request->input('faempa');
		// echo $firstAuthorFinal;

		$newEntryFlag = 0;

		if(session()->get('paperNotExists') == 1)
		{
			$newEntryFlag = 1;
		}

		else
		{
			$newEntryFlag = 0;
		}

		$size = count($empId);
		$journalDetails = new publicationJournalModel;

		$paperTitleTrimmed = str_replace(" ","", strtolower($paperTitle));

		$destinationPath = "department\\publication\\journal";

		if ($newEntryFlag == 1) 
		{
			$journalName = $request->input('journalName');
			$journalNumber = $request->input('journalNumber');
			$journalImpact = $request->input('impactFactor');
			$journalType = $request->input('journalType');
			$journalIssueNumber = $request->input('journalIssueNumber');
			$journalVolumeNumber = $request->input('journalVolumeNumber');
			$journalPaid = $request->input('journalPaid');
			$paperNoOfPages = $request->input('paperNoOfPages');
			$yearRangeEnd = $request->input('yearRangeEnd');
			$academicStartYear = $request->input('academicStartYear');

			// $paperSoftCopy = $request->input('paperSoftCopy');
			$citations = $request->input('citationNum');
			$indexArray = $request->input('index');
			$doi = $request->input('doi');
			// $faemp = $request->input('')

			$file = $request->file('paperSoftCopy');
			// Storage::putFile('paperSoftCopy', new File('/path/to/photo'));
			$fileName = $paperTitleTrimmed.'.'.$file->getClientOriginalExtension();
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

			$journalDetails->paperTitle = $paperTitleTrimmed;
			$journalDetails->issnNumber = $journalNumber;
			$journalDetails->impactFactor = $journalImpact;
			$journalDetails->journalType = $journalType;
			$journalDetails->journalPaid = $journalPaid;
			$indexing = "";
			foreach($indexArray as $value)
			{
				$indexing .= $value.",";
			}
			$journalDetails->indexing = $indexing;
			$journalDetails->numberOfPages = $paperNoOfPages;
			$journalDetails->journalIssueNumber = $journalIssueNumber;
			$journalDetails->journalVolumeNumber = $journalVolumeNumber;
			$journalDetails->publicationDate = $yearRangeEnd;
			$journalDetails->doi = $doi;
			$journalDetails->paperFilePath = $destinationPath;
			$journalDetails->citations = $citations;
			$journalDetails->firstAuthorEmpId = $firstAuthorFinal;
			$journalDetails->academicStartYear = $academicStartYear;
			$journalDetails->save();
		}

		$firstAuthorFound = 0;
		for ($i=0; $i < $size ; $i++) { 
			$eLocalId = $empId[$i];
			$journalAuthorsCheck = publicationJournalAuthorModel::where('empid','=',$eLocalId)->where('paperTitle','=',$paperTitleTrimmed)->first();
			if ($journalAuthorsCheck === NULL) {
		
				$journalAuthors = new publicationJournalAuthorModel;
				$journalAuthors->empid = $empId[$i];
				$journalAuthors->firstName = $fname[$i];
				$journalAuthors->lastName = $lname[$i];
				$journalAuthors->email = $email[$i];
				$journalAuthors->authorType = $authorType[$i];
				$journalAuthors->department = $authorDepartment[$i];
				$journalAuthors->paperTitle = $paperTitleTrimmed;
				$journalAuthors->save();
			}
				
		}

		// print_r($request->all());

		session()->forget('paperNotExists');
		session()->forget('firstAuthorNotExists');
		return redirect('register');
	}


	function checkPaper(Request $request)
	{
		$paperTitle = $request->input('paperTitle');
		$paperTitleTrimmed = str_replace(" ","",strtolower($paperTitle));
		$paper = publicationJournalModel::where('paperTitle','=',$paperTitleTrimmed)->get();

		if(count($paper) == 0)
		{
			session()->put('paperNotExists',1);
			session()->put('firstAuthorNotExists',1);
			return view('journal_beta');
		}

		else
		{
			if ($paper[0]['firstAuthorEmpId'] !== NULL)
			{
				session()->put('firstAuthorNotExists',0);
			}

			else
			{
				session()->put('firstAuthorNotExists',1);
			}
			session()->put('paperNotExists',0);

			session()->put('existingCitations',$paper[0]['citations']);
			session()->put('paperTitle',$paperTitle);
			session()->put('paperTitleVer2',$paperTitleTrimmed);
			// echo session()->get('exisitingCitations');
			return view('existing_journal_beta');
		}

		// echo session()->get('paperTitle');
		
	}

	function addAuthorToExisting(Request $request)
	{
		return view('journal_beta');
	}

	function updateExistingCitations(Request $request)
	{
		$paperTitle = session()->get('paperTitle');
		$paperTitleTrimmed = str_replace(" ","", strtolower($paperTitle));
		$paper = publicationJournalModel::where('paperTitle','=',$paperTitleTrimmed)->first();
		$newCitations = $request->input('addCitations');
		publicationJournalModel::where('paperTitle','=',$paperTitleTrimmed)->update(['citations' => $newCitations]);
		return view('existing_journal_beta');
		// echo $newCitations;
		// $paper->citations = $newCitations;
		// $paper->save();
		// $journalDetails = new publicationJournalModel;
		// $journalDetails->citations
	}

	function ajaxReqForFirstAuthor(Request $request)
	{
		$ajaxReq = array();
		$paperTitle = $request->input('paperTitle');
		$modelVariable = publicationJournalAuthorModel::where('paperTitle','=',$paperTitle)->get();
		foreach ($modelVariable as $key) {
			array_push($ajaxReq,array('empid' => $key->empid,'name' => $key->firstName." ".$key->lastName));
		}
		return $ajaxReq;
	}

	function updationOfFirstAuthor(Request $request)
	{
		$PT = session()->get('paperTitle');
		$paperTitleTrimmed = str_replace(" ","", strtolower($PT));
		$updationVariable = publicationJournalModel::where('paperTitle','=',$PT)->first();
		$newAuthor = $request->input('updateFirstAuthorVariable');
		publicationJournalModel::where('paperTitle','=',$paperTitleTrimmed)->update(['firstAuthorEmpId' => $newAuthor]);
		echo $newAuthor;

	}

	function dynamicUpdationOfCitations(Request $request)
	{
		$PT = session()->get('paperTitle');
		$paperTitleTrimmed = str_replace(" ","", strtolower($PT));
		$modelVariable = publicationJournalModel::where('paperTitle','=',$PT)->first();
		$returnAjax = $modelVariable->citations;
		// echo $returnAjax;
		return $returnAjax;
	}

}