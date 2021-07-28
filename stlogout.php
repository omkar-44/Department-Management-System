<?php
session_start();
$dbServer= "localhost";
if($_SESSION["Username"]==true)
      {
echo "Welcome"." ".$_SESSION["Name"];
      }
                      $dbUser = "root";
                      $dbPass = "";
                      $url = "http://localhost/feedback/alogin.php";
                      $dbDatabase = "feed";
                       $conn = mysqli_connect( $dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');
                       mysqli_query($conn,"update counter set count='1' where Username ='".$_SESSION['Username']."'");
                       mysqli_query($conn,"delete from temp_feed where Username = '".$_SESSION['Username']."'");
session_destroy();
header("Location:student.php");

?>