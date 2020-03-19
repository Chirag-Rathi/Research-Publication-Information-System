<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\publicationBookModel;
use App\publicationBookAuthorModel;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class publicationBookController extends Controller
{
	function bookData(Request $request)
	{
		if(session()->get('bookNotExists') == 1)
		{

		}

		$empid = $request->input('empid');
		$fname = $request->input('fname');
		$lname = $request->input('lname');
		$email = $request->input('email');
		$authorType = $request->input('authortype');
		print_r($authorType);
		$authorDepartment = $request->input('authordepartment');
		$bookTitle = session()->get('btitle');
		$isbnNumber = session()->get('isbn');
		$firstAuthorFinal = $request->input('firstAuth');
		$arrayOfChapters = $request->input('chapArray');

		$newEntryFlag = 0;

		if(session()->get('bookNotExists') == 1)
		{
			$newEntryFlag = 1;
		}

		else
		{
			$newEntryFlag = 0;
		}

		$size = count($empid);
		$bookDetails = new publicationBookModel;

		if ($newEntryFlag == 1)
		{
			$publisher = $request->input('bookPublisher');
			$publicationType = $request->input('publicationType');
			$publicationDate = $request->input('yearRangeEnd');
			$AcademicStartYear = $request->input('academicStartYear');
			// $mainAuthorFinal = $request->input('faempa');

			$bookDetails->bookTitle = $bookTitle;
			$bookDetails->publisher = $publisher;
			$bookDetails->publicationType = $publicationType;
			$bookDetails->isbnNumber = $isbnNumber;
			$bookDetails->publicationDate = $publicationDate;
			$bookDetails->mainAuthorEmpId = $firstAuthorFinal;
			$bookDetails->academicStartYear = $AcademicStartYear;
			$bookDetails->save();

		}

		for ($i=0; $i < $size ; $i++) { 
			$eLocalId = $empid[$i];
			$journalAuthorsCheck = publicationBookAuthorModel::where('bookISBN','=',$isbnNumber)->where('empid','=',$eLocalId)->first();
			if ($journalAuthorsCheck === NULL) {
		
				$bookAuthors = new publicationBookAuthorModel;
				$bookAuthors->empid = $empid[$i];
				$bookAuthors->firstName = $fname[$i];
				$bookAuthors->lastName = $lname[$i];
				$bookAuthors->email = $email[$i];
				$bookAuthors->bookISBN = $isbnNumber;
				$bookAuthors->department = $authorDepartment[$i];
				$bookAuthors->authorType = $authorType[$i];
				$bookAuthors->chapters = $arrayOfChapters[$i];
				// print_r($arrayOfChapters[$i]);
				$bookAuthors->save();
			}
				
		}
	}



	function checkBook(Request $request)
	{
		$bookISBN = $request->input('isbnNumber');
		$bookTitle = $request->input('bookTitle');
		$bookISBN = trim($bookISBN);
		$foundBook = publicationBookModel::where('isbnNumber','=',$bookISBN)->get();

		if(count($foundBook) == 0)
		{
			session()->put('bookNotExists',1);
			session()->put('firstBookAuthorNotExists',1);
			session()->put('isbn',$bookISBN);
			session()->put('btitle',$bookTitle);
			// $exISBN = session()->get('isbn');
			// echo $exISBN;
			return view('publication_book');
		}
		else
		{
			session()->put('isbn',$bookISBN);
			if ($foundBook[0]['mainAuthorEmpId'] !== NULL)
			{
				session()->put('firstBookAuthorNotExists',0);
			}
			else
			{
				session()->put('firstBookAuthorNotExists',1);
				session()->put('showOptions',1);
			}
			session()->put('bookNotExists',0);

			// session()->put('existingCitations',$paper[0]['citations']);
			// session()->put('paperTitle',$paperTitle);
			// session()->put('paperTitleVer2',$paperTitleTrimmed);
			// echo session()->get('exisitingCitations');
			return view('publication_book');
		}
	}

	function bookAjax(Request $request)
	{
		$ajaxReq = array();
		$bookISBN = session()->get('isbn');
		$modalVariable = publicationBookAuthorModel::where('bookISBN','=',$bookISBN)->get();
		foreach ($modalVariable as $key) {
			array_push($ajaxReq,array('empid' => $key->empid,'name' => $key->firstName." ".$key->lastName));
		}
		return $ajaxReq;
	}

	function addAuth(Request $request)
	{
		session()->forget('showOptions');
		return view('publication_book');
	}

	function bookFirstAuth(Request $request)
	{
		$finalAuthor = $request->input('updateFirstAuthorVariable');
		echo $finalAuthor;
		$isbn = session()->get('isbn');
		$updationVariable = publicationBookModel::where('isbnNumber','=',$isbn)->first();
		publicationBookModel::where('isbnNumber','=',$isbn)->update(['mainAuthorEmpId' => $finalAuthor]);
	}
}