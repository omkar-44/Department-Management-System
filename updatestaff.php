<!doctype HTML>
<html>
    <head>
        <title>login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/operator.css" type="text/css" rel="stylesheet">
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
                   <li class = "active"><a href = "editstaff.php">Edit staff</a></li>
                  <li class="dropdown">
                  <a href ="#" class="dropdown-toggle" data-toggle="dropdown">Student<b class="caret"></b></a> 
                   <ul class="dropdown-menu">
                   
                         <li><a href = "excelstu.php">Add Through Excel Sheet</a></li>
                         <li><a href ="addstu.php" >Add Manually</a></li>
                         <li><a href ="editstu.php">Edit Details</a></li>
                     </ul>
                                     
                   
                       
                  <li class = "dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Subject<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                         <li><a href = "#">Add Through Excel Sheet</a></li>
                         <li><a href = "allosub.php">Add Manually</a></li>
                         <li><a href = "editsub.php">Edit Details</a></li>
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
    <br>

<?php

$dbDatabase = "feed";

$dbServer = "localhost";

$dbUser = "root";

$dbPass = "";
$msg='';
 $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');
$msg="";
 $nameErr = $emailError = $mobileError ="";
$name = $email = $number = "";
if(count($_POST)>0) 
{ 
    $mobile = test_input($_POST["number"]);   
   $email =test_input($_POST['email']);

if(((!filter_var($email, FILTER_VALIDATE_EMAIL)))||(mysqli_affected_rows($conn)>0)||(!preg_match('/^[0-9]{10}+$/', $mobile)))
{
   
      
// check if name only contains letters and whitespace
if (!preg_match('/^[0-9]{10}+$/', $mobile)) {
$mobileError = "10 digit Number"; 
}
   
      
// check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$emailError = "Invalid email format"; 
}
       
   if(mysqli_affected_rows($conn)>0)
   {
    echo '<script language="javascript">';
    echo 'alert("Username already exists!");';
    echo '</script>';
   }

  
        
     
}else{
   mysqli_query($conn,"UPDATE staff set Name='" . $_POST['Name'] . "',USERNAME='" . $_POST['Username'] . "', 
              DEPARTMENT='" . $_POST['Dept_Select'] . "', GENDER='" . $_POST['gender'] . "', EMAIL_ID='" . $_POST['email'] . "' ,PHONE_NUMBER='" . $_POST['number'] . "' WHERE USERNAME='" . $_POST['Username']  . "'");
                 $msg = "Record Modified Successfully";



}
}
    
    function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}




?>









<html>
<head>
<title>Update Employee Data</title>
</head>
<body>
      <div class="container"><?php
          
$query="SELECT * FROM staff WHERE USERNAME='" . $_GET['Username'] . "'";
    
$result = mysqli_query($conn,$query);

$row= mysqli_fetch_array($result);
 ?>
          <div class="row">
 <div class="col-md-12 text-center">
<legend>Update Staff Detail:</legend>
               </div>
     <div class="col-md-4 col-sm-6 col-xs-12"></div>
     <div class="col-md-4 col-sm-6 col-xs-12">
     <?php
   if(!empty($msg)) 
                  { ?> <div class="alert alert-success alert-dismissible fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                <?php   echo $msg; ?> </div><?php } ?>
                
        <form name="frmUser" method="post" action="">
<div>
</div> 

 
  <div class="form-group">
 <label for="Username">Username</label>

<input type="text" class="form-control" name="Username" placeholder="Your name.." value="<?php echo $row['USERNAME']; ?>" readonly>

    </div>   <div class="form-group">
 <label for="Name">Name</label>

<input type="text" class="form-control" name="Name" placeholder="Your name.." value="<?php echo $row['Name']; ?>" required >

    </div>  
            <div class="controls form-group">
                <label name="Dept" >Department</label>
         <select class="form-control" name ="Dept_Select" style="width:350px">
<?php echo '<option value="'.$row['DEPARTMENT'].'">'.$row['DEPARTMENT'].'</option>'; ?>"

</select>
                     </div>
                 

    
    
    
    
    
    
    
    
 <div class="form-group" required>
                                 
                                  <label for="gender">Gender</label>
                               <br>
                              
                    <input type="radio" value="Male" name="gender"  <?=$row['GENDER']=="Male" ? "checked" : ""?> value="Male">
                    <label>Male</label>
                    <input type="radio" value="Female" name="gender" <?=$row['GENDER']=="Female" ? "checked" : ""?> value="Female">
                    <label for="">Female</label>
                                   


    </div>  
   
    <div class="form-group">
 <label for="email">Email</label>

<input type="text" class="form-control" name="email" placeholder="Email.." value="<?php echo $row['EMAIL_ID']; ?>" required >
<div class="error"><?php echo $emailError ;?></div>
    </div> 

                            <div class="form-group">
   
    <label for="phone no">Phone No</label>
    <input type="number" class="form-control" name="number" placeholder="Phone no.." value="<?php echo $row['PHONE_NUMBER']; ?>" required>
   <div class="error"><?php echo $mobileError;?></div>
            </div>       
                              
          
         
      
                                   <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button></div></div>
    
     </form>    </div>  </div></div>
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