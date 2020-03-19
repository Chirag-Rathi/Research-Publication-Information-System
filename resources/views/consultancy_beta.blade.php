<!DOCTYPE html>
<html>
<head>
  <title>Consultancy</title>
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
        <div class="panel-heading text-center">Consultancy</div>
        <div class="panel-body main_panel">
          {!! Form::open(['url' => '/consultancy_beta/submit','method' => 'post','enctype' => 'multipart/form-data']) !!}
          <div class="form-group"> 
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
             <div class="row main_row_1">
                <div class="author_info">
                  <div class="form-group col-md-4 col-sm-4">
                   <div>
                     <div>
                      <label>Enter the title of the required consultancy:</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="consulTitle" placeholder="Please Enter the title of the consultancy">
                    </div>
                   </div>
                   <div>
                   </div>
                 </div>
                 <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>Sanctioned Consultancy Amount:</label>
                    </div>
                    <div>
                      <input type="number" class="form-control" name="consultamt" placeholder="Please Enter the amount for the consultancy">
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>Consultancy done for:</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="consultDoneFor" placeholder="Please Enter the Name of the people for whom the consultancy is done">
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>Social Relevance</label>
                    </div>
                    <div>
                      <input type="radio" name="socialrelevance" value="yes">Yes
                      <input type="radio" name="socialrelevance" value="no">No
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                    <label>
                      Type of Consultancy:
                    </label>
                  </div>
                  <div>
                    <select class="form-control" name="consultancyType">
                      <option>Institute Level</option>
                      <option>University Level</option>
                      <option>State Level</option>
                      <option>National Level</option>
                      <option>International Level</option>
                    </select>
                  </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>Consultancy Period</label>
                    </div>
                    <div>
                       <input type="text" class="form-control" name="daterange" value="01/01/2018 - 01/15/2018" />
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                   <div>
                     <label>Upload Consultancy Document Here:</label>
                   </div>
                   <div>
                    <input type="file" name="consultdoc">
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
        {!! Form::close() !!}
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
      var str = "<div class=\"row main_row_1\"><div class=\"author_info\"><hr style = \"border:solid 1px black;\"><div class=\"form-group col-md-4 col-sm-4\"><div><label>Role:</label></div><div><select class=\"form-control\" name=\"authortype1"+data+"\"><option>Mentor</option><option>Principal Investigator</option><option>CO-Principal Investigator</option></select></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Emp-ID/Emp-RollNo</label></div><div><input type=\"text\" class=\"form-control\" name=\"fnameauth1"+data+"\" placeholder=\"Please Enter the ID or Roll Number of the Employee\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>First Name</label></div><div><input type=\"text\" class=\"form-control\" name=\"fnameauth1"+data+"\" placeholder=\"Please Enter the First Name of the Author\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Last Name</label></div><div><input type=\"text\" class=\"form-control\" name=\"lnameauth1"+data+"\" placeholder=\"Please Enter Last Name of the Author\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Email</label></div><div><input type=\"text\" class=\"form-control\" name=\"authemail1"+data+"\" placeholder=\"Please Enter the email-id of the author\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Type of Investigator</label></div><div><select class=\"form-control\" name=\"authortype1"+data+"\"><option>Staff</option><option>PG Student</option><option>UG Student</option></select></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Department</label></div><div><select class=\"form-control\" name=\"authordepartment1"+data+"\"><option>IT</option><option>Computer</option><option>ENTC</option><option>Civil</option><option>Mechanical</option><option>Engineering and Applied Science</option></select></div></div><div class=\"form-group col-md-4 col-sm-4\"><button type=\"button\" class=\"btn-danger text-center remo pull-left\" onclick = \"rem(this)\">Remove Author</button></div></div></div>";
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
      });
</script>
</body>
</html>