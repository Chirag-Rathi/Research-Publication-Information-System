<!DOCTYPE html>
<html>
<head>
  <title>MOU</title>
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
        <div class="panel-heading text-center">MOU</div>
        <div class="panel-body main_panel">
          {!! Form::open(['url' => 'mou/submit','method' => 'post']) !!}
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
          <!-- <div class="form-group"> -->
                         <div class="row main_row_1">
                <div class="author_info">
                  <div class="form-group col-md-4 col-sm-4">
                   <div>
                     <div>
                      <label>MOU signed with:</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="mouTitle" placeholder="Please Enter with whom the MOU has been signed with">
                    </div>
                   </div>
                   <div>
                   </div>
                 </div>
                 <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>MOU Number</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="mouno" placeholder="Please Enter the MOU Number">
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>Upload MOU Document</label>
                    </div>
                    <div>
                      <input type="file" name="moudoc">
                  </div>
                    </div>
                 <div class="form-group col-md-4 col-sm-4">
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
                </div>
              </div>
            <!-- </div> -->
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
        format: 'YYYY-MM-DD'
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

   $(function () {
      $('#datetimepicker7').datetimepicker({
        useCurrent: false, //Important! See issue #1075
        viewMode: 'years',
        format: 'DD-MM-YYYY'
      });
    });
</script>
</body>
</html>