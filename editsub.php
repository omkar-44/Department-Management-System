<?php
                      $dbDatabase = "feed";
                      $dbServer = "localhost";
                      $dbUser = "root";
                      $dbPass = "";
                      $message="";
                      $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');
                      
                    
                     ?>

<!doctype HTML>
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
                  
                  <li><a href = "ologin.php">Home</a></li>
                   <li><a href = "editstaff.php">Edit staff</a></li>
                  <li class="dropdown">
                  <a href ="#" class="dropdown-toggle" data-toggle="dropdown">Student<b class="caret"></b></a> 
                   <ul class="dropdown-menu">
                   
                         <li><a href = "excelstu.php">Add Through Excel Sheet</a></li>
                         <li><a href = "addstu.php">Add Manually</a></li>
                         <li><a href = "editstu.php">Edit Details</a></li>
                     </ul>
                                     
                   
                  <li  class = "active" class = "dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Subject<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                         
                         <li><a href = "allosub.php">Allocate subject</a></li>
                         <li class = "active"><a href = "editsub.php">Edit Details</a></li>
                         <li><a href = "addsub.php">Add subject</a></li>
                     </ul>
                                   
                   <li><a href = "ologout.php">Log out</a></li>
                 
              </ul>
              
          </div>
      </div>
       
   </div>    
         <?php
session_start();
      if($_SESSION["Username"]==true)
      {
echo "<center>Hello"." ".$_SESSION["Username"]." "."Sir</center>";
      }
      else
      {
          header('location:operator.php');
      }
      ?>
   
   
   <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-12"></div>
            
            <div class="col-md-6 col-sm-4 col-xs-12">
       


   <form class="" form action="editsub.php" method="post">
       <div class="col-md-12 text-center">
           <legend><h2>Manage Subjects</h2></legend> <p></p>
          <p></p></div>
   
            
              </div>
          
    <?php
     
          $sub_name = filter_input(INPUT_POST,'Staff_Select');
               $sql = "SELECT * from allosub where Dept= '".$_SESSION['Dept']."'";
               $result = mysqli_query($conn, $sql);
              ?>
                <div class="form-group"> 
                 <input class="form-control" id="input" type="text" placeholder="Search..">
          <br></div>
                 <table class="table table-bordered">
                    <thead>
                     <tr>
                     <th>Sub code</th>
                     <th>Subject name</th>
                         <th>Department</th>
                     <th>Semester</th>
                     <th>Scheme</th>
                         <th>Teacher</th>
                     <th>  &nbsp;Delete &nbsp; </th> 
                     </tr>
                     </thead>
                      <tbody id="myTable">
                     <script>
$(document).ready(function(){
  $("#input").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
                     <?php
                if(mysqli_num_rows($result)===0){
        echo '<tr><td colspan="7">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc($result) ){
          ?> <tr>    
          <td><?php echo $row["Subcode"]; ?></td> 
<td><?php echo $row["Subname"]; ?></td>
<td><?php echo $row["Dept"]; ?></td>
<td><?php echo $row["Sem"]; ?></td>
<td><?php echo $row["Scheme"]; ?></td>
      <td><?php echo $row["Teacher"]; ?></td>
        <td>
       <a onclick="return confirm('Are you sure you want to delete the entry..?')" href="deletesub.php?Username=<?php echo $row['Subname']; ?>"class="btn btn-danger">Delete</a></td>
 
 
       </tr>
        <?php
        }
      }
      
      
   
         
      
?>
</table>
    </tbody>

    
           
                     </form> </div></div></div>
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