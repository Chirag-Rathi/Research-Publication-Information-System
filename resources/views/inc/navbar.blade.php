<div id="mySidenav" class="sidenav">
 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="dropdown">
   <a class="dropdown-toggle" data-toggle = "dropdown" href ="#">Publications<span class="caret"></span></a>
   <ul class="dropdown-menu">
    <li><a href="/journal">Journal</a></li>
    <li><a href="/conference">Conference</a></li>
    <li><a href="/book">Book</a></li>
  </ul>
</div>
 <!-- <a href="#">Book</a> -->
 <a href="/workshopAttended">Workshop Attended</a>
 <a href="/researchprojects">Research Projects</a>
 <a href="/consultancy">Consultancy</a>
 <a href="/mou">MOU</a>
 <a href="/ipr">IPR</a>
 <a href="/patents">Patents</a>
 <div class="dropdown">
   <a class="dropdown-toggle" data-toggle = "dropdown" href ="#">Reports<span class="caret"></span></a>
   <ul class="dropdown-menu">
     <li><a href="#">Publication Reports</a></li>
     <li><a href="/bookReports">Book Reports</a></li>
     <li><a href="#">Research Projects Reports</a></li>
     <li><a href="#">Consultancy Reports</a></li>
     <li><a href="#">Lab Development Reports</a></li>
     <li><a href="#">RD Activities Reports</a></li>
     <li><a href="/workshopReport">Workshop Attended Reports</a></li>
   </ul>
 </div>
</div>
<nav class="navbar navbar-inverse container-fluid p-r-0 p-l-0 b-rd-0">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" style="border: none;" data-toggle="collapse" data-target="#myNavbar">
        <span class="glyphicon glyphicon-user"></span><span class="caret"></span>
      </button>
      <a class="navbar-brand">
        <span style="font-size:1.5em;cursor:pointer;padding-right: 10px;" onclick="openNav()">&#9776;</span>
      </a>
      <div class="text-center" id="clg_name">
        <span style="font-size: 2em;color: white;">VIIT</span>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" id="lisa" data-toggle="dropdown" href="#">Account<span class="caret"></span></a>
          <ul class="dropdown-menu p-0 account-dropdown">
            @if(isset(Auth::user()->email))
            <li class="p-10 text-white">Hello, {{ Auth::user()->email }}</li>
            <li><a href="#">My profile</a></li>
            <li><a href="#">Logout</a></li>
            @else
            <li class="p-10 text-white">Hello, New User</li>
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
            @endif
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
