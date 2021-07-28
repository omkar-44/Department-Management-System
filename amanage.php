<!DOCTYPE html>
<html>
   <html>
    <head>
        <title>login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/footer-basic-centered.css" type="text/css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
   <script src="js/bootstrap.js"></script>
      
      
      
      <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
      
      
      
      
       <link href='http://fonts.googleapis.com/css?family=Josefin+Slab:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lily+Script+One' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Quattrocento:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
     <body>
       
        <script   src="https://code.jquery.com/jquery-3.1.1.js"   integrity="sha256-
16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="   crossorigin="anonymous">  
    </script>
       
   <div class = "navbar navbar-default navbar-static-top">
      <div class="container ">
          <div class='navbar-header brand-name'>
              <a href="#" class="pull-left"><img src="img/bvit.png"></a>
              
         <button class = "navbar-toggle" data-toggle = "collapse" data-target=".navHeaderCollapse">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>

         </button>
            </div>
             <div class="collapse navbar-collapse navHeaderCollapse">
             
                <ul class = "nav navbar-nav navbar-right">
                  
                 

   <li ><a href = "alogin.php">Home</a></li>
                 
                  <li><a href = "stafffeed.php">Staff Feedback</a></li>
                 
                     <li class="active"><a href = "amanage.php">Other Feedback</a></li>
                     
 

                   <li><a href = "alogout.php">Log out</a></li>
                 
              
              </ul>
          </div>
      </div>
       
   </div>    
    <?php
    session_start();
      if($_SESSION["username"]==true)
      {
echo "<center>Hello"." ".$_SESSION["username"]." "."Sir</center>";
      }
      else
      {
          header('location:admin.php');
      }
    ?>
   
        <?php
$dbDatabase = "feed";

$dbServer = "localhost";

$dbUser = "root";

$dbPass = "";
$message="";
$conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');
    ?>    
      
   <div class="row">
       <div class="col-md-4 col-sm-4 col-xs-12"></div>
       
   <div class="col-md-4 col-sm-4 col-xs-12">
     <div class="col-md-12 text-center">
                 <legend><h2>Management Results</h2></legend> <p></p>
          <p></p></div>
      <form class="" form action="amanage.php" method="post">
        <div class="controls form-group">
        <label>Department</label>   
           
            <select name="Sub_Select"   class="form-control" style="width:350px">
               <option value="">Select Subject</option> 
                //populate value using php
                <?php
                    $query = "SELECT DISTINCT(Name) FROM management_data";
                    $results=mysqli_query($conn, $query);
                    //loop
                  
                    while($row = mysqli_fetch_assoc($results)){
                ?>
                <?php
                        echo '<option value="'.$row['Name'].'"';
              if (@$_POST['Sub_Select'] ==  $row['Name']) echo 'selected="selected"';
 
                echo '>'.$row['Name'].'</option>';
            ?>
                <?php
                    }
                ?>
            </select>
            </div>
                     
                                   <button type="submit" name="submit" class="btn btn-success btn-block" style="width:350px" >Submit</button></div>
  
           
           
           
            </div></div>
         </div>
       
         
            
         <?php 
 
    
    if(isset($_POST['submit']))
      {         
        $sql = "SELECT Name from management_data where Name = '".$_POST['Sub_Select']."'";
            $result = mysqli_query($conn , $sql);
                  $sub_name = $_POST['Sub_Select'];
           
          $sql="select *  from management_data where First = '5' and Name = '".$sub_name."'";
          $result1 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where First = '4' and Name = '".$sub_name."'";
          $result2 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where First = '3' and Name = '".$sub_name."'";
          $result3 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where First = '2' and Name = '".$sub_name."'";
          $result4 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where First = '1' and Name = '".$sub_name."'";
          $result5 = mysqli_query($conn, $sql);   
          $i1=0;$i2=0;$i3=0;$i4=0;$i5=0;
        if($result)
        {
            $chart_data[]=["Question 1"," Student %"];
           while($row=mysqli_fetch_assoc($result1))
        {         
               $i1++;               
        }
               $chart_data[] = ["Excellent",$i1];
              while($row=mysqli_fetch_assoc($result2))
        {         
               $i2++;               
        }
               $chart_data[] = ["Very Good",$i2];  
             while($row=mysqli_fetch_assoc($result3))
        {         
               $i3++;               
        }
               $chart_data[] = ["Good",$i3]; 
              while($row=mysqli_fetch_assoc($result4))
        {         
               $i4++;               
        }
               $chart_data[] = ["Satisfactory",$i4];  
               while($row=mysqli_fetch_assoc($result5))
        {         
               $i5++;               
        }
               $chart_data[] = ["Non-Satisfactory",$i5];
        }
           
      
      
            else
            {
                               echo "Fail".mysqli_error();   
                }
      }
    
