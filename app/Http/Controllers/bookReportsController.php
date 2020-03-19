<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\publicationBookAuthorModel;
use App\publicationBookModel;

class bookReportsController extends Controller
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

    public function genReport(Request $request)
    {
        $this->validate($request,[
           'department' => 'required',
           'yearRangeStart' => 'required',
           'yearRangeEnd' => 'required'
        ]);
        $startYear = $request->input('yearRangeStart');
        $endYear = $request->input('yearRangeEnd');
        $department = $request->input('department');

        $reportBookArrayNew = array();

        for($i=$startYear;$i<$endYear;$i++)
        {
            $reportBookArray = array();
            $bookObj = publicationBookModel::where('academicStartYear','=',$i)->get();
            for($j=0,$k=0;$j<count($bookObj);$j++)
            {
                //to find how many authors from the same department are working on the project
                $bookAuthors = publicationBookAuthorModel::where('bookISBN','=',$bookObj[$j]["isbnNumber"])->where('department','=',$department)->get();
                if(count($bookAuthors)>0)
                {
                    $faculty = array();
                    $chapters = array();
                    $coAuthors = array();
                    for($x=0;$x<count($bookAuthors);$x++)
                    {
                        array_push($faculty,$bookAuthors[$x]["firstName"]." ".$bookAuthors[$x]["lastName"]);
                        array_push($chapters,explode(',', $bookAuthors[$x]['chapters']));
                        for($y=0;$y<count($bookAuthors);$y++)
                        {
                            if($x != $y)
                            {
                                array_push($coAuthors,explode(',', $bookAuthors[$x]['chapters']));
                            }
                        }
                    }
                    // echo $bookAuthors[0]["firstName"];
                //     //var colnames = ["Sr. no","Faculty","Book Name","Chapters","Publisher","Co-Authors","Publication Type","Date Of Publication","ISBN No.","Faculty Signature"];

                   $reportBookArray[$k] = array("bookName"=>$bookObj[$j]['bookTitle'],"facultyNames"=>$faculty,"type"=>$bookObj[$j]['publicationType'],"publisher"=>$bookObj[$j]['publisher'],"isbn"=>$bookObj[$j]['isbnNumber'],"chapters"=>$chapters,"coAuthors"=>$coAuthors,"publicationDate"=>$bookObj[$j]['publicationDate']);
                    $k++;
                }
           }
           $reportBookArrayNew[''.$i.'-'.($i+1).''] = $reportBookArray;
       }
       // print_r($reportBookArrayNew);
       return \View::make('bookReportView')->with(array('bookObject'=>$reportBookArrayNew,'startYear'=>$startYear,'endYear'=>$endYear,'department'=>$department));
        // return 123;
    }

}
