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

  	#cust {
  		 width: 700px;
  		height: 300px;
  		border: 1px solid #c3c3c3;
  	}

</style>
</head>
<body>
	<div class="container-fluid panel panel-primary" id="cust">
		<div class="panel-heading">WT Assignments</div>
	<div>
		<input type="text" name="username" placeholder="Please Enter Your name" id="uname" class="form-control" required="true">
	</div>
	<div>
		<input type="password" name="pass" class="form-control" placeholder="Please Enter your password" required="true" id="poss">
	</div>
	<div>
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
	<div>
		<button class="form-control btn-primary" onclick="validate()">
			Submit
		</button>
	</div>
              </div>
<script type="text/javascript">

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
	
	function validate()
	{
		var y = document.getElementById('poss').value;
		var x = document.getElementById('uname').value;
		
		if (x == "chirag") {
			if (y == "viit") {
				alert('success');
			}

			else
			{
				alert('wrong password')
			}
		}

		else
		{
			alert('Enter Correct Data');
		}

	}

</script>
</body>
</html>