?>
   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://www.google.com/jsapi"></script><!--	<script src="https://www.google.com/jsapi"></script>--->

<script type="text/javascript">
// Load google charts

   google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable(/*[
  ['Task', 'Hours per Day'],
  ['Work', 1],
  ['Eat', 2],
  ['TV', 4],
  ['Gym', 2],
  ['Sleep', 8]
]*/<?php echo json_encode($chart_data); ?>  );

  // Optional; add a title and set the width and height of the chart
  <?php
  if($sub_name == 'Office')
  echo "var options = {'title':'1.Behaviour of the Staff', 'width':550, 'height':400};";
  else if($sub_name == 'Medical Rooms')
      echo "var options = {'title':'1.Availability of Beds', 'width':550, 'height':400};";
  else if($sub_name == 'Toilet')
      echo "var options = {'title':'1.Level of Hygiene', 'width':550, 'height':400};";
  else
      echo "var options = {'title':'1.Behaviour of the Staff', 'width':550, 'height':400};";
  ?>
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('drawchart'));
  chart.draw(data, options);
}
    $(window).resize(function(){
        drawChart();
        
    });
</script>
           
     <body>
      <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
            <hr>     
<div id="drawchart" class="chart"></div>
          </div>
</body>        
         
        
         </hr>
         <?php 
 
    
    if(isset($_POST['submit']))
      {         
        $sql = "SELECT Name from management_data where Name = '".$_POST['Sub_Select']."'";
            $result = mysqli_query($conn , $sql);
                  $sub_name = $_POST['Sub_Select'];
           
          $sql="select *  from management_data where Second = '5' and Name = '".$sub_name."'";
          $result1 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where Second = '4' and Name = '".$sub_name."'";
          $result2 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where Second = '3' and Name = '".$sub_name."'";
          $result3 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where Second = '2' and Name = '".$sub_name."'";
          $result4 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where Second = '1' and Name = '".$sub_name."'";
          $result5 = mysqli_query($conn, $sql);   
          $i1=0;$i2=0;$i3=0;$i4=0;$i5=0;
        if($result)
        {
            $chart_data2[]=["Question 2"," Student %"];
           while($row=mysqli_fetch_assoc($result1))
        {         
               $i1++;               
        }
               $chart_data2[] = ["Excellent",$i1];
              while($row=mysqli_fetch_assoc($result2))
        {         
               $i2++;               
        }
               $chart_data2[] = ["Very Good",$i2];  
             while($row=mysqli_fetch_assoc($result3))
        {         
               $i3++;               
        }
               $chart_data2[] = ["Good",$i3]; 
              while($row=mysqli_fetch_assoc($result4))
        {         
               $i4++;               
        }
               $chart_data2[] = ["Satisfactory",$i4];  
               while($row=mysqli_fetch_assoc($result5))
        {         
               $i5++;               
        }
               $chart_data2[] = ["Non-Satisfactory",$i5];
        }
           
      
      
            else
            {
                               echo "Fail".mysqli_error();   
                }
      }
    
?>
   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://www.google.com/jsapi"></script><!--	<script src="https://www.google.com/jsapi"></script>--->

<script type="text/javascript">
// Load google charts

   google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart2);

