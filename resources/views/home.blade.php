<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/custom.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
</head>
<body> 
	@include('inc.navbar')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- <script src="/js/jquery-2.1.4.min.js"></script> -->
	<script src="/js/app.js"></script>
  	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
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
