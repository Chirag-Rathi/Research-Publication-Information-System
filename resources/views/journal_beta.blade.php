<!DOCTYPE html>
<html>
<head>
	<title>Publication-Journal</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <style type="text/css">
#grp1
  {
    margin: 0 auto;
    max-width: 450px;
  }
  	</style>
  </head>
  <body>
  	@include('inc.navbar')

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Select The First Author for the Paper</h4>
          </div>
          <div class="modal-body">
           <label>
             Select the first author:
           </label>
           <select class="form-control final" name="firstAuthorEmpid" onchange="selectFirstAuthor(this.value);" id="slick">
           </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="saveData()">Not Now</button>
            <button type="button" class="btn btn-primary" onclick="saveData()">Save changes</button>
          </div>
        </div>
      </div>
    </div>

@if(session()->get('paperNotExists') === null)
    <div class="container-fluid">
      <div class="panel panel-primary">
        <div class="panel-heading text-center"><b>Paper Details</b></div>
        <div class="panel-body">
          <div class="row checkPaper">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            {!! Form::open(['url' => '/checkPaper', 'method' => 'post', 'class' => 'form-vertical','id' => 'grp1']) !!}
            <div class="form-group">
              <div>
              <label class="control-label">Paper Title:</label>
            </div>
            <div>
              <input type="text" class="form-control" name="paperTitle" placeholder="Enter Paper Title" />
            </div>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    @endif