// Draw the chart and set the chart values
function drawChart2() {
  var data = google.visualization.arrayToDataTable(/*[
  ['Task', 'Hours per Day'],
  ['Work', 1],
  ['Eat', 2],
  ['TV', 4],
  ['Gym', 2],
  ['Sleep', 8]
]*/<?php echo json_encode($chart_data2); ?>  );

  // Optional; add a title and set the width and height of the chart
  <?php
  if($sub_name == 'Office')
  echo "var options = {'title':'2.Availability of Office', 'width':550, 'height':400};";
  else if($sub_name == 'Medical Rooms')
      echo "var options = {'title':'2.Level of Hospitality', 'width':550, 'height':400};";
  else if($sub_name == 'Toilet')
      echo "var options = {'title':'2.Maintainance Done', 'width':550, 'height':400};";
  else if($sub_name == 'Canteen')
      echo "var options = {'title':'2.Quality of Food', 'width':550, 'height':400};";
  else
      echo "var options = {'title':'2.Knowledge of the Lab Apparatus', 'width':550, 'height':400};";
  ?>
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('drawchart2'));
  chart.draw(data, options);
}
    $(window).resize(function(){
        drawChart2();
        
    });
</script>
           
     <body>
      <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
            <hr>     
<div id="drawchart2" class="chart"></div>
          </div>
</body>        
         
        
         </hr>
        <?php 
 
    
    if(isset($_POST['submit']))
      {         
        $sql = "SELECT Name from management_data where Name = '".$_POST['Sub_Select']."'";
            $result = mysqli_query($conn , $sql);
                  $sub_name = $_POST['Sub_Select'];
           
          $sql="select *  from management_data where Third = '5' and Name = '".$sub_name."'";
          $result1 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where Third = '4' and Name = '".$sub_name."'";
          $result2 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where Third = '3' and Name = '".$sub_name."'";
          $result3 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where Third = '2' and Name = '".$sub_name."'";
          $result4 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where Third = '1' and Name = '".$sub_name."'";
          $result5 = mysqli_query($conn, $sql);   
          $i1=0;$i2=0;$i3=0;$i4=0;$i5=0;
        if($result)
        {
            $chart_data3[]=["Question 3"," Student %"];
           while($row=mysqli_fetch_assoc($result1))
        {         
               $i1++;               
        }
               $chart_data3[] = ["Excellent",$i1];
              while($row=mysqli_fetch_assoc($result2))
        {         
               $i2++;               
        }
               $chart_data3[] = ["Very Good",$i2];  
             while($row=mysqli_fetch_assoc($result3))
        {         
               $i3++;               
        }
               $chart_data3[] = ["Good",$i3]; 
              while($row=mysqli_fetch_assoc($result4))
        {         
               $i4++;               
        }
               $chart_data3[] = ["Satisfactory",$i4];  
               while($row=mysqli_fetch_assoc($result5))
        {         
               $i5++;               
        }
               $chart_data3[] = ["Non-Satisfactory",$i5];
        }
           
      
      
            else
            {
                               echo "Fail".mysqli_error();   
                }
      
      }
?>
   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://www.google.com/jsapi"></script><!--	<script src="https://www.google.com/jsapi"></script>--->

<script type="text/javascript">
// Load google charts

   google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart3);

// Draw the chart and set the chart values
function drawChart3() {
  var data = google.visualization.arrayToDataTable(/*[
  ['Task', 'Hours per Day'],
  ['Work', 1],
  ['Eat', 2],
  ['TV', 4],
  ['Gym', 2],
  ['Sleep', 8]
]*/<?php echo json_encode($chart_data3); ?>  );

  // Optional; add a title and set the width and height of the chart
  <?php
  if($sub_name == 'Office')
  echo "var options = {'title':'3.Speed of resolving any Issue', 'width':550, 'height':400};";
  else if($sub_name == 'Medical Rooms')
      echo "var options = {'title':'3.Availability of First Aid Box', 'width':550, 'height':400};";
  else if($sub_name == 'Toilet')
      echo "var options = {'title':'3. Availability of Water', 'width':550, 'height':400};";
  else if($sub_name == 'Canteen')
      echo "var options = {'title':'3.Level of Hygiene', 'width':550, 'height':400};";
  else if($sub_name == 'Library')
      echo "var options = {'title':'3.Knowledge of staff', 'width':550, 'height':400};";
  else
      echo "var options = {'title':'3.Ability to Solve issues', 'width':550, 'height':400};";
      
      
  ?>
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('drawchart3'));
  chart.draw(data, options);
}
    $(window).resize(function(){
        drawChart3();
        
    });
</script>
           
     <body>
      <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
            <hr>     
