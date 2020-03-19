<!DOCTYPE html>
<html>
  <head>
    <title>Research Projects</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/date.css">
  </head>
  <body>
    @include('inc.navbar')

    @if(session()->get('notExists') === null)
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

    @if(session()->get('notExists') !== null)
    <div class="container-fluid">
      <div class="panel panel-primary">
        <div class="panel-heading text-center">Publication-Conference</div>
        {!! Form::open(['url' => '/oldResearch', 'method' => 'post', 'class' => 'form-vertical']) !!}
        <div class="panel-body main_panel">
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
                      <select class="form-control" name="authorRole[]">
                        <option value="Mentor">Mentor</option>
                        <option value="Principal Investigator">Principal Investigator</option>
                        <option value="Co-Principal Investigator">CO-Principal Investigator</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>Emp-ID/Emp-RollNo</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="authorEmpid[]" placeholder="Please Enter the ID or Roll Number of the Employee">
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>First Name</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="authorFname[]" placeholder="Please Enter the First Name of the Author">
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>Last Name</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="authorLname[]" placeholder="Please Enter Last Name of the Author">
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>Email</label>
                    </div>
                    <div>
                      <input type="text" class="form-control" name="authorEmail[]" placeholder="Please Enter the email-id of the author">
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>Type of Investigator</label>
                    </div>
                    <div>
                      <select class="form-control" name="authorType[]">
                        <option value="Staff">Staff</option>
                        <option value="PG Student">PG Student</option>
                        <option value="UG Student">UG Student</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <div>
                      <label>Department</label>
                    </div>
                    <div>
                      <select class="form-control" name="authorDepartment[]">
                        <option value="IT">IT</option>
                        <option value="Computer">Computer</option>
                        <option value="ENTC">ENTC</option>
                        <option value="Civil">Civil</option>
                        <option value="Mechanical">Mechanical</option>
                        <option value="Engineering and Applied Science">Engineering and Applied Science</option>
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
          @if(session()->get('notExists') > 0)
          <div class="panel panel-primary">
            <div class="panel-heading text-center">Funding Agency Details</div>
            <div class="panel-body">
              <div class="form-group col-md-4 col-sm-4">
                <div>
                  <label>Funding Agency Name</label>
                </div>
                <div>
                  <input type="text" class="form-control" name="fundingAgency" placeholder="Please enter the name of the Funding Agency"/>
                </div>
              </div>
              <div class="form-group col-sm-4 col-md-4">
                  <div>
                   <label>Funding Agency Type</label>
                  </div>
                  <select class="form-control" name="fundingAgencyType">
                     <option>Internal Funding Agency</option>
                     <option>University Agency</option>
                     <option>External Funding Agency</option>
                  </select>
              </div>
            </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading text-center">Paper Publication Details</div>
            <div class="panel-body">
              <!-- <div class="form-group col-md-4 col-sm-4">
                <div>
                  <label>Project Title</label>
                </div>
                <div>
                  <input type="text" class="form-control" name="projectTitle" placeholder="Please enter the title of your project">
                </div>
              </div>
              <div class="form-group col-md-4 col-sm-4">
                <div>
                  <label>Proposal ID</label>
                </div>
                <div>
                  <input type="text" class="form-control" name="proposalId" placeholder="Please Enter the proposal id number">
                </div>
              </div> -->
              <div class="form-group col-md-4 col-sm-4">
                <div>
                  <label>Amount Sanctioned</label>
                </div>
                <div>
                  <input type="text" name="amountSanctioned" class="form-control" placeholder="Please enter the sanctioned amount">
                </div>
              </div>
              <div class="form-group col-md-4 col-sm-4">
                <label class="control-label" for="date">Sanction Date:</label>
                <div>
                  <div class="input-group" id="datetimepicker7">
                    <input type="text" class="form-control" name="date" />
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
                  <input type="file" name="projectSanctionLetter" accept=".xlsx,.xls,.doc, .docx,.pdf" class="form-control"/>
                </div>
              </div>
              <div class="form-group col-md-4 col-sm-4">
                <div>
                  <label>Status Of Project</label>
                </div>
                <div>
                  <input type="radio" name="projectStatus" value="yes">Ongoing 
                  <input type="radio" name="projectStatus" value="no">Completed
                </div>
              </div>
            </div>
          </div>
          @endif
          <div class="form-group col-md-6 col-sm-6">
            <button type="reset" class="btn-danger form-control text-center">Reset</button>
          </div>
          <div class="form-group col-md-6 col-sm-6">
            <button type="submit" class="btn-success form-control text-center">Submit</button>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
    @endif
  <script src="/js/app.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="/js/moment.min.js"></script>
  <!-- Should always be after moment.min.js -->
  <script type="text/javascript" src="/js/date.js" defer></script>
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
      if(data == "Faculty" || data == "HOD"){$('.department_select').show();}else{$('.department_select').hide();}
    }

    function addauthe()
    {
       var str = createString();
       $(".authorinfo").append(str);
    }

    function createString()
    {
      var str = "<div class=\"row main_row_1\"><div class=\"author_info\"><hr style = \"border:solid 1px black;\"><div class=\"form-group col-md-4 col-sm-4\"><div><label>Role:</label></div><div><select class=\"form-control\" name=\"authorRole[]\"><option>Mentor</option><option>Principal Investigator</option><option>CO-Principal Investigator</option></select></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Emp-ID/Emp-RollNo</label></div><div><input type=\"text\" class=\"form-control\" name=\"authorEmpid[]\" placeholder=\"Please Enter the ID or Roll Number of the Employee\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>First Name</label></div><div><input type=\"text\" class=\"form-control\" name=\"authorFname[]\" placeholder=\"Please Enter the First Name of the Author\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Last Name</label></div><div><input type=\"text\" class=\"form-control\" name=\"authorLname[]\" placeholder=\"Please Enter Last Name of the Author\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Email</label></div><div><input type=\"text\" class=\"form-control\" name=\"authorEmail[]\" placeholder=\"Please Enter the email-id of the author\"></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Type of Investigator</label></div><div><select class=\"form-control\" name=\"authorType[]\"><option>Staff</option><option>PG Student</option><option>UG Student</option></select></div></div><div class=\"form-group col-md-4 col-sm-4\"><div><label>Department</label></div><div><select class=\"form-control\" name=\"authorDepartment[]\"><option>IT</option><option>Computer</option><option>ENTC</option><option>Civil</option><option>Mechanical</option><option>Engineering and Applied Science</option></select></div></div><div class=\"form-group col-md-8 col-sm-8\"><button type=\"button\" class=\"btn-sm btn-danger remo pull-right\"  style=\"box-shadow: 0px 0px 7px 0px #333;\" onclick = \"rem(this)\">Remove Author</button></div></div></div>";
        return str;
    }

    function rem(data)
    {
      $(data).parent().parent().remove();
    }

    function allLetter(inputtxt)
    {
      var regex=/^[a-zA-Z]+$/;if (!inputtxt.match(regex)){return false;}else{return true;}
    }
</script>
</body>
</html>