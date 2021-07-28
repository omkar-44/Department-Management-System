<?php
                      $dbDatabase = "feed";
                      $dbServer = "localhost";
                      $dbUser = "root";
                      $dbPass = "";
                      $message="";
                      $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');
                      
                 

?>
<html>
    <head>
        <title>login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/footer-basic-centered.css" type="text/css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


       <link href='http://fonts.googleapis.com/css?family=Josefin+Slab:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lily+Script+One' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Quattrocento:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
 


      
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
                  
                  <li><a href = "sflogin.php">Home</a></li>
                  
                  <li class = "active"><a href = "chfeeds.php">check feedback</a></li>
                    <li><a href = "rdcmnts.php">read comments</a></li>
                                   
                   <li><a href = "stlogout.php">Log out</a></li>
                 
              
              </ul>
          </div>
      </div>
       
   </div>    
    <?php
session_start();
      if($_SESSION["User"]==true)
      {
echo "<center>Hello"." ".$_SESSION["Name"]." "."Sir</center>";
      }
      else
      {
          header('location:staff.php');
      }
      ?>

<div class="container">
     
       <div class="row">
         
           <div class="col-md-3 col-sm-4 col-xs-12"></div>
            <div class="col-md-6 col-sm-4 col-xs-12"> 
             <form class="" form action="chfeeds.php" method="post">
  <br>
    <div class="col-md-12 text-center">
        <legend><h3>Manage Staff Detail:</h3></legend> <p></p>
          <p></p></div>
        <div class="controls form-group">
            
       <?php
         $sql = "SELECT Subname from allosub where Teacher = '".$_SESSION['Name']."'";
            $result = mysqli_query($conn , $sql);  
            
      ?>
      <div class="control-group">
       <center> <select class="form-control" name ="Sub_Select" style="width:300px"></center> </div>
       <option value="">Select Subject</option> 
        <?php 
         
          while($row = mysqli_fetch_assoc($result)) {
  
             
           
           echo '<option value="'.$row['Subname'].'"';
              if (@$_POST['Sub_Select'] ==  $row['Subname']) echo 'selected="selected"';
 
    echo '>'.$row['Subname'].'</option>';
                
             
         }
          