<div id="drawchart3" class="chart"></div>
          </div>
</body>        
         
        
         </hr>
         <?php 
 
    
    if(isset($_POST['submit']))
      {         
        $sql = "SELECT Name from management_data where Name = '".$_POST['Sub_Select']."'";
            $result = mysqli_query($conn , $sql);
                  $sub_name = $_POST['Sub_Select'];
           
          $sql="select *  from management_data where Fourth = '5' and Name = '".$sub_name."'";
          $result1 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where Fourth = '4' and Name = '".$sub_name."'";
          $result2 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where Fourth = '3' and Name = '".$sub_name."'";
          $result3 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where Fourth = '2' and Name = '".$sub_name."'";
          $result4 = mysqli_query($conn, $sql);
          $sql="select *  from management_data where Fourth = '1' and Name = '".$sub_name."'";
          $result5 = mysqli_query($conn, $sql);   
          $i1=0;$i2=0;$i3=0;$i4=0;$i5=0;
        if($result)
        {
            $chart_data4[]=["Question 4"," Student %"];
           while($row=mysqli_fetch_assoc($result1))
        {         
               $i1++;               
        }
               $chart_data4[] = ["Excellent",$i1];
              while($row=mysqli_fetch_assoc($result2))
        {         
               $i2++;               
        }
               $chart_data4[] = ["Very Good",$i2];  
             while($row=mysqli_fetch_assoc($result3))
        {         
               $i3++;               
        }
               $chart_data4[] = ["Good",$i3]; 
              while($row=mysqli_fetch_assoc($result4))
        {         
               $i4++;               
        }
               $chart_data4[] = ["Satisfactory",$i4];  
               while($row=mysqli_fetch_assoc($result5))
        {         
               $i5++;               
        }
               $chart_data4[] = ["Non-Satisfactory",$i5];
        }
           
      
      
            else
            {
                               echo "Fail".mysqli_error();   
                }
      }
    
?>
   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://www.google.com/jsapi"></script><!--	<script src="https://www.google.com/jsapi"></script>--->

<script type="text/javascript">
// Load google charts

   google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart4);

// Draw the chart and set the chart values
function drawChart4() {
  var data = google.visualization.arrayToDataTable(/*[
  ['Task', 'Hours per Day'],
  ['Work', 1],
  ['Eat', 2],
  ['TV', 4],
  ['Gym', 2],
  ['Sleep', 8]
]*/<?php echo json_encode($chart_data4); ?>  );

  // Optional; add a title and set the width and height of the chart
  <?php
  if($sub_name == 'Office')
  echo "var options = {'title':'4.Overall Experience', 'width':550, 'height':400};";
  else if($sub_name == 'Medical Rooms')
      echo "var options = {'title':'4.Overall Experience', 'width':550, 'height':400};";
  else if($sub_name == 'Toilet')
      echo "var options = {'title':'4.Overall Experience', 'width':550, 'height':400};";
  else if($sub_name == 'Canteen')
      echo "var options = {'title':'4.Overall Experience', 'width':550, 'height':400};";
  else if($sub_name == 'Library')
      echo "var options = {'title':'4.Overall Experience', 'width':550, 'height':400};";
  else
      echo "var options = {'title':'4.Punctuality', 'width':550, 'height':400};";
      
      
  ?>
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('drawchart4'));
  chart.draw(data, options);
}
    $(window).resize(function(){
        drawChart4();
        
    });
</script>
           
     <body>
         <div class="row"> <div class="col-md-4 col-sm-12 col-xs-12"></div>
            <div class="col-md-4 col-sm-12 col-xs-12">
            <hr>     
<div id="drawchart4" class="chart"></div>
          </div>
</body>        
         
        
      </div></div>
   

       
           

	<footer class="footer-basic-centered">

			<p class="footer-company-motto">BVIT</p>

			<p class="footer-links">
				<a href="#">Home</a>
				·
				<a href="#">Admin</a>
				·
				<a href="#">Student</a>
				·
				<a href="#">staff</a>
				·
				<a href="#">operator</a>
				
			</p>

			<p class="footer-company-name">Student Feedback System.All rights reserved. &copy; 2018</p>

		</footer>
   
   </body>
    </html>