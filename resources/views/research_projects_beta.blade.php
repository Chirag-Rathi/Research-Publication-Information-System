<!DOCTYPE html>
<html>
  <head>
    <title>Research Projects</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  </head>
  <body>
    @include('inc.navbar')

    @if(!session()->get('notExists'))
    <div class="container-fluid">
      <div class="panel panel-primary">
        <div class="panel-heading text-center"><b><h5>Project Details</h5></b></div>
        <div class="panel-body">
          <div class="row checkProject">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            {!! Form::open(['url' => '/checkProject', 'method' => 'post', 'class' => 'form-vertical']) !!}
            <div class="form-group col-md-6 col-sm-6 col-12">
              <label for="projectTitle">Project Title:</label>
              <input type="text" class="form-control" name="projectTitle" placeholder="Enter Project Title" />
            </div>
            <div class="form-group col-md-6 col-sm-6 col-12">
              <label for="proposalId">Proposal Id:</label>
              <input type="text" class="form-control" name="proposalId" placeholder="Enter Proposal Id"/>
            </div>
            <div class="form-group col-md-4 col-12">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    @endif

    @if(session()->get('notExists'))
    <div class="container-fluid">
      <div class="panel panel-primary">
        <div class="panel-heading text-center">Publication-Conference</div>
        <div class="panel-body main_panel">
          @if(session()->get('notExists') == 2)
          {!! Form::open(['url' => 'publicationreports/submit','method' => 'post']) !!}
          <div class="form-group">
            <div class="panel panel-primary authappend">
              <div class="panel-heading text-center">PI Information</div>
              <div class="panel-body authorinfo">
                         <div class="row main_row_1">
                <div class="author_info">
                  <div class="form-group col-md-4 col-sm-4">
                   <div>
                     <label>Role:</label>
                   </div>
                   <div>
                     <select class="form-control" name="authortype1">
                       <option>Mentor</option>
                       <option>Principal Investigator</option>
                       <option>CO-Principal Investigator</option>
                     </select>
                   </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>Emp-ID/Emp-RollNo</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="fnameauth1" placeholder="Please Enter the ID or Roll Number of tthe Employee">
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>First Name</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="fnameauth1" placeholder="Please Enter the First Name of the Author">
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>Last Name</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="lnameauth1" placeholder="Please Enter Last Name of the Author">
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>Email</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="authemail1" placeholder="Please Enter the email-id of the author">
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                   <div>
                     <label>Type of Investigator</label>
                   </div>
                   <div>
                     <select class="form-control" name="authortype1">
                       <option>Staff</option>
                       <option>PG Student</option>
                       <option>UG Student</option>
                     </select>
                   </div>
                 </div>
                 <div class="form-group col-md-4 col-sm-4">
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
                       <option>Engineering and Applied Science</option>
                     </select>
                   </div>
                 </div>
                  <div class="form-group col-md-8 col-sm-8">
                   <button type="button" class="btn btn-success btn-sm pull-right" onclick="addauthe()" style="box-shadow: 0px 0px 7px 0px #333;">Add Author</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          @endif
          @if(session()->get('notExists') == 0)
          <div class="form-group">
            <div class="panel panel-primary">
              <div class="panel-heading text-center">Funding Agency Details</div>
              <div class="panel-body">
                <div class="form-group col-md-4 col-sm-4">
                  <div>
                    <label>Funding Agency Name</label>
                  </div>
                  <div>
                    <input type="text" class="form-control" name="journalname" placeholder="Please enter the name of the Funding Agency">
                  </div>
                </div>
                <div class="form-group col-sm-4 col-md-4">
                    <div>
                     <label>Funding Agency Type</label>
                    </div>
                    <select class="form-control" name="authordepartment1">
                       <option>Internal Funding Agency</option>
                       <option>University Agency</option>
                       <option>External Funding Agency</option>
                    </select>
                </div>
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="panel panel-primary">
              <div class="panel-heading text-center">Paper Publication Details</div>
              <div class="panel-body">
                <div class="form-group col-md-4 col-sm-4">
                  <div>
                    <label>Project Title</label>
                  </div>
                  <div>
                    <input type="text" class="form-control" name="papertitle" placeholder="Please enter the title of your project">
                  </div>
                </div>
                <div class="form-group col-md-4 col-sm-4">
                  <div>
                    <label>Proposal ID Number</label>
                  </div>
                  <div>
                    <input type="text" class="form-control" name="papernoofpages" placeholder="Please Enter the proposal id number">
                  </div>
                </div>
               <div class="form-group col-md-4 col-sm-4">
                 <div>
                   <label>Amount Sanctioned</label>
                 </div>
                 <div>
                  <input type="text" name="journalnumber" class="form-control" placeholder="Please enter the sanctioned amount">
                 </div>
               </div>
               <div class="form-group col-md-4 col-sm-4">
                <label class="control-label" for="yearRangeEnd">Sanction Date:</label>
                <div>
                  <div class="input-group date" id="datetimepicker7">
                      <input type="text" class="form-control" name="yearRangeEnd" id="yearRangeEnd" />
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>
              </div>
               <div class="form-group col-md-4 col-sm-4">
                 <div>
                   <label>Upload Project Sanction Letter</label>
                 </div>
                 <div>
                   <input type="file" name="papersoftcopy" class="form-control">
                 </div>
               </div>
               <div class="form-group col-md-4 col-sm-4">
                     <div>
                       <label>Status Of Project</label>
                     </div>
                     <div>
                       <input type="radio" name="projectstat" value="yes">Ongoing 
                       <input type="radio" name="projectstat" value="no">Completed
                     </div>
                   </div>
              </div>
            </div>
          </div>
          @endif
          <div class="form-group col-md-6 col-sm-6">
            <button type="button" class="btn-danger form-control text-center" onclick=window.location.reload()>Reset</button>
          </div>
          <div class="form-group col-md-6 col-sm-6">
          <button type="submit" class="btn-success form-control text-center">Submit</button>
        </div>
        </div>
      </div>
    </div>
    @endif
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
      var str = "<div class=\"row main_row_1\"><div class=\"author_info\"><hr style = \"border:solid 1px black;\"><div class=\"form-group col-md-4 col-sm-4\"><div><label>Role:</label></div><div><select class=\"form-control\" name=\"authortype1"+data+"\"><option>Mentor</option><option>Principal Investigator</option><option>CO-Principal Investigator</option></select></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Emp-ID/Emp-RollNo</label></div><div><input type=\"text\" class=\"form-control\" name=\"fnameauth1"+data+"\" placeholder=\"Please Enter the ID or Roll Number of the Employee\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>First Name</label></div><div><input type=\"text\" class=\"form-control\" name=\"fnameauth1"+data+"\" placeholder=\"Please Enter the First Name of the Author\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Last Name</label></div><div><input type=\"text\" class=\"form-control\" name=\"lnameauth1"+data+"\" placeholder=\"Please Enter Last Name of the Author\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Email</label></div><div><input type=\"text\" class=\"form-control\" name=\"authemail1"+data+"\" placeholder=\"Please Enter the email-id of the author\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Type of Investigator</label></div><div><select class=\"form-control\" name=\"authortype1"+data+"\"><option>Staff</option><option>PG Student</option><option>UG Student</option></select></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Department</label></div><div><select class=\"form-control\" name=\"authordepartment1"+data+"\"><option>IT</option><option>Computer</option><option>ENTC</option><option>Civil</option><option>Mechanical</option><option>Engineering and Applied Science</option></select></div></div><div class=\"form-group col-md-4 col-sm-4\"><button type=\"button\" class=\"btn-danger remo pull-left\" onclick = \"rem(this)\">Remove Author</button></div></div></div>";
        return str;
    }

    function rem(data)
    {
       $(data).parent().parent().remove();
    }

    function allLetter(inputtxt)
    { 
      var regex=/^[a-zA-Z]+$/;
      if (!inputtxt.match(regex))
      {
        return false;
      }
      else
      {
        return true;
      }
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
          // var dataCheckProject = [];
          // var successFlag = 0;
          // $('.checkProjectButton').click(function(){
          //   $('.checkProject input').each(function () {
          //     if(allLetter(this.value))
          //     {
          //       dataCheckProject.push(this.value);
          //       successFlag = 1;
          //     }
          //     else
          //     {
          //       while (dataCheckProject.length) { dataCheckProject.pop(); }
          //     }
          //   });
          //   if(successFlag == 1)
          //   {
              // $.ajax({
              //   type: "POST",
              //   url: "/checkProject",
              //   data: dataCheckProject,
              //   success: function(data)
              //   {
              //     console.log(data);
              //   }
              // });
          //   }
          // });
      });
</script>
</body>
</html>