echo '</select>';
             ?>
              <br></div>    <div class="control-group">
             <button name="submit" type="submit" class="btn btn-info btn-flat btn-lg center-block">Submit</button></div></div>
                 </div></div>
           
            
    </div></div>
           
          
            <?php
                 if(isset($_POST['submit']))
      {         
                  $sub_name = $_POST['Sub_Select'];
          $sql="select *  from feedback_data where First = '5' and Subname = '".$sub_name."'";
          $result1 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where First = '4' and Subname = '".$sub_name."'";
          $result2 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where First = '3' and Subname = '".$sub_name."'";
          $result3 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where First = '2' and Subname = '".$sub_name."'";
          $result4 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where First = '1' and Subname = '".$sub_name."'";
          $result5 = mysqli_query($conn, $sql);   
          $i1=0;$i2=0;$i3=0;$i4=0;$i5=0;
        if($result)
        {
            $chart_data[]=["Knowledge of the Subject"," Student %"];
           while($row=mysqli_fetch_array($result1))
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
  var options = {'title':'1.Knowledge of the Subject', 'width':550, 'height':400};

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
                  $sub_name = $_POST['Sub_Select'];
          $sql="select *  from feedback_data where Second = '5' and Subname = '".$sub_name."'";
          $result1 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Second = '4' and Subname = '".$sub_name."'";
          $result2 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Second = '3' and Subname = '".$sub_name."'";
          $result3 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Second = '2' and Subname = '".$sub_name."'";
          $result4 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Second = '1' and Subname = '".$sub_name."'";
          $result5 = mysqli_query($conn, $sql);   
          $i1=0;$i2=0;$i3=0;$i4=0;$i5=0;
        if($result)
        {
            $chart_data2[]=["2.Behavior of the Faculty:"," Student %"];
           while($row=mysqli_fetch_array($result1))
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
  var options = {'title':'2.Behavior of the Faculty:', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('drawchart2'));
  chart.draw(data, options);
}
    $(window).resize(function(){
        drawChart2();
        
    });
</script>
            
                <body>  
            
            <div class="col-md-4 col-sm-12 col-xs-12"> 
            <hr>      
         
<div id="drawchart2" class="chart"></div>
              </div>  </body>     
        
     
               
     
              
          
            <?php
                 if(isset($_POST['submit']))
      {         
                  $sub_name = $_POST['Sub_Select'];
          $sql="select *  from feedback_data where Third = '5' and Subname = '".$sub_name."'";
          $result1 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Third = '4' and Subname = '".$sub_name."'";
          $result2 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Third = '3' and Subname = '".$sub_name."'";
          $result3 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Third = '2' and Subname = '".$sub_name."'";
          $result4 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Third = '1' and Subname = '".$sub_name."'";
          $result5 = mysqli_query($conn, $sql);   
          $i1=0;$i2=0;$i3=0;$i4=0;$i5=0;
        if($result)
        {
            $chart_data3[]=[""," Student %"];
           while($row=mysqli_fetch_array($result1))
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
  var options = {'title':"3.Use of Teaching Aids:", 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('drawchart3'));
  chart.draw(data, options);
}
    $(window).resize(function(){
        drawChart3();
        
    });
</script>
            
     <body><div class="col-md-4 col-sm-12 col-xs-12">
            
       
            <hr>
<div id="drawchart3" class="chart"></div>
 </div>
</body>         
    </div></div>
               
               
    
           
          
            <?php
                 if(isset($_POST['submit']))
      {         
                  $sub_name = $_POST['Sub_Select'];
          $sql="select *  from feedback_data where Fourth = '5' and Subname = '".$sub_name."'";
          $result1 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Fourth = '4' and Subname = '".$sub_name."'";
          $result2 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Fourth = '3' and Subname = '".$sub_name."'";
          $result3 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Fourth = '2' and Subname = '".$sub_name."'";
          $result4 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Fourth = '1' and Subname = '".$sub_name."'";
          $result5 = mysqli_query($conn, $sql);   
          $i1=0;$i2=0;$i3=0;$i4=0;$i5=0;
        if($result)
        {
            $chart_data4[]=["Knowledge of the Subject"," Student %"];
           while($row=mysqli_fetch_array($result1))
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
  var options = {'title': '4.Punctuality of the Faculty:', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('drawchart4'));
  chart.draw(data, options);
}
    $(window).resize(function(){
        drawChart4();
        
    });
</script>
           
     <body>
      <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
            <hr>     
<div id="drawchart4" class="chart"></div>
          </div>
</body>        
         
        
        

      
            <?php
                 if(isset($_POST['submit']))
      {         
                  $sub_name = $_POST['Sub_Select'];
          $sql="select *  from feedback_data where Fifth = '5' and Subname = '".$sub_name."'";
          $result1 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Fifth = '4' and Subname = '".$sub_name."'";
          $result2 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Fifth = '3' and Subname = '".$sub_name."'";
          $result3 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Fifth = '2' and Subname = '".$sub_name."'";
          $result4 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Fifth = '1' and Subname = '".$sub_name."'";
          $result5 = mysqli_query($conn, $sql);   
          $i1=0;$i2=0;$i3=0;$i4=0;$i5=0;
        if($result)
        {
            $chart_data5[]=[""," Student %"];
           while($row=mysqli_fetch_array($result1))
        {         
               $i1++;               
        }
               $chart_data5[] = ["Excellent",$i1];
              while($row=mysqli_fetch_assoc($result2))
        {         
               $i2++;               
        }
               $chart_data5[] = ["Very Good",$i2];  
             while($row=mysqli_fetch_assoc($result3))
        {         
               $i3++;               
        }
               $chart_data5[] = ["Good",$i3]; 
              while($row=mysqli_fetch_assoc($result4))
        {         
               $i4++;               
        }
               $chart_data5[] = ["Satisfactory",$i4];  
               while($row=mysqli_fetch_assoc($result5))
        {         
               $i5++;               
        }
               $chart_data5[] = ["Non-Satisfactory",$i5];
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
google.charts.setOnLoadCallback(drawChart5);

// Draw the chart and set the chart values
function drawChart5() {
  var data = google.visualization.arrayToDataTable(/*[
  ['Task', 'Hours per Day'],
  ['Work', 1],
  ['Eat', 2],
  ['TV', 4],
  ['Gym', 2],
  ['Sleep', 8]
]*/<?php echo json_encode($chart_data5); ?>  );

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'5.Ability to Motivate Students:', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('drawchart5'));
  chart.draw(data, options);
}
    $(window).resize(function(){
        drawChart5();
        
    });
</script>
            
     <body><div class="col-md-4 col-sm-4 col-xs-12">
            
       
            <hr>
<div id="drawchart5" class="chart"></div>
 </div>
</body>         
                   
               
     
              
          
            <?php
                 if(isset($_POST['submit']))
      {         
                  $sub_name = $_POST['Sub_Select'];
          $sql="select *  from feedback_data where Sixth = '5' and Subname = '".$sub_name."'";
          $result1 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Sixth = '4' and Subname = '".$sub_name."'";
          $result2 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Sixth = '3' and Subname = '".$sub_name."'";
          $result3 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Sixth = '2' and Subname = '".$sub_name."'";
          $result4 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Sixth = '1' and Subname = '".$sub_name."'";
          $result5 = mysqli_query($conn, $sql);   
          $i1=0;$i2=0;$i3=0;$i4=0;$i5=0;
        if($result)
        {
            $chart_data6[]=[""," Student %"];
           while($row=mysqli_fetch_array($result1))
        {         
               $i1++;               
        }
               $chart_data6[] = ["Excellent",$i1];
              while($row=mysqli_fetch_assoc($result2))
        {         
               $i2++;               
        }
               $chart_data6[] = ["Very Good",$i2];  
             while($row=mysqli_fetch_assoc($result3))
        {         
               $i3++;               
        }
               $chart_data6[] = ["Good",$i3]; 
              while($row=mysqli_fetch_assoc($result4))
        {         
               $i4++;               
        }
               $chart_data6[] = ["Satisfactory",$i4];  
               while($row=mysqli_fetch_assoc($result5))
        {         
               $i5++;               
        }
               $chart_data6[] = ["Non-Satisfactory",$i5];
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
google.charts.setOnLoadCallback(drawChart6);

// Draw the chart and set the chart values
function drawChart6() {
  var data = google.visualization.arrayToDataTable(/*[
  ['Task', 'Hours per Day'],
  ['Work', 1],
  ['Eat', 2],
  ['TV', 4],
  ['Gym', 2],
  ['Sleep', 8]
]*/<?php echo json_encode($chart_data6); ?>  );

  // Optional; add a title and set the width and height of the chart
  var options = {'title':"6.Ability to Solve doubts:", 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('drawchart6'));
  chart.draw(data, options);
}
    $(window).resize(function(){
        drawChart6();
        
    });
</script>
            
     <body><div class="col-md-4 col-sm-4 col-xs-12">
            
       
            <hr>
<div id="drawchart6" class="chart"></div>
 </div>
</body>         
           </div></div>           
                
 
    
               
          
          
            <?php
                 if(isset($_POST['submit']))
      {         
                  $sub_name = $_POST['Sub_Select'];
          $sql="select *  from feedback_data where Seventh = '5' and Subname = '".$sub_name."'";
          $result1 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Seventh = '4' and Subname = '".$sub_name."'";
          $result2 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Seventh = '3' and Subname = '".$sub_name."'";
          $result3 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Seventh = '2' and Subname = '".$sub_name."'";
          $result4 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Seventh = '1' and Subname = '".$sub_name."'";
          $result5 = mysqli_query($conn, $sql);   
          $i1=0;$i2=0;$i3=0;$i4=0;$i5=0;
        if($result)
        {
            $chart_data7[]=["7.Ability to involve students into discussions:"," Student %"];
           while($row=mysqli_fetch_array($result1))
        {         
               $i1++;               
        }
               $chart_data7[] = ["Excellent",$i1];
              while($row=mysqli_fetch_assoc($result2))
        {         
               $i2++;               
        }
               $chart_data7[] = ["Very Good",$i2];  
             while($row=mysqli_fetch_assoc($result3))
        {         
               $i3++;               
        }
               $chart_data7[] = ["Good",$i3]; 
              while($row=mysqli_fetch_assoc($result4))
        {         
               $i4++;               
        }
               $chart_data7[] = ["Satisfactory",$i4];  
               while($row=mysqli_fetch_assoc($result5))
        {         
               $i5++;               
        }
               $chart_data7[] = ["Non-Satisfactory",$i5];
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
google.charts.setOnLoadCallback(drawChart7);

// Draw the chart and set the chart values
function drawChart7() {
  var data = google.visualization.arrayToDataTable(/*[
  ['Task', 'Hours per Day'],
  ['Work', 1],
  ['Eat', 2],
  ['TV', 4],
  ['Gym', 2],
  ['Sleep', 8]
]*/<?php echo json_encode($chart_data7); ?>  );

  // Optional; add a title and set the width and height of the chart
  var options = {'title': ' 7.Ability to involve students into discussions:', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('drawchart7'));
  chart.draw(data, options);
}
    $(window).resize(function(){
        drawChart7();
        
    });
</script>
           
     <body>
      <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-sm-4 col-xs-12">
            <hr>     
<div id="drawchart7" class="chart"></div>
          </div></div>
</body>        
         
                             
       
                                                                                                                                                                                                                     
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                           
                                                                                                                                                                                                                                                      
                                                                               
</div>
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