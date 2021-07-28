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
                 
                  <li class="active"><a href = "stafffeed.php">Staff Feedback</a></li>
                 
                     <li><a href = "amanage.php">Other Feedback</a></li>
                     
 

                   <li><a href = "alogout.php">Log out</a></li>
                 
              
              </ul>
          </div>
      </div>
       
   </div>    
   

                 <?php
$dbDatabase = "feed";

$dbServer = "localhost";

$dbUser = "root";

$dbPass = "";
$message="";
$conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');
     
?>
 <div class="container">
  <div class="row">
       <div class="col-md-4 col-sm-4 col-xs-12"></div>
       
   <div class="col-md-4 col-sm-4 col-xs-12">
           
            <div class="col-md-12 text-center">
                <fieldset>  <legend><h2>Staff Result</h2></legend> <p></p>
          <p></p></div>
               
      <form class="" form action="stafffeed.php" method="post">
        <div class="controls form-group">
        <label>Department</label> 
         
     <?php    
         
       
    $results=mysqli_query($conn, "SELECT * FROM operator");
    //Count total number of rows
    $rowCount =  $results->num_rows;
    ?>
    <select name="dept_select" id="dept" class="form-control" style="width:350px">
        <option value="">Select Department</option>
        <?php
        if($rowCount > 0){
            while($row = mysqli_fetch_assoc($results)){ 
                echo '<option value="'.$row['Dept'].'">'.$row['Dept'].'</option>';
            }
        }else{
            echo '<option value="">Department not available</option>';
        }
        ?>
    </select>
          </div>
  
   
  <div class="controls form-group">
      
            <label>Faculty</label>
            
            <select name="teacher_Select" id="teacher" class="form-control" style="width:350px">
                <option>Select Faculty</option>
            </select>
            </div>
        
                        
       <div class="controls form-group">
      
            <label>Subject</label>
            
            <select name="Sub_Select" id="subject"  class="form-control" style="width:350px" >
                <option>Select Subject</option>
            </select>
            </div>
                    
            <button type="submit" name="submit" class="btn btn-success btn-block" style="width:350px" >Submit</button></div>
          </div> </div></div>
  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
       <script type="text/javascript">
$(document).ready(function(){
    $('#dept').on('change',function(){
        var Dept = $(this).val();
        if(Dept){
            $.ajax({
                type:'POST',
               url:'ajax1.php',
                data:'Dept='+Dept,
                success:function(html){
                    $('#teacher').html(html);
                    $('#subject').html('<option value="">Select teacher first</option>'); 
                }
            }); 
        }else{
            $('#teacher').html('<option value="">Select Dept first</option>');
            $('#subject').html('<option value="">Select teacher first</option>'); 
        }
    });
    
    $('#teacher').on('change',function(){
        var Name = $(this).val();
        if(Name){
            $.ajax({
                type:'POST',
                url:'ajax1.php',
                data:'Name='+Name,
                success:function(html){
                    $('#subject').html(html);
                }
            }); 
        }else{
            $('#subject').html('<option value="">Select teacher first</option>'); 
        }
    });
});
</script>


 <?php
                 if(isset($_POST['submit']))
      {         
                     $result = mysqli_query($conn,"SELECT * FROM feedback_data");
                  $sub_name = $_POST['Sub_Select'];
                  $teacher = $_POST['teacher_Select'];
          $sql="select *  from feedback_data where First = '5' and upper(Subname) like '".$sub_name."'";
          $result1 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Second = '5' and upper(Subname) like '".$sub_name."'";
          $result2 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Third = '5' and upper(Subname) like '".$sub_name."'";
          $result3 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Fourth = '5' and upper(Subname) like '".$sub_name."'";
          $result4 = mysqli_query($conn, $sql);
          $sql="select * from feedback_data  where Fifth = '5' and upper(Subname) like '".$sub_name."'";
          $result5 = mysqli_query($conn, $sql); 
          $sql="select * from feedback_data  where Sixth = '5' and upper(Subname) like '".$sub_name."'";
          $result6 = mysqli_query($conn,$sql);
          $sql="select * from feedback_data  where Seventh = '5' and upper(Subname) like '".$sub_name."'";
          $result7 = mysqli_query($conn,$sql);
          $i1=0;$i2=0;$i3=0;$i4=0;$i5=0;$i6=0;$i7=0;
        if($result)
        {
            $chart_data[]=["Excellent Performance"," Student"];
           while($row=mysqli_fetch_array($result1))
        {         
               $i1++;               
        }
               $chart_data[] = ["Knowlege of\nthe Subject",$i1];
              while($row=mysqli_fetch_assoc($result2))
        {         
               $i2++;               
        }
               $chart_data[] = ["Behaviour\nof the Faculty",$i2];  
             while($row=mysqli_fetch_assoc($result3))
        {         
               $i3++;               
        }
               $chart_data[] = ["Use of\nTeaching Aids",$i3]; 
              while($row=mysqli_fetch_assoc($result4))
        {         
               $i4++;               
        }
               $chart_data[] = ["Punctuality",$i4];  
               while($row=mysqli_fetch_assoc($result5))
        {         
               $i5++;               
        }
               $chart_data[] = ["Motivating Skills",$i5];
               
               while($row=mysqli_fetch_assoc($result6))
        {         
               $i6++;               
        }
               $chart_data[] = ["Doubt\nSolving Skills",$i6];
               while($row=mysqli_fetch_assoc($result7))
        {         
               $i7++;               
        }
               $chart_data[] = ["Involving\ninto Discussions",$i7];
        }
               
         
      
      
            else
            {
                               echo "Fail".mysqli_error();   
                }
          
      }
                 
           
 ?>

<?php
if(isset($teacher))
{
    echo '<div class="container">';
 echo '<br><h2 class="tag-line2">Teacher Name:'.$teacher.'</h2>';
 echo '<h3 class="tag-line2">Subject Name:'.$sub_name.'</h3>';
 }
?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.arrayToDataTable(
            <?php echo json_encode($chart_data); ?>
          /*['Opening Move', 'Percentage'],
          ["King's pawn (e4)", 44],
          ["Queen's pawn (d4)", 31],
          ["Knight to King 3 (Nf3)", 12],
          ["Queen's bishop pawn (c4)", 10],
          ['Other', 3] */
        );

        var options = {
          title: 'Best Performance in:',
          width: 700,
          height: 350,
          legend: { position: 'none' },
          chart: { title: 'Best Performance in:',
                   subtitle: 'popularity by number of students' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              100: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
            
            
          },
          bar: { groupWidth: "90%"}
        };

        var chart = new google.charts.Bar(document.getElementById('drawchart'));
        chart.draw(data, options);
}
    $(window).resize(function(){
        drawChart();
        
    });
</script>
           
     <body>
      <div class="row">
           <div class="col-md-2 col-sm-12 col-xs-12"></div>
            <div class="col-md-4 col-sm-12 col-xs-12">
            <hr>     
<div id="drawchart" class="chart"></div>
          </div>
</body>        
         
        
         </hr>

</div></div>

        
        
        
        
        
        
       
       
       
       
       
       
       
       

       
   
   
     
    </body>
</html>


       
           

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