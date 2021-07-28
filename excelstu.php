
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
                   
                         <li class = "active"><a href = "excelstu.php">Add Through Excel Sheet</a></li>
                         <li><a href = "addstu.php">Add Manually</a></li>
                         <li><a href = "editstu.php">Edit Details</a></li>
                     </ul>
                                     
                   
                  <li class = "dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Subject<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                        
                         <li><a href = "allosub.php">Allocate subject</a></li>
                         <li><a href = "editsub.php">Edit Details</a></li>
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
             
                <div class="col-md-3 hidden-phone">
                    
                </div>
                <div class="col-md-6" id="form-login">
                    <form class="well" action="" method="post" name="upload_excel" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Import CSV/Excel file</legend>
                            <div class="control-group">
                                <div class="control-label">
                                    <label>CSV/Excel File:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="file" name="file" id="file" class="input-large form-control">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                <button type="submit" id="submit" name="Import" class="btn btn-success btn-flat btn-lg pull-right button-loading" data-loading-text="Loading...">Upload</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-3 hidden-phone"></div>
            </div>
            
    
            <table class="table table-bordered">
                <thead>
                        <tr>
                        <th>Name</th>
                     <th>Department</th>
                     
                    <th>Sem</th>
                       <th>Username</th>
                       <th>Password</th>
                        </tr> 
                      </thead>
                   <?php
                $dbDatabase = "feed";

                $dbServer = "localhost";

                $dbUser = "root";

                $dbPass = "";
                $message="";
                $con = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');


                 $sql = "select Name,Dept,Sem,Username,Password from student  where Dept= '".$_SESSION['Dept']."'";
               $result = mysqli_query($con, $sql);
        while( $row = mysqli_fetch_array($result) )
                    {
                    ?>
                        <tr>
                        <td><?php echo $row["Name"]; ?></td>
                        <td><?php echo $row["Dept"]; ?></td>
                       
                        <td><?php echo $row["Sem"]; ?></td>
                        <td><?php echo $row["Username"]; ?></td>
                        <td><?php echo $row["Password"]; ?></td>
                        </tr>
                    <?php
                    }
                ?>
            </table>
        </div>
        
        
        <?php
$dbDatabase = "feed";

$dbServer = "localhost";

$dbUser = "root";

$dbPass = "";
$message="";
$con = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');


if(isset($_POST["Import"])){
                          $length = 8;
                         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                         $charactersLength = strlen($characters);
                         $pass= '';
                          for ($i = 0; $i < $length; $i++) {
                           $pass .= $characters[rand(0, $charactersLength - 1)];
                          }
$file = $_FILES['file']['tmp_name'];
    
 if ($_FILES["file"]["size"] > 0)
 {
$handle = fopen($file, "r");
$c = 0;
while(($data = fgetcsv($handle, 1000, ",")) !== false)
{

$sql = "insert into student(Name,Dept,Sem,Username,Password) values ( '$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";
$stmt = mysqli_prepare($con,$sql);
mysqli_stmt_execute($stmt);
$c = $c + 1;

}
if(! $stmt )
{
echo "<script type=\"text/javascript\">
alert(\"Invalid File:Please Upload CSV File.\");
window.location = \"excelstu.php\"
</script>";
}

fclose($file);
//throws a message if data successfully imported to mysql database from excel file
echo "<script type=\"text/javascript\">
alert(\" CSV File has been successfully Imported $c rows has been added..\");
window.location = \"excelstu.php\"
</script>";
//close of connection
mysql_close($con); 
 }

        else {
       
            echo "<script type=\"text/javascript\">
alert(\" Ohh Snap.....! You just hitten the submit button without selecting file.\");

</script>";
    }
}
?> 


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
    <?php

