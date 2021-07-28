<?php
                      $dbDatabase = "feed";
                      $dbServer = "localhost";
                      $dbUser = "root";
                      $dbPass = "";
                      $message="";
                   
                      $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');

                      $Username=$_GET['Username'];
                     $result = mysqli_query($conn ,"Delete from staff where USERNAME='$Username'");
                   $row = mysqli_fetch_array($result);
if($result==TRUE)
{
   header("location:editstaff.php"); 
}

?>
