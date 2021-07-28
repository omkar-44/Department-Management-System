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
                  <li class = "active" class="dropdown">
                  <a href ="#" class="dropdown-toggle" data-toggle="dropdown">Student<b class="caret"></b></a> 
                   <ul class="dropdown-menu">
                   
                         <li><a href = "excelstu.php">Add Through Excel Sheet</a></li>
                         <li class = "active"><a href = "addstu.php">Add Manually</a></li>
                         <li><a href = "editstu.php">Edit Details</a></li>
                     </ul>
                                     
                   
                  <li class = "dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Subject<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                         
                         <li><a href = "allosub.php">Alloacte subject</a></li>
                         <li><a href = "editsub.php">Edit Details</a></li>
                         <li><a href = "addsub.php">Add subject</a></li>
                     </ul>
                                   
                   <li><a href = "ologout.php">Log out</a></li>
                 
              </ul>
              
          </div>
      </div>
       
   </div>    
   
   
</body>
</html>

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
  <form action ="" method="post">
    <?php
        $dbServer = "localhost";
              $dbUser = "root";
              $dbPass = "";
              $dbDatabase = "feed";
                $msg='';
              $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect'); 
              $sql;
               if(isset($_POST['submit']))
               {
                    
                    $name = $_POST['name'];
                    $dept = $_POST['Dept_Select'];
                   
                    $sem =  $_POST['sem'];
                    
                    $enroll = $_POST['enrollment'];
                    $sql = "select ENROLLMENT from student where ENROLLMENT = '".$enroll."'";
                    if(mysqli_affected_rows($conn)>0||strlen($enroll)<10)
                    {
                    if(mysqli_affected_rows($conn)>0)
                    {
                        echo '<script language="javascript">';
                        echo 'alert("Enrollment already exists!");';
                        echo '</script>';
                    }
                    if(strlen($enroll)<10)
                    {
                        echo '<script language="javascript">';
                        echo 'alert("Enrollment number is of 10 Digits!");';
                        echo '</script>';
                    }
                  
                    }
                    else
                    {
                        $length = 8;
                         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                         $charactersLength = strlen($characters);
                         $pass= '';
                          for ($i = 0; $i < $length; $i++) {
                           $pass .= $characters[rand(0, $charactersLength - 1)];
    }
                        $sql = "insert into student values('".$name."','".$dept."','".$sem."','".$enroll."','".$pass."')";
                        mysqli_query($conn, $sql);
                $msg='Data inserted successfully';
                    }
               
                    
               }
    
    
    ?>
                  
<div class="container-fluid">
   <div class="row">
   <div class="col-md-4 col-sm-6 col-xs-6"></div>
    <div class="col-md-4 col-sm-6 col-xs-6">
                   <!---form start-->
<form class="" form action="" method="post" >
             
               
        <?php 
                 if(!empty($msg)) 
                  { ?> <div class="alert alert-success alert-dismissible fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                <?php   echo $msg; ?> </div><?php } ?>
                
                  
            <div class="col-md-12 text-center">
      <fieldset>  <legend><h2>ADD STUDENTS<h2></legend> <p></p>
          <p></p></div>
               
                  
                   
                    <div class="form-group">

         <label  name="Name" for="Name">Name</label><label>*:</label>
     <input id="1" type="text" class="form-control"  name="name" placeholder="Student Name" required>
                    </div>
                   <div class="controls form-group">
	    <label id="4" name="Dept"  class="">Department</label><label>*:</label>
            
            
 <?php
         
         $sql = "SELECT Dept FROM operator where Dept= '".$_SESSION['Dept']."'";
                     $result = mysqli_query($conn, $sql);
?>
           <select class="form-control" name ="Dept_Select" style="width:350px" >
  <?php     
       
            while($row = mysqli_fetch_assoc($result)) {
       
         echo '<option value="'.$row['Dept'].'">'.$row['Dept'].'</option>';
}?>

</select>
                     </div>
                 
                    <div class="form-group">

                
     <label  name="Sem" for="Name">Semester</label><label>*:</label>
       <select id="5" name="sem" style="width:300px" class="form-control" required>
                <option value="" selected disabled>Select Semester</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
       </select></div>
        <div class="form-group">

         <label  name="Enrollment" for="Enrollment">Enrollment No.</label><label>*:</label>
     <input id="6" type="number" class="form-control" name="enrollment" placeholder="Student's Enrollment Number" required>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-12">  </div>
                              
                               <div class="col-md-8 col-sm-4 col-xs-12">       
                                   <button type="submit" class="btn btn-success btn-block" name="submit"  >Submit</button></div>
           </div>
    </div>
    </div>
    <br><br>
        </form>
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