<!DOCTYPE html>
<html>
<head>
	<title>Publication-Book</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <style type="text/css">
  #initialButtonCheck
  {
  	margin: 0 auto;
  	max-width: 450px;
  }

   .buttonsHolderPanel
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
           <select class="form-control final" name="updatefirstAuthorEmpid" onchange="selectFirstAuthor(this.value);" id="slick">
            <option value="-1" disabled selected>Select an Option</option>
           </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="savaData()">Not Now</button>
            <button type="button" class="btn btn-primary" onclick="saveData()">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
           <select class="form-control final" name="firstAuthorEmpid" onchange="updateAuthor(this.value);" id="updateAuthorSelectBox">
            <option value="-1" disabled selected>Select an Option</option>
           </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Not Now</button>
            <button type="button" class="btn btn-primary" onclick="updatefirstAuthor()">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    @if (session()->get('bookNotExists') === null && session()->get('showOptions') === null)
    <div class="container-fluid">
      <div class="panel panel-primary">
        <div class="panel-heading text-center"><b>Book Details</b></div>
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
            {!! Form::open(['url' => '/checkBook', 'method' => 'post', 'class' => 'form-vertical','id' => 'grp1']) !!}
            <div class="form-group col-md-6 col-sm-6">
              <div>
              <label class="control-label">Book title:</label>
            </div>
            <div>
              <input type="text" class="form-control" name="bookTitle" placeholder="Please Enter Book Title" />
            </div>
            </div>
            <div class="form-group col-md-6 col-sm-6">
              <div>
                <label>
                  Please Enter the ISBN Number for your book:
                </label>
              </div>
              <div>
                <input type="text" class="form-control" name="isbnNumber" placeholder="Please Enter the ISBN Number for your book">
              </div>
            </div>
            <div class="form-group container-fluid text-center" id="initialButtonCheck">
              <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    @endif
    @if(session()->get('showOptions') !== null)
      <div class="container-fluid">
        <div class="panel panel-primary">
          <div class="panel-heading text-center"><b>Book Details</b></div>
          <div class="panel-body buttonsHolderPanel">
            {!! Form::open(['url' => '/fnsBookAddAuth', 'method' => 'post', 'class' => 'form-vertical','id' => 'grp1']) !!}
            <div class="form-group">
              <button type="submit" name="addAuthorToExisting" class="btn btn-primary form-control">Add Author</button>
            </div>
            {!! Form::close() !!}
            {!! Form::open(['url' => '/fnsBookFirstAuthor', 'method' => 'post', 'class' => 'form-vertical','id' => 'grp3']) !!}
            <div class="form-group">
              <button type="button" name="addFirstAuthor" class="btn btn-primary form-control" onclick="ajaxModal()">Update First Author</button>
              <input type="hidden" name="updateFirstAuthorVariable" id="ufm">
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    @elseif(session()->get('bookNotExists') !== null)
    <div class="container-fluid">
      <div class="panel panel-primary">
        <div class="panel-heading text-center">Publication-Book</div>
        <div class="panel-body main_panel">
          {!! Form::open(['url' => 'publicationBook/submit','method' => 'post','id' => 'bookForm']) !!}
            <div class="panel panel-primary authappend">
               <div class="panel-heading text-center">Author's Information</div>
               <div class="panel-body authorinfo">
                <div>
                        <div class="row container-fluid main_row_1">
                           <div class="form-group col-md-3 col-sm-3">
                              <div>
                                 <label>Emp-ID/Emp-RollNo</label>
                              </div>
                              <div>
                                 <input type="text" class="form-control selectempid" name="empid[]" placeholder="Please Enter the ID or Roll Number of the Employee">
                              </div>
                              <input type="hidden" name="firstAuth" id="faemp">
                           </div>
                           <div class="form-group col-md-3 col-sm-3">
                              <div>
                                 <label>First Name</label>
                              </div>
                              <div>
                                 <input type="text" class="form-control" name="fname[]" placeholder="Please Enter the First Name of the Author">
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
                                 <select class="form-control" name="authortype[]">
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
                                 <select class="form-control" name="authordepartment[]">
                                    <option>IT</option>
                                    <option>Computer</option>
                                    <option>ENTC</option>
                                    <option>Civil</option>
                                    <option>Mechanical</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group chapCount col-md-3 col-sm-3">
                              <div>
                                 <label>Chapter Name</label>
                              </div>
                              <div>
                                 <input type="text" name="chapterName" placeholder="Chapter Name" class="form-control chapname">
                              </div>
                              <input type="hidden" name="chapArray[]" class="chapArray"/>
                           </div>
                        </div>
                        <div class="row container-fluid">
                           <div class="form-group col-md-4 col-sm-4">
                              <button type="button" class="btn-warning text-center form-control" onclick="addauthe()">Add Author</button>
                           </div>
                           <div class="form-group col-md-4 col-sm-4">
                              <button type="button" class="btn-success text-center form-control" onclick="addchap(this)">Add Chapter</button>
                           </div>
                           <div class="form-group col-md-4 col-sm-4">
                              <button type="button" class="btn-danger text-center remoChap form-control" onclick="remoChap(this)">Remove Chapter
                              </button>
                           </div>
                        </div>
                      </div>
               </div>
            </div>
            @if(session()->get('bookNotExists') > 0)
            <div class="form-group">
            <div class="panel panel-primary">
              <div class="panel-heading text-center">Book Publication Details</div>
              <div class="panel-body">
                <div class="form-group col-md-3 col-sm-3
                ">
                  <div>
                    <label>Publisher Name:</label>
                  </div>
                  <div>
                    <input type="text" class="form-control" name="bookPublisher" placeholder="Please Enter the publisher of the book">
                  </div>
                </div>
               <div class="form-group col-md-3 col-sm-3">
                 <div>
                   <label>Type Of Publication:</label>
                 </div>
                 <div>
                  <select class="form-control" name="publicationType">
                  <option>Institute Level</option>
                  <option>University Level</option>
                  <option>State Level</option>
                  <option>National Level</option>
                  <option>International Level</option>
                </select>
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
                <label class="control-label" for="asy">Academic Start Year:</label>
                <div>
                  <div class="input-group date" id = "academicStartYear">
                    <input type="text" class="form-control" name="academicStartYear" id="asy">
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
            <button type="button" class="btn-danger form-control text-center" onclick=window.location.reload()>Reset</button>
          </div>
          <div class="form-group col-md-6 col-sm-6">
          <button type="button" onclick="assigningChapters()" class="btn-success form-control text-center">Submit</button>
        </div>
        </div>
      </div>
    </div>
    @endif

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script src="/js/app.js"></script>
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

      $('#academicStartYear').datetimepicker({
        useCurrent: false,
        viewMode:'years',
        format:'YYYY'
      });

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

      $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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

    function bootstrapAuthor()
    {
    }

    function ajaxModal()
    {

      daySelect = document.getElementById('updateAuthorSelectBox');
      
      var ajaxBookISBN = <?php echo '"'.session()->get('isbn').'"'; ?>;

      $.post('/firstAuthorAjaxBook',{bookISBN: ajaxBookISBN},function(data){

          $('#updateAuthorSelectBox')
          .empty()
          ;

            var x = document.createElement("OPTION");
                  x.setAttribute("selected",true);
                  x.setAttribute("disabled",true);
                  x.setAttribute("value",-1);
                  var t = document.createTextNode("Please Select some option");
                  x.appendChild(t);
                  daySelect.appendChild(x);

           // var associateNewArray = new Array();
           $.each(data,function(key,value){
              // console.log();
              // associateNewArray.push(value.empid + " " + value.name);
              var x = document.createElement("OPTION");
                  x.setAttribute("value",value.empid);
                  var t = document.createTextNode(value.empid + " " + value.name);
                  x.appendChild(t);
                  daySelect.appendChild(x);
           });

           $('#updateModal').modal('show');

           // for(var i = 0;i<associateNewArray.length;i++)
           // {
                   
           // }
      });

    }

    function remoChap(data)
    {
        var x = $(data).parent().parent().parent().find('.chapCount').length;
        if(x>1)
        {
        $(data).parent().parent().parent().find('.chapCount').last().remove();
        }
    }

    function addchap(data)
    {
      var str = "";
      str += createChap();
      $(data).parent().parent().prev().append(str);
      // chapCount++;
    }

    function createChap(data)
    {
      var str = "<div class = \"form-group col-md-3 col-sm-3 chapCount\"><div><label>Chapter Name</label></div><div><input type = \"text\" placeholder = \"Chapter Name\" class = \"form-control chapname col-md-3 col-sm-3\"></div></div>";
      return str;
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
      var str = "<div class=\"main_row_1\"><hr style = \"border:solid 1px black;\"><div class = \"row container-fluid\"><div class=\"form-group col-md-3 col-sm-3\"><div><label>Emp-ID/Emp-RollNo</label></div><div><input type=\"text\" class=\"form-control selectempid\" name=\"empid[]\" placeholder=\"Please Enter the ID or Roll Number of the Employee\"></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>First Name</label></div><div><input type=\"text\" class=\"form-control selectoption\" name=\"fname[]\" placeholder=\"Please Enter the First Name of the Author\"></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>Last Name</label></div><div><input type=\"text\" class=\"form-control\" name=\"lname[]\" placeholder=\"Please Enter Last Name of the Author\"></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>Email</label></div><div><input type=\"text\" class=\"form-control\" name=\"email[]\" placeholder=\"Please Enter the email-id of the author\"></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>Type of Author</label></div><div><select class=\"form-control\" name=\"authortype[]\"><option>Staff</option><option>Research Scholar</option><option>PG Student</option><option>UG Student</option></select></div></div><div class=\"form-group col-md-3 col-sm-3\"><div><label>Department</label></div><div><select class=\"form-control\" name=\"authordepartment[]\"><option>IT</option><option>Computer</option><option>ENTC</option><option>Civil</option><option>Mechanical</option></select></div></div><div class = \"form-group col-md-3 col-sm-3 chapCount\"><div><label>Chapter Name:</label></div><div><input type = \"text\" placeholder = \"Chapter Name\" name = \"chapterName\" class = \"form-control chapname\"></div><input type=\"hidden\" name=\"chapArray[]\"  class=\"chapArray\"></div></div><div class = \"row container-fluid\"><div class=\"form-group col-md-4 col-sm-4\"><button type=\"button\" class=\"btn-danger form-control text-center remo\" onclick = \"rem(this)\">Remove Author</button></div><div class = \"form-group col-md-4 col-sm-4\"><button type = \"button\" class = \"btn-success text-center form-control\" onclick = \"addchap(this)\">Add Chapter</div><div class=\"form-group col-md-4 col-sm-4\"><button type=\"button\" class=\"btn-danger text-center remoChap form-control\" onclick = \"remoChap(this)\">Remove Chapter</button></div></div></div>";
        return str;
    }

    function rem(data)
    {
       $(data).parent().parent().parent().remove();
    }

    function selectFirstAuthor(data)
    {
      document.getElementById('faemp').value = data;
      // console.log(document.getElementById('faemp').value);
     // console.log(data);
    }

    function updatefirstAuthor()
    {
      // console.log(data);
      document.getElementById('grp3').submit();
    }

    function updateAuthor(data)
    {
      document.getElementById('ufm').value = data;
      // console.log(data);
    }

    function saveData()
    {
      document.getElementById("bookForm").submit();
    }

    function savaData()
    {
      document.getElementById('faemp').value = null;
      document.getElementById("bookForm").submit();
    }

    function assigningChapters()
    {
      // var arr = document.getElementById('#chaparr');
      // var arr = [];
      // $(".main_row_1 .chapname").each(function() { alert($(this).val()); });
      $(".main_row_1").each(function() { 
        var x = [];
        $(this).find('.chapname').each(function(){
          x.push($(this).val());
        });
        $(this).find('.chapArray').val(x);
        // arr.push(x);
      });

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
      // document.getElementById('chaparr').value = arr;
      // console.log(document.getElementById('chaparr'));

      // var x[] = document.getElementsByName('chapterName[]');
      // console.log(x);
    }

</script>
</body>
</html>