@if(session()->get('paperNotExists') !== null)
    <div class="container-fluid">
      <div class="panel panel-primary">
        <div class="panel-heading text-center">Publication-Journal</div>
        <div class="panel-body main_panel">
          {!! Form::open(['url' => 'publicationJournal/submit','method' => 'post','enctype' => 'multipart/form-data','id' => 'publicationJournalForm']) !!}
          <div class="form-group">
            <div class="panel panel-primary authappend">
              <div class="panel-heading text-center">Author's Information</div>
              <div class="panel-body authorinfo">
                         <div class="row main_row_1">
                <div class="author_info">
                  <div class="form-group col-md-3 col-sm-3">
                    <div>
                      <label>Emp-ID/Emp-RollNo</label>
                    </div>
                    <div>
                      <input type="text" class="form-control selectempid" name="empId[]" placeholder="Please Enter the ID or Roll Number of the Employee">
                    </div>
                  </div>
                  <div class="form-group col-md-3 col-sm-3">
                    <div>
                      <label>First Name</label>
                    </div>
                    <div>
                      <input type="text" class="form-control selectoption" name="fname[]" placeholder="Please Enter the First Name of the Author">
                    </div>
                  </div>
                  <div class="form-group col-md-3 col-sm-3">
                    <div>
                      <label>Last Name</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="lname[]" placeholder="Please Enter Last Name of the Author">
                    </div>
                  </div>
                  <div class="form-group col-md-3 col-sm-3">
                    <div>
                      <label>Email</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="email[]" placeholder="Please Enter the email-id of the author">
                    </div>
                  </div>
                  <div class="form-group col-md-3 col-sm-3">
                   <div>
                     <label>Type of Author</label>
                   </div>
                   <div>
                     <select class="form-control" name="authorType[]">
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
                     <select class="form-control" name="authorDepartment[]">
                       <option>IT</option>
                       <option>Computer</option>
                       <option>ENTC</option>
                       <option>Civil</option>
                       <option>Mechanical</option>
                     </select>
                   </div>
                 </div>
                    <!-- <div class="form-group col-md-3 col-sm-3">
                     <div>
                       <label>Are you the first author?</label>
                     </div>
                     <div class = "checkbox">
                       <input type="checkbox" name="mainAuthor[]" value="yes" class="lol">Yes
                       <input type="hidden" name="mainAuthor[]" value="no"> 
                     </div>
                   </div> -->
                   <div>
                     <input type="hidden" name="faempa" id="faemp" value="" />
                   </div>
                  <div class="form-group col-md-3 col-sm-3">
                   <button type="button" class="btn-warning text-center" onclick="addauthe()">Add Author</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        @if(session()->get('paperNotExists') > 0)
          <div class="form-group">
            <div class="panel panel-primary">
              <div class="panel-heading text-center">Journal/Conference Information</div>
              <div class="panel-body">
                <div class="form-group col-md-3 col-sm-3">
                  <div>
                    <label>Journal</label>
                  </div>
                  <div>
                    <input type="text" class="form-control" name="journalName" placeholder="Please enter the name of your journal">
                  </div>
                </div>
                <div class="form-group col-sm-3 col-md-3">
                  <div>
                    <label>ISSN/ISBN No</label>
                  </div>
                  <div>
                    <input type="text" class="form-control" name="journalNumber" placeholder="Please Enter the respective data">
                  </div>
                </div>
               <div class="form-group col-md-3 col-sm-3">
                 <div>
                   <label>Impact Factor</label>
                 </div>
                 <div>
                  <input type="number" class="form-control" name="impactFactor" placeholder="Please Enter the Impact factor" min="0">
                 </div>
               </div>
               <div class="form-group col-md-3 col-sm-3">
                  <div>
                     <label>Type Of Journal:</label>
                   </div>
                   <div>
                     <select class="form-control" name="journalType">
                       <option>National Journal</option>
                       <option>International Journal</option>
                     </select>
                   </div>
               </div>
               <div class="form-group col-md-3 col-sm-3">
                 <div>
                   <label>Journal Issue Number</label>
                 </div>
                 <div>
                  <input type="text" name="journalIssueNumber" class="form-control" placeholder="Please enter the journal issue number">
                 </div>
               </div>
               <div class="form-group col-md-3 col-sm-3">
                 <div>
                   <label>Journal Volume Number</label>
                 </div>
                 <div>
                  <input type="text" name="journalVolumeNumber" class="form-control" placeholder="Please enter the journal issue number">
                 </div>
               </div>
               <div class="form-group col-md-6 col-sm-6" style="float: right;">
                 <div>
                   <label>Is The Journal Paid?</label>
                 </div>
                 <div>
                   <input type="radio" name="journalPaid" value="yes">Yes 
                   <input type="radio" name="journalPaid" value="no">No
                 </div>
               </div>
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="panel panel-primary">
              <div class="panel-heading text-center">Paper Publication Details</div>
              <div class="panel-body">
                <div class="form-group col-md-3 col-sm-3
                ">
                  <div>
                    <label>Total Number of Pages</label>
                  </div>
                  <div>
                    <input type="text" class="form-control" name="paperNoOfPages" placeholder="Please Enter the number of pages in your paper">
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
                   <input type="file" name="paperSoftCopy" accept=".xlsx,.xls,.doc,.docx,.pdf" class="form-control">
                 </div>
               </div>
                <div class="form-group col-md-3 col-sm-3">
                 <div>
                   <label>Number Of Citations</label>
                 </div>
                 <div>
                   <input type="number" name="citationNum" class="form-control" min = "0">
                 </div>
               </div>
               <div class="form-group col-md-3 col-sm-3">
                <div>
                  <label>Indexing</label>
                </div>
                <div style="height:100px; overflow: scroll;">
                 <input type="checkbox" name="index[]" value="SCI"> SCI<br>
                 <input type="checkbox" name="index[]" value="Scopus"> Scopus<br>
                 <input type="checkbox" name="index[]" value="Springer"> Springer<br>
                 <input type="checkbox" name="index[]" value="Elsevier"> Elsevier<br>
                 <input type="checkbox" name="index[]" value="IEEE"> IEEE<br>
                 <input type="checkbox" name="index[]" value="IndexCopernicus"> IndexCopernicus<br>
                 <input type="checkbox" name="index[]" value="Thomas Reuters"> Thomas Reuters<br>
                 <input type="checkbox" name="index[]" value="DBLP"> DBLP<br>
                 <input type="checkbox" name="index[]" value="UGC Approved"> UGC Approved<br>
                 <input type="checkbox" name="index[]" value="Other"> Other
               </div>
               </div>
               <div class="form-group col-md-3 col-sm-3">
                 <div>
                   <label>DOI</label>
                 </div>
                 <div>
                   <input type="text" name="doi" class="form-control" placeholder="Please Enter the DOI if given">
                 </div>
               </div>
               <div class="form-group col-md-3 col-sm-3">
                 <div>
                   <label>Academic Start Year</label>
                 </div>
                  <div>
                  <div class="input-group date" id="datetimepickerYear">
                      <input type="text" class="form-control" name="academicStartYear" id="academicStartYear" />
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>
               </div>
              </div>
            </div>
          </div>
          @endif
          <div class="form-group col-md-6 col-sm-6">
            <button type="button" class="btn-danger form-control text-center">Reset</button>
          </div>
              @if(session()->get('firstAuthorNotExists') > 0)
              <div class="form-group col-md-6 col-sm-6">
              <button type="button" onclick="sval()" class="btn-success form-control text-center">Submit</button>
            </div>
            @endif
            @if(session()->get('firstAuthorNotExists') == 0)
            <div class="form-group col-md-6 col-sm-6">
              <button type="submit" class="btn-primary form-control text-center">Submit</button>
            </div>
            @endif
        {!! Form::close() !!}
        </div>
      </div>
    </div>
     @endif
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script src="/js/app.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script type = "text/javascript" src ="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script type="text/javascript">


    var count = 2;

     $(function () {

      $('#datetimepicker7').datetimepicker({
        useCurrent: false, //Important! See issue #1075
        viewMode: 'years',
        format: 'YYYY-MM-DD'
      });

      $('#datetimepickerYear').datetimepicker({
        useCurrent: false, //Important! See issue #1075
        viewMode: 'years',
        format: 'YYYY'
      });

      $('.lol').click(function(){
         if($(this).prop("checked"))
         {
           $('.checkbox .lol').each(function(){
             if($(this).prop("checked")){
               this.disabled = false;
             }
             else
             {
               this.disabled = true; 
             }
           });
         }
         else
         {
           $('.checkbox .lol').each(function(){
               this.disabled = false;
           });
         }
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

    function sval()
    {

        $('#slick')
          .empty()
          ;

          daySelect = document.getElementById('slick');

        var emparr = new Array();

        emparr.push('Select an option');

       $('.selectempid').each(function(){
            if(!emparr.includes(this.value) && this.value != "")
            {
              emparr.push(this.value);
            }
            });
            for(var i = 0;i<emparr.length;i++)
            {
                  if(i == 0)
                  {

                  }
                  var x = document.createElement("OPTION");
                  x.setAttribute("value",emparr[i]);
                  var t = document.createTextNode(emparr[i]);
                  x.appendChild(t);
                  daySelect.appendChild(x); 
              }
              daySelect.options[0].disabled = true;
              daySelect.options[0].selected = true;
             $('#myModal').modal('show');
    }

      // var formTemplate = $('#form-template > form').clone()[0];
      // $('#form-template').remove();

      // var swalConfig = {
      // title: 'Demo Form',
      // content: formTemplate,
      // button: {
      //     text: 'Submit',
      //     closeModal: false
      //   }
      // };

      // swal(swalConfig
        // text: "Hello world!",
        // closeOnClickOutside: false,
        // closeOnEsc: false,
          // );

      // console.log(formTemplate)
    

    function createString(data)
    {
      var str = "<div class = \"row\"><div class=\"authorlibinfo\"><hr style = \"border:solid 1px black;\"><div class=\"form-group col-md-3 col-sm-3\"><div><label>Emp-ID/Emp-RollNo</label></div><div><input type=\"text\" class=\"form-control selectempid\" name=\"empId[]\" placeholder=\"Please Enter the ID or Roll Number of the Employee\"></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>First Name</label></div><div><input type=\"text\" class=\"form-control selectoption\" name=\"fname[]\" placeholder=\"Please Enter the First Name of the Author\"></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>Last Name</label></div><div><input type=\"text\" class=\"form-control\" name=\"lname[]\" placeholder=\"Please Enter Last Name of the Author\"></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>Email</label></div><div><input type=\"text\" class=\"form-control\" name=\"email[]\" placeholder=\"Please Enter the email-id of the author\"></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>Type of Author</label></div><div><select class=\"form-control\" name=\"authorType[]\"><option>Staff</option><option>Research Scholar</option><option>PG Student</option><option>UG Student</option></select></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>Department</label></div><div><select class=\"form-control\" name=\"authorDepartment[]\"><option>IT</option><option>Computer</option><option>ENTC</option><option>Civil</option><option>Mechanical</option></select></div></div><div class=\"form-group col-md-3 col-sm-3\"><button type=\"button\" class=\"btn-danger text-center remo\" onclick = \"rem(this)\">Remove Author</button></div></div></div>";
        return str;
    }

    function rem(data)
    {
       $(data).parent().parent().remove();
    }

    function selectFirstAuthor(data)
    {
      document.getElementById('faemp').value = data;
      // console.log(document.getElementById('faemp').value);
     // console.log(data);
    }

    function saveData()
    {
      document.getElementById("publicationJournalForm").submit();
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