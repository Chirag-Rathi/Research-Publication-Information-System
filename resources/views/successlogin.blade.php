<!DOCTYPE html>
<html>
<head>
  <title>Report generation - Workshop Attended</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/custom.css">
</head>
  <body>
	@include('inc.navbar')

	<br />
  <div class="container box">
   <h3 align="center">Simple Login System in Laravel</h3><br />

   @if(isset(Auth::user()->email))
    <div class="alert alert-danger success-block">
      <strong>Welcome {{ Auth::user()->email }}</strong>
      <br />
      <a href="{{ url('/logout') }}">Logout</a>
    </div>
   @else
      <script>window.location = "/login";</script>
   @endif
   <br/>
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