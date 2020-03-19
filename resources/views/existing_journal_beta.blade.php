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
form
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
            <div>
           <label>
             Existing Citations: <span id="ExCitations"></span>
           </label> 
         </div>
         <div>
           <label>
             Add to the Existing Citations:
           </label>
           <input type="number" name="newCitations" id="nc1" onchange="saveCitations(this.value)">
         </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Not Now</button>
            <button type="button" class="btn btn-primary" onclick="finalCitations()">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="updateFirstAuthorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
           <select class="form-control final" name="firstAuthorEmpid" onchange="selectFirstAuthor(this.value);" id="firstAuthorSelectBox">
            <option value="-1" disabled selected>Select an Option</option>
           </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="saveAuthor()">Save changes</button>
          </div>
        </div>
      </div>
    </div>








    
    <div class="container-fluid">
      <div class="panel panel-primary">
        <div class="panel-heading text-center"><b>Functions</b></div>
        <div class="panel-body">
          <div class="row paperFns">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            {!! Form::open(['url' => '/fnsPaperAddAuth', 'method' => 'post', 'class' => 'form-vertical','id' => 'grp1']) !!}
            <div class="form-group">
              <button type="submit" name="addAuthorToExisting" class="btn btn-primary form-control">Add Author</button>
            </div>
            {!! Form::close() !!}
            {!! Form::open(['url' => '/fnsPaperUpdateCitations', 'method' => 'post', 'class' => 'form-vertical','id' => 'grp2']) !!}
            @if(session()->get('paperNotExists') != 1)
            <div class="form-group">
              <button name="updateCitations" type="button" class="btn btn-primary form-control" onclick="updateCitationsForm()">Update Citations</button>
            </div>
            <div>
            <input type="hidden" name="addCitations" id="updateCitationsModalVariable" id="upc" value="">
            </div>
            @endif
            {!! Form::close() !!}
            {!! Form::open(['url' => '/fnsPaperFirstAuthor', 'method' => 'post', 'class' => 'form-vertical','id' => 'grp3']) !!}
            @if(session()->get('firstAuthorNotExists') != 0)
            <div class="form-group">
              <button type="button" name="addFirstAuthor" class="btn btn-primary form-control" onclick="ajaxModal()">Update First Author</button>
              <input type="hidden" name="updateFirstAuthorVariable" id="ufm" value="" />
            </div>
            @endif
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>


     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script src="/js/app.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script type = "text/javascript" src ="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script type="text/javascript">


    var count = 2;

     $(function () {


      $.ajaxSetup({
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });

      $('#datetimepicker7').datetimepicker({
        useCurrent: false, //Important! See issue #1075
        viewMode: 'years',
        format: 'YYYY-MM-DD'
      });

      <?php
       //session()->put('paperTitle','lol');
        ?>
 
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

    function updateCitationsForm()
    {
      // va
      // existingCitations = document.getElementById('exc1');
       var ajaxPaperTitle = <?php echo '"'.session()->get('paperTitleVer2').'"'; ?>;
       $.post('/citationAjax',{paperTitle: ajaxPaperTitle},function(data){
        console.log(data);
        document.getElementById("ExCitations").innerHTML = data;
       });
       // var it = document.getElementById('ExCitations');
       // console.log(it);
       $('#myModal').modal('show');
    }

    function saveCitations(data)
    {
       document.getElementById('updateCitationsModalVariable').value = data;
    }

    function addauthe()
    {
       var str = "";
       str += createString(count);
       $(".authorinfo").append(str);
       count++;
    }

    function ajaxModal()
    {

      daySelect = document.getElementById('firstAuthorSelectBox');
      
      var ajaxPaperTitle = <?php echo '"'.session()->get('paperTitleVer2').'"'; ?>;
      // console.log(ajaxPaperTitle);

      $.post('/firstAuthorAjax',{paperTitle: ajaxPaperTitle},function(data){

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

           for(var i = 0;i<associateNewArray.length;i++)
           {
                   
           }
      });

      $('#updateFirstAuthorModal').modal('show');
    }

    function sval()
    {

        daySelect = document.getElementById('slick');
        var emparr = new Array();

       $('.selectempid').each(function(){
            if(!emparr.includes(this.value) && this.value != "")
            {
              emparr.push(this.value);
            }
            });
            for(var i = 0;i<emparr.length;i++)
            {
                  var x = document.createElement("OPTION");
                  x.setAttribute("value",emparr[i]);
                  var t = document.createTextNode(emparr[i]);
                  x.appendChild(t);
                  daySelect.appendChild(x); 
              }
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

    function finalCitations()
    {
      $('#grp2').submit();
    }

    function selectFirstAuthor(data)
    {
      document.getElementById('ufm').value = data;
      // console.log(document.getElementById('faemp').value);
     // console.log(data);
    }

    function saveData()
    {
      document.getElementById("publicationJournalForm").submit();
    }

    function addAuthor()
    {
    }

    function saveAuthor()
    {
      document.getElementById('grp3').submit();
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
