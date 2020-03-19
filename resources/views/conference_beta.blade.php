<!DOCTYPE html>
<html>
<head>
	<title>Publication-Conference</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <style type="text/css">
  /*form
  {
  	margin: 0 auto;
  	max-width: 250px;
  }*/
  	</style>
  </head>
  <body>
  	@include('inc.navbar')
    <div class="container-fluid">
      <div class="panel panel-primary">
        <div class="panel-heading text-center">Publication-Conference</div>
        <div class="panel-body main_panel">
          {!! Form::open(['url' => 'publicationreports/submit','method' => 'post']) !!}
          <div class="form-group">
            <div class="panel panel-primary authappend">
              <div class="panel-heading text-center">Author's Information</div>
              <div class="panel-body authorinfo">
                         <div class="row main_row_1">
                <div class="author_info">
                  <div class="form-group col-md-3 col-sm-3">
                    <div>
                      <label>First Name</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="fnameauth1" placeholder="Please Enter the First Name of the Author">
                    </div>
                  </div>
                  <div class="form-group col-md-3 col-sm-3">
                    <div>
                      <label>Last Name</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="lnameauth1" placeholder="Please Enter Last Name of the Author">
                    </div>
                  </div>
                  <div class="form-group col-md-3 col-sm-3">
                    <div>
                      <label>Email</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="authemail1" placeholder="Please Enter the email-id of the author">
                    </div>
                  </div>
                  <div class="form-group col-md-3 col-sm-3">
                   <div>
                     <label>Type of Author</label>
                   </div>
                   <div>
                     <select class="form-control" name="authortype1">
                       <option>Staff</option>
                       <option>Research Scholar</option>
                       <option>PG Student</option>
                       <option>UG Student</option>
                     </select>
                   </div>
                 </div>
                 <div class="form-group col-md-3 col-sm-3">
                   <div>
                     <label>Department</label>
                   </div>
                   <div>
                     <select class="form-control" name="authordepartment1">
                       <option>IT</option>
                       <option>Computer</option>
                       <option>ENTC</option>
                       <option>Civil</option>
                       <option>Mechanical</option>
                     </select>
                   </div>
                 </div>
                    <div class="form-group col-md-3 col-sm-3">
                     <div>
                       <label>Are you the first author?</label>
                     </div>
                     <div>
                       <input type="radio" name="journalpaid1" value="yes">Yes 
                       <input type="radio" name="journalpaid1" value="no">No
                     </div>
                   </div>
                  <div class="form-group col-md-3 col-sm-3">
                   <button type="button" class="btn-warning text-center" onclick="addauthe()">Add Author</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="form-group">
            <div class="panel panel-primary">
              <div class="panel-heading text-center">Conference Information</div>
              <div class="panel-body">
                <div class="form-group col-md-3 col-sm-3">
                  <div>
                    <label>Name Of the Conference</label>
                  </div>
                  <div>
                    <input type="text" class="form-control" name="journalname" placeholder="Please enter the name of the respective Conference">
                  </div>
                </div>
                <div class="form-group col-sm-3 col-md-3">
                  <div>
                    <label>ISSN/ISBN No</label>
                  </div>
                  <div>
                    <input type="text" class="form-control" name="journalnumber" placeholder="Please Enter the respective data">
                  </div>
                </div>
               <div class="form-group col-md-3 col-sm-3">
                 <div>
                   <label>Organised By</label>
                 </div>
                 <div>
                  <input type="text" class="form-control" name="conferenceorganisedby" placeholder="Please Enter the Organisers of the respective Conference">
                 </div>
               </div>
               <div class="form-group col-md-3 col-sm-3">
                 <div>
                   <label>Associated With</label>
                 </div>
                 <div>
                  <input type="text" class="form-control" name="conferenceorganisedby" placeholder="Associated With">
                 </div>
               </div>
               <div class="form-group col-md-3 col-sm-3">
                  <div>
                     <label>Type Of Conference:</label>
                   </div>
                   <div>
                     <select class="form-control" name="authordepartment1">
                       <option>International Conference</option>
                       <option>National Conference</option>
                       <option>State Level Conference</option>
                       <option>Local Conference</option>
                     </select>
                   </div>
               </div>
                <div class="form-group col-md-3 col-sm-3">
                 <div>
                   <label>Conference Location</label>
                 </div>
                 <div>
                  <input type="text" class="form-control" name="conferenceorganisedby" placeholder="Please Enter The Location of the Conference">
                 </div>
               </div>
               <div class="form-group col-md-3 col-sm-3">
                 <div>
                   <label>Is The Conference Abroad</label>
                 </div>
                 <div>
                   <input type="radio" name="conferenceabroad" value="yes">Yes 
                   <input type="radio" name="conferenceabroad" value="no">No
                 </div>
               </div>
               <div class="form-group col-md-3 col-sm-3">
                <label class="control-label" for="daterange">Workshop Dates:</label>
                <div>
                  <input type="text" class="form-control" name="daterange" value="01/01/2018 - 01/15/2018" />
                </div>
            </div>
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="panel panel-primary">
              <div class="panel-heading text-center">Paper Publication Details</div>
              <div class="panel-body">
                <div class="form-group col-md-3 col-sm-3">
                  <div>
                    <label>Paper Title</label>
                  </div>
                  <div>
                    <input type="text" class="form-control" name="papertitle" placeholder="Please enter the title of your paper">
                  </div>
                </div>
                <div class="form-group col-md-3 col-sm-3
                ">
                  <div>
                    <label>Total Number of Pages</label>
                  </div>
                  <div>
                    <input type="text" class="form-control" name="papernoofpages" placeholder="Please Enter the number of pages in your paper">
                  </div>
                </div>
               <div class="form-group col-md-3 col-sm-3">
                 <div>
                   <label>Journal Issue Number</label>
                 </div>
                 <div>
                  <input type="text" name="journalnumber" class="form-control" placeholder="Please enter the journal issue number">
                 </div>
               </div>
               <div class="form-group col-md-3 col-sm-3">
                 <div>
                   <label>Journal Volume Number</label>
                 </div>
                 <div>
                   <input type="text" class="form-control" name = "journalvolumenumber" placeholder="Please Enter The Volume Number of your Journal" />
                 </div>
               </div>
               <div class="form-group col-md-3 col-sm-3">
                <label class="control-label" for="yearRangeEnd">Publication Date:</label>
                <div>
                  <div class="input-group date" id="datetimepicker7">
                      <input type="text" class="form-control" name="yearRangeEnd" id="yearRangeEnd" />
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>
              </div>
               <div class="form-group col-md-3 col-sm-3">
                 <div>
                   <label>Upload Soft Copy Of the Paper</label>
                 </div>
                 <div>
                   <input type="file" name="papersoftcopy" class="form-control">
                 </div>
               </div>
              </div>
            </div>
          </div>
          <div class="form-group col-md-6 col-sm-6">
            <button type="button" class="btn-danger form-control text-center" onclick=window.location.reload()>Reset</button>
          </div>
          <div class="form-group col-md-6 col-sm-6">
          <button type="submit" class="btn-success form-control text-center">Submit</button>
        </div>
        </div>
      </div>
    </div>
  <script src="/js/app.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script type="text/javascript">

    var count = 2;

     $(function () {
      $('#datetimepicker7').datetimepicker({
        useCurrent: false, //Important! See issue #1075
        viewMode: 'years',
        format: 'DD-MM-YYYY'
      });
    });

  	 function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    function giveSelection(data)
    {
    	if(data == "Faculty" || data == "HOD")
    	{
    		$('.department_select').show();
    	}

    		else
    		{
    			$('.department_select').hide();
    		}
    }

    function addauthe()
    {
       var str = "";
       str += createString(count);
       $(".authorinfo").append(str);
       count++;
    }

    function createString(data)
    {
      var str = "<div class = \"row\"><div class=\"authorlibinfo\"><hr style = \"border:solid 1px black;\"><div class=\"form-group col-md-3 col-sm-3\"><div><label>First Name</label></div><div><input type=\"text\" class=\"form-control\" name=\"fnameauth"+data+"\" placeholder=\"Please Enter the First Name of the Author\"></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>Last Name</label></div><div><input type=\"text\" class=\"form-control\" name=\"lnameauth"+data+"\" placeholder=\"Please Enter Last Name of the Author\"></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>Email</label></div><div><input type=\"text\" class=\"form-control\" name=\"authemail"+data+"\" placeholder=\"Please Enter the email-id of the author\"></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>Type of Author</label></div><div><select class=\"form-control\" name=\"authortype"+data+"\"><option>Staff</option><option>Research Scholar</option><option>PG Student</option><option>UG Student</option></select></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>Department</label></div><div><select class=\"form-control\" name=\"authordepartment"+data+"\"><option>IT</option><option>Computer</option><option>ENTC</option><option>Civil</option><option>Mechanical</option></select></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>Are you the first author?</label></div><div><input type=\"radio\" name=\"journalpaid"+data+"\" value=\"yes\">Yes<input type=\"radio\" name=\"journalpaid"+data+"\" value=\"no\">No</div></div> <div class=\"form-group col-md-3 col-sm-3\"><button type=\"button\" class=\"btn-danger text-center remo\" onclick = \"rem(this)\">Remove Author</button></div></div></div>";
        return str;
    }

    function rem(data)
    {
       $(data).parent().parent().remove();
    }

    $(function() {
          $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            locale: {
                  format: 'YYYY/MM/DD'
              },
              startDate: new Date(),
              endDate: new Date()
          }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
          });

          // $('.remo').click(function(){
          //   console.log($(this).parent().html());
          // });
      });
</script>
</body>
</html>