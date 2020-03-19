<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/custom.css">
  <style type="text/css">
  	form{
  		margin: 0 auto;
  		width: 250px;
  	}
  </style>
</head>
<body>
	<div class="container-fluid">
		<div class="panel panel-primary">
		  	<div class="panel-heading text-center" style="font-size: 2.5em;">Verify Email</div>
		  	<div class="panel-body">
		  		<div class="container">
		  			{!! Form::open(['url' => '/verifyEmailFirst', 'method' => 'post', 'class' => 'form-horizontal']) !!}

		  			<div class="row" style="margin: 0px;">
			  			<div class="form-group">
						    <label class="control-label" for="verifyOtp">Enter the OTP sent on your mail id:</label>
						    <div>
						      	<input type="text" class="form-control" id="verifyOtp" name="verifyOtp" placeholder="Enter OTP" />
						    </div>
					  	</div>
					</div>
					<div class="form-group"> 
						    <div class="text-center">
						      	<button type="submit" class="btn btn-primary">Submit</button>
						    </div>
				 	</div>
					{!! Form::close() !!}

		  		</div>
		  		<div class="container resend" style="display: none;"> 
					<div class="form-group"> 
					    <div class="text-center">
					      	<button type="button" class="btn btn-primary">Resend email</button>
					    </div>
				 	</div>
				</div>
		  	</div>
		</div>
	</div>
	<script src="/js/app.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script type="text/javascript">
    /* Set the width of the side navigation to 250px */
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    
    var time = 1000;
    $(function(){
    	setTimeout(function(){
    		$('.resend').show();
    	},1000);
    	$.ajaxSetup({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});
    	$('.resend').find('button').click(function(){
    		$.post('/resend',{flag:1},function(data){
	    		if(data == "SUCCESS")
	    		{
	    			$('.resend').remove();
	    		}
    		});
    	});
    });
	</script>
</body>
</html>