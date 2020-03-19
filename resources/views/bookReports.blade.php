<!DOCTYPE html>
<html>
<head>
  <title>Report generation - Book reports</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.0/chartist.min.css">
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.0/chartist.min.js"></script>

  <style type="text/css">
    .ct-label{
      color: black !important;
    }
    .ct-horizontal .ct-end{
      font-size: 1em !important;
    }

    .ct-series-a .ct-line {
      /* Set the colour of this series line */
      stroke: red;
      /* Control the thikness of your lines */
      stroke-width: 5px;
    }

    .ct-perfect-fourth:before{
      padding-bottom: 30% !important;
    }

    .ct-label.ct-horizontal.ct-end{
      align-items: center;
      justify-content: center;
    }

    .ct-chart svg{
      margin: 0 auto !important;
      right: 0px !important;
    }

    @media print
    {
      .no-print, .no-print *
      {
        display: none !important;
      }
    }
  </style>
</head>
<body>
  @include('inc.navbar')
  <!-- Class main should be always the outermost class -->
  <div class="main">
    <div class="container-fluid no-print">
      <div class="panel panel-primary">
        <div class="panel-heading">Report Generation Module</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-4" for="department">Select Department:</label>
                <div class="col-sm-8 col-md-8">
                  <select class="form-control" id="dept" name="department">
                    <option>Computer</option>
                    <option>IT</option>
                    <option>Mechanical</option>
                    <option>Civil</option>
                    <option>Entc</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-4" for="yearRangeStart">Select Year:</label>
                <div class="col-sm-8 col-md-8">
                  <div class="input-group date" id="datetimepicker6">
                    <input type='text' class="form-control" name="yearRangeStart" id="yearRangeStart" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-4" for="yearRangeEnd">Select Year:</label>
                <div class="col-sm-8 col-md-8">
                  <div class="input-group date" id="datetimepicker7">
                      <input type="text" class="form-control" name="yearRangeEnd" id="yearRangeEnd" />
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row text-center">
            <button type="button" class="btn btn-primary" onclick="getReport();">Generate</button>
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
    $(function () {
      $('#datetimepicker6').datetimepicker({
        viewMode: 'years',
        format: 'YYYY'
      });
      $('#datetimepicker7').datetimepicker({
        useCurrent: false, //Important! See issue #1075
        viewMode: 'years',
        format: 'YYYY'
      });
      $("#datetimepicker6").on("dp.change", function (e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
      });
      $("#datetimepicker7").on("dp.change", function (e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
      });
      $.ajaxSetup({
            headers: {
        	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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

    function getReport()
    {
      	var department = $("#dept").val();
      	var start = $("#yearRangeStart").val();
      	var end = $("#yearRangeEnd").val();      
      	$.post('/bookReport',{department: department,yearRangeStart: start,yearRangeEnd: end},function(data){
       	   	if($('.bookReportContainer').length > 0)
           	{
               	$('.bookReportContainer').remove();
           	}
           	$('.main').append(data);
           	// console.log(data);
      	});
      	// $.post({
      	// 	url: '/bookReport',
      	// 	data:{
      	// 		department: department,
      	// 		yearRangeStart: start,
      	// 		yearRangeEnd: end
      	// 	},
      	// 	success:function(data){
      	// 		console.log("hello");
      	// 	}
      	// });
    }
    
    function genBarchart(data,startYear,endYear,resize = false)
    {
      var diff = endYear - startYear;
      if(diff==1)
      {
        var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var month_counts = Array.apply(null, Array(12)).map(Number.prototype.valueOf,0);
        for (var i = 0; i < data.length; i++) 
        {
          // creating a Date Object 
          var DateObj = new Date(data[i]["startDate"]);
          // month from above Date Object is
          // being extracted using getMonth()
          month_counts[DateObj.getMonth()]++;
        }

        //Chartist
        var data = {
          labels: months,
          series: [month_counts]
        };
        if(!resize)
        {
          var options = {
            width: "100%",
            height: 200,
            axisY: {
              offset: 0,
              scaleMinSpace: 20,
              showGrid: true,
              showLabel: true
            }
          };
        }
        else{
          var options = {
            width: 600,
            height: 200,
            axisY: {
              offset: 0,
              scaleMinSpace: 20,
              showGrid: true,
              showLabel: true
            }
          };
        }
        new Chartist.Bar('.ct-chart', data, options);
      }
      else
      {
        var year_count = {};
        var year_labels = [];
        for (var i = startYear,j=0,k=parseInt(startYear)+1; i < endYear; i++,j++,k++) {
          year_count[i] = 0;
          year_labels[j] = ""+i+"-"+k+"";
        }
        for (var i = 0; i < data.length; i++) 
        {
          // creating a Date Object 
          var DateObj = new Date(data[i]["startDate"]);
          // month from above Date Object is
          // being extracted using getMonth()
          year_count[DateObj.getFullYear()]++;
        }
        var workshop_count = [];
        for (var i = startYear,j=0; i < endYear; i++,j++) {
          workshop_count[j] = year_count[i];
        }
        //Chartist
        var data = {
          labels: year_labels,
          series: [workshop_count]
        };
        if(!resize)
        {
          var options = {
            width: "100%",
            height: 200,
            axisY: {
              offset: 0,
              scaleMinSpace: 20,
              showGrid: true,
              showLabel: true
            }
          };
        }
        else{
          var options = {
            width: 600,
            height: 200,
            axisY: {
              offset: 0,
              scaleMinSpace: 20,
              showGrid: true,
              showLabel: true
            }
          };
        }
        new Chartist.Bar('.ct-chart', data, options);
      }
    }

    function genTable(data)
    {
      var table = "";
      var colnames = ["Sr. no","Faculty","Book Name","Chapters","Publisher","Co-Authors","Publication Type","Date Of Publication","ISBN No.","Faculty Signature"];
      for(var i=0;i<data.length;i++)
      {
        table += "<tr><td>"+(i+1)+"</td>";
        for(var j=0;j<colnames.length;j++)
        {
          table += "<td>"+data[i][colnames[j]]+"</td>";
        }
        table += "</tr>";
      }
      $('.reportTable_body').html(table);
    }
  </script>
</body>
</html>
