<!DOCTYPE html>
<html>
<head>
  <title>IPR</title>
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
        <div class="panel-heading text-center">IPR information</div>
        <div class="panel-body main_panel">
          {!! Form::open(['url' => 'ipr/submit','method' => 'post']) !!}
<!-- FIRST BOX.....................................IPR AUTHORS -->
            <div class="panel panel-primary authappend">
              <div class="panel-heading text-center">IPR Authors information : </div>
              <div class="panel-body authorinfo">
                
                  <div class="author_info">
                    <div class="form-group col-md-4 col-sm-4">
                     <div>
                       <label>Emp Id/Role No : </label>
                     </div>
                     <div>
                        <input type="text" class="form-control" name="fnameauth1" placeholder="Please Enter the ID or Roll Number of the Employee">
                      </div>
                    </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>First Name : </label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="fnameauth1" placeholder="Enter the First Name">
                      </div>
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                      <div>
                        <label>Last Name : </label>
                      </div>
                      <div>
                        <input type="text" class="form-control" name="fnameauth1" placeholder="Enter the Last Name">
                      </div>
                    </div>
                  
                    <div class="form-group col-md-4 col-sm-4">
                      <div>
                        <label>Email : </label>
                      </div>
                      <div>
                        <input type="text" class="form-control" name="lnameauth1" placeholder="Enter Email">
                      </div>
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                     <div>
                       <label>Type of IPR Author : </label>
                     </div>
                     <div>
                       <select class="form-control" placeholder="" name="authortype1">
                         <option>Select Type</option>
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
                       <select class="form-control" placeholder="Select Department"name="authordepartment1">
                         <option>Select Department</option>
                         <option>IT</option>
                         <option>Computer</option>
                         <option>ENTC</option>
                         <option>Civil</option>
                         <option>Mechanical</option>
                         <option>Engineering and Applied Science</option>
                       </select>
                     </div>
                   </div>
                 
                 
                  <div class="form-group col-md-12 col-sm-12">
                   <button type="button" class="btn-success text-center pull-right"style="margin-top: 6px; width: 10%; border-radius: 8px; padding: 4px;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); " onclick="addauthe()">Add Author</button>
                  </div>
                </div>
              </div>
            </div>
 <!-- ------------------------------------------------------------------------------------------- -- -->
<!-- IPR DETAILS....SECOND CONTAINER         -->
      <div class="form-group">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            IPR details
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="form-group col-md-4 col-sm-4">
                <label>IPR Title : </label>
                <input type="text" name="title" class="form-control" placeholder="Enter IPR title here">
              </div>
              <div class="form-group col-sm-4 col-md-4">
                <label>IPR no. : </label>
                <input type="text" name="iprNo" class="form-control" placeholder="Enter IPR number">
              </div>
              <div class="form-group col-md-4 col-sm-4">
                <label>IPR Status : </label>
                <div>
                  <input type="radio" name="national"  value="yes">National
                  <input type="radio" name="national"  value="no">International
                </div>
              </div>
            </div>
            <div class="row">
             <div class="form-group col-md-4 col-sm-4">
                <label class="control-label" for="yearRangeEnd">Date of IPR published :</label>
                <div>
                  <div class="input-group date" id="datetimepicker7">
                      <input type="text" class="form-control" name="yearRangeEnd" id="yearRangeEnd" />
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>
              </div>
              <div class="form-group col-sm-4 col-md-4">
                <label>Upload Project Sanction Letter</label>
                <div>
                  <input type="file" name="papersoftcopy" class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group col-md-6 col-sm-6">
        <button type="button" class="btn-danger form-control text-center" onclick="window.locatiion.reload()">Reset</button>
      </div>
      <div class="form-group col-md-6 col-sm-6">
        <button type="submit" class="btn-success form-control text-center">Submit</button>
      </div>
      {!! Form::close() !!}
      </div>
     </div>
    </div>
    <!-- --------------------------------------------------------------------------------------- -->
  <script src="/js/app.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script type="text/javascript">


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
        str += createString();
        $(".authorinfo").append(str);
        
    }

    function createString(data)
    {
      var str = "<div class=\"remdiv\"><hr style = \"border:solid 1px black;\"><div class=\"form-group col-md-4 col-sm-4\"><div><label>Emp Id/Role No : </label></div><div><input type=\"text\"class=\"form-control\"name=\"fnameauth1\"placeholder=\"Please Enter the ID or Roll Number of the Employee\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>First Name : </label></div><div><input type=\"text\"class=\"form-control\"name=\"fnameauth1\" placeholder=\"Enter the First Name\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Last Name : </label></div><div><input type=\"text\"class=\"form-control\"name=\"fnameauth1\"placeholder=\"Enter the Last Name\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Email : </label></div><div><input type=\"text\"class=\"form-control\"name=\"lnameauth1\" placeholder=\"Enter Email\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Type of IPR Author : </label></div><div><select class=\"form-control\"name=\"authortype1\"><option>Select Type</option><option>Staff</option><option>PG Student</option><option>UG Student</option></select></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Department</label></div><div><select class=\"form-control\"name=\"authordepartment1\"><option>Select Department</option><option>IT</option><option>Computer</option><option>ENTC</option><option>Civil</option><option>Mechanical</option><option>Engineering and Applied Science</option></select></div></div><div class=\"form-group col-md-12 col-sm-12\"><button type=\"button\"class=\"btn-danger text-center pull-right\"style=\"margin-top: 6px; width: 10%; border-radius: 8px; padding: 4px;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);\"onclick=\"rem(this)\">Remove Author</button></div></div>";
        return str;
    }

    function rem(data)
    {
       $(data).parent().parent().remove();
    }

    function okay() {
      $("#project projectName").alert(agef);
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