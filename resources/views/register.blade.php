<!DOCTYPE html>
<html>
<head>
	<title>Register New User</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <style type="text/css">
  form
  {
  	margin: 0 auto;
  	max-width: 250px;
  }
  	</style>
  </head>
  <body>
  	@include('inc.navbar')
  <div class="main">
  	<div class="container-fluid no-print">
  		<div class="panel panel-primary">
  			<div class = "panel-heading text-center">
  				Register
  			</div>
  		<div class="panel-body">
  			<div class="row">
  				{!! Form::open(['url' => '/register/submit','method' => 'post','class' => 'form-horizontal','enctype' => 'multipart/form-data']) !!}
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
  				<div class = "form-group">
  					<div>
  						<label class="control-label">
  							Name
  						</label>
  					</div>
  					<div>
  						<input type="text" class="form-control" name="name" placeholder="Please Enter Your Name">
  					</div>
  				</div>
  				<div class="form-group">
  					<div>
  						<label class="control-label">
  							Email
  						</label>
  					</div>
  					<div>
  						<input type="text" class="form-control" name="email" placeholder="Please Enter Your Email-Id">
  					</div>
  				</div>
  				<div class="form-group">
  					<div>
  						<label class="control-label">
  							Password
  						</label>
  					</div>
  					<div>
  						<input type="password" class="form-control" name="password" placeholder="Enter Your Password">
  					</div>
  				</div>
  				<div class="form-group">
  					<div>
  						<label class="control-label">
  							Re-Type Password
  						</label>
  					</div>
  					<div>
  						<input type="password" class="form-control" name="repassword" placeholder="Re-Type Your Passsword">
  					</div>
  				</div>
  				<div class="form-group">
  					<div>
  						<label class="control-label">
  							Hierarchial Position
  						</label>
  					</div>
  					<select class="form-control" id = "pos" name="position" onchange="giveSelection(this.value)">
  						<option>Faculty</option>
  						<option>HOD</option>
  						<option>Director</option>
  					</select>
  			</div>
  				<div class="form-group">
  					<div>
  						<label class="control-label">
  							Department
  						</label>
  					</div>
  					<select class = "form-control department_select" name="department">
  						<option>Computer</option>
  						<option>Civil</option>
  					</select>
  				</div>
  					<div class="form-group">
  					<button type="submit" class="btn btn-primary form-control">Register</button>
  				</div>
  			{!! Form::close() !!}
  		</div>
  	</div>
  	</div>
  </div>
  <script src="/js/app.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript">
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
</script>
</body>
</html>

