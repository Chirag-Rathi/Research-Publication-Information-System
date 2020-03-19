<!DOCTYPE html>
<html>
<head>
  <title>Workshop Attended</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body>
	@include('inc.navbar')
	<div class="container-fluid">
		<div class="panel panel-primary">
		  	<div class="panel-heading">Workshop Information</div>
		  	<div class="panel-body">
		  		{!! Form::open(['url' => '/workshopAttended/submit', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
					<div class="row">
					  	<div class="form-group col-md-4">
						    <label class="control-label col-md-4 col-sm-4" for="workshopName">Workshop Title:</label>
						    <div class="col-sm-8 col-md-8">
						      	<input type="text" class="form-control" id="workshopName" name="workshopName" placeholder="Enter Workshop title" />
						    </div>
					  	</div>
					  	<div class="form-group col-md-4">
						    <label class="control-label col-md-4 col-sm-4" for="organizedBy">Organized By:</label>
						    <div class="col-sm-8 col-md-8">
						      	<input type="text" class="form-control" id="organisedBy" placeholder="Enter Organised by" name="organisedBy" />
						    </div>
					  	</div>
					  	<div class="form-group col-md-4">
						    <label class="control-label col-md-4 col-sm-4" for="venue">Venue:</label>
						    <div class="col-sm-8 col-md-8">
						      	<input type="text" class="form-control" id="venue" name="venue" placeholder="Enter Venue" />
						    </div>
					  	</div>
					</div>
					<div class="row">
					  	<div class="form-group col-md-4">
						    <label class="control-label col-md-4 col-sm-4">Sponsored by College:</label>
						    <div class="col-sm-8 col-md-8">
						      	<div class="radio">
								  	<label class="radio-inline"><input type="radio" name="sponsored" value="Yes">Yes</label>
									<label class="radio-inline"><input type="radio" name="sponsored" value="No">No</label>
								</div>
						    </div>
					  	</div>
					  	<div class="form-group col-md-4">
						    <label class="control-label col-md-4 col-sm-4" for="fees">Fees paid:</label>
						    <div class="col-sm-8 col-md-8">
						      	<input type="text" class="form-control" id="fees" name="fees" placeholder="Enter Fees Paid">
						    </div>
					  	</div>
					  	<div class="form-group col-md-4">
						    <label class="control-label col-md-4 col-sm-4" for="daterange">Workshop Date:</label>
					  		<div class="col-sm-8 col-md-8">
					  			<input type="text" class="form-control" name="daterange" value="01/01/2018 - 01/15/2018" />
					  		</div>
						</div>
					</div>
					<div class="row">
					  	<div class="form-group col-md-4">
						    <label class="control-label col-md-4 col-sm-4">Upload Workshop Certificate:</label>
						    <div class="col-sm-8 col-md-8">
						      	<input type="file" class="form-control" name="doc" placeholder="Upload File">
						    </div>
					  	</div>
					</div>
					<div class="row">
					  	<div class="form-group col-md-4"> 
						    <div class="col-sm-offset-2 col-sm-10">
						      	<button type="submit" class="btn btn-primary">Submit</button>
						    </div>
					  	</div>
					</div>
					{!! Form::close() !!}
		  	</div>
		</div>
	</div>
	<script src="/js/app.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  	<script type="text/javascript">
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