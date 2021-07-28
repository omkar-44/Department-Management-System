<?php
                      $dbDatabase = "feed";
                      $dbServer = "localhost";
                      $dbUser = "root";
                      $dbPass = "";
                      $message="";
                   
                      $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');

                      $Subname=$_GET['Subname'];
                     $result = mysqli_query($conn ,"Delete from allosub where Subname='$Subname'");
                   $row = mysqli_fetch_array($result);
if($result==TRUE)
{
   header("location:editstu.php"); 
}

?>
