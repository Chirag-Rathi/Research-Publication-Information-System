<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/custom.css">
  <style type="text/css">
  	form { 
	margin: 0 auto; 
	max-width:250px;
	}
  </style>
</head>
  <body>
	@include('inc.navbar')

	@if(isset(Auth::user()->email))
		<script>window.location = "/";</script>
	@endif

	<div class="container-fluid">
		<div class="panel panel-primary">
		  	<div class="panel-heading text-center" style="font-size: 2.5em;">Login</div>
		  	<div class="panel-body">
		  		<div class="row" style="margin: 0px;">
		  			{!! Form::open(['url' => '/checklogin', 'method' => 'post', 'class' => 'form-horizontal']) !!}
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
				  	<div class="form-group">
					    <label class="control-label" for="email">Email:</label>
					    <div>
					      	<input type="text" class="form-control" id="email" name="email" placeholder="Enter email" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="control-label" for="password">Password:</label>
					    <div>
					      	<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" />
					    </div>
				  	</div>
				  	<div class="form-group"> 
					    <div class="text-center">
					      	<button type="submit" class="btn btn-primary">Submit</button>
					    </div>
				  	</div>
				  	{!! Form::close() !!}
				  	<div class="text-center">
				  		<div>
				  			<a href="/password/reset">Forgot password?</a>
				  		</div>
				  		<div>
				  			<span>New User? <a href="\register">Register Here</a></span>
				  		</div>
				  	</div>
				</div>
		  	</div>
		</div>
		
	</div>
	<script src="/js/app.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  	<script type="text/javascript">
    /* Set the width of the side navigation to 250px */
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
	</script>
</body>
</html>