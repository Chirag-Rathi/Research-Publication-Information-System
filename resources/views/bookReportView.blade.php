@if(!empty($bookObject))
<div class="container-fluid bookReportContainer">
    <div class="panel panel-primary">
        <div class="panel-heading" style="padding-bottom: 1em;">Book Report
            <button type="button" class="btn-sm no-print btn-primary pull-right" onclick="window.print();"><span class="glyphicon glyphicon-print"></span></button>
        </div>
        <div class="panel-body" style="color: black;">
            <div class="table">
                <div>
                    <h3 style="margin-bottom: .5em;" align="center">BRACT's<br/>Vishwakarma Institute of Information of Technology</h3>
                    <h4 style="margin-bottom: 1em;" align="center">Book Report</h4>
                </div>
                @foreach ($bookObject as $key => $value)
                    <div>
                        <h5 style="padding-top: 1em;"><strong>Acad. Year: </strong><span>{{ $key }}</span><span style="float: right;"><strong>Form No.: </strong>APF 12.3</span></h5>
                        <h5 style="margin-bottom: 1em;"><strong>Department: </strong>{{ $department }} Department<span style="float: right;"><strong>Date: </strong>{{ date("d/m/Y") }}</span></h5>
                    </div>
                    <div class="table-responsive">
                        <?php
                        if(count($value) > 0)
                        {
                        ?>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Faculty Name</th>
                                    <th>Name of the Book Published</th>
                                    <th>Chapter Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $x=1;
                                for($i=0;$i<count($value);$i++)
                                {
                                ?>
                                <tr>
                                    <td rowspan="{{count($value[$i]['chapters'][0])}}">{{$x}}</td>
                                    <td rowspan="{{count($value[$i]['chapters'][0])}}">{{$value[$i]["facultyNames"][0]}}</td>
                                    <td rowspan="{{count($value[$i]['chapters'][0])}}">{{$value[$i]["bookName"]}}</td>
                                    <td>{{$value[$i]["chapters"][0][0]}}</td>
                                </tr>
                                <?php
                                    // for($j=1;$j<count($value[$i]["chapters"][0]);$j++)
                                    // {
                                        // echo "<tr>";
                                        // if($j>0)
                                        // {
                                        //     echo "<td></td>";
                                        //     echo "<td rowspan=\"{{count($value[$i]['chapters'])}}\">".$value[$i]["facultyNames"][$j]."</td>";
                                        //     echo "<td>".$value[$i]["chapters"][$j][0]."</td>";
                                        // }
                                        // for($k=1;$k<count($value[$i]["chapters"][$j]);$k++)
                                        // {
                                            // echo "<td>".$value[$i]["chapters"][0][$j]."</td>";
                                        // }
                                        // echo "</tr>";
                                    // }
                                    for($j=0;$j<count($value[$i]["facultyNames"]);$j++)
                                    {
                                        if($j>0)
                                        {
                                            echo "<tr><td rowspan=\"{{count($value[$i]['chapters'][$j])}}\">".++$x."</td></tr>";
                                            // echo "<td rowspan=\"{{count($value[$i]['chapters'][$j])}}\">".$value[$i]["facultyNames"][$j]."</td>";
                                            // echo "<td rowspan=\"{{count($value[$i]['chapters'][$j])}}\">".$value[$i]["bookName"]."</td>";
                                            // echo "<td>".$value[$i]["chapters"][$j][0]."</td></tr>";
                                        }
                                        // echo "<tr>";
                                        for($k=1;$k<count($value[$i]["chapters"][$j]);$k++)
                                        {
                                            echo "<tr><td>".$value[$i]["chapters"][$j][$k]."</td></tr>";
                                        }
                                        // echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                        }
                        else
                        {
                            echo "<div style=\"width: 100%;background: lightgray;\">No results</div>";
                        }
                        ?>
                    </div>
                @endforeach
                <div class="pull-right" style="margin-top: 10px;">
                    <p>Signature of R/D co-ordinator.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container-fluid iprReport">
    <div class="panel panel-primary">
        <div class="panel-heading">Book Report</div>
        <div class="panel-body">
            No results Found
        </div>
    </div>
</div>
@endif
