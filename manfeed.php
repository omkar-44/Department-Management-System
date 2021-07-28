
<?php
$dbServer = "localhost";
$dbUser = "root";
$dbPass = "";
$dbDatabase = "feed";
$conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');
?>
<!doctype HTML>
<html>
    <head>
        <title>login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="css/student.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/FE3FBCD0-6F98-E44F-9D1C-BF4943172FB4/main.js" charset="UTF-8"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

                    <li><a href = "stlogin.php">Home</a></li>

                    <li  class = "active"><a href = "manfeed.php">Give Feedback</a></li>





                    <li><a href = "stlogout.php">Log out</a></li>


                </ul>
            </div>
        </div>

    </div>    

<?php
session_start();
if ($_SESSION["Username"] == true) {
 echo "<center>Hello"." ".$_SESSION["Name"]." "."</center>";
} else {
    header('Location:student.php');
}
?>


<form name="feedback_form" action="manfeed.php" method="post">
<?php
$lab_assistant = "lab";
$result = mysqli_query($conn,"SELECT * from management_data where Username ='".$_SESSION['Username']."'");$i=0;
while($row = mysqli_fetch_array($result))
{
    $i++;
}
if($i>0)
{
    echo 'amey';
    header('location:sfeed.php');
    
}
else
{
$result = mysqli_query($conn,"SELECT Username from operator where Dept=(Select Dept from student where Username='".$_SESSION['Username']."')");
while($row = mysqli_fetch_assoc($result))
{
    $lab_assistant = $row['Username'];
            
}
}
?>
    
    <div class="container">
    <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Office</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
                <form class="" form action="" method="post" >   
                    <div class="form-group"> 
                        <h4> 1.Behavior of the Staff:</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="Q1" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="Q1">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="Q1">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="Q1">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="Q1">Non-Satisfactory</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <h4> 2.Availability of the office</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="Q2" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="Q2">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="Q2">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="Q2">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="Q2">Non-Satisfactory</label>
                        </div>
                    </div>     

                    <div class="form-group">     
                        <h4> 3.Speed of Resolving Any Issue</h4>

                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="Q3" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="Q3">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="Q3">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="Q3">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="Q3">Non-Satisfactory</label>
                        </div>
                    </div>
                    <div class="form-group">     
                        <h4> 4.Overall Experience</h4>

                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="Q4" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="Q4">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="Q4">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="Q4">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="Q4">Non-Satisfactory</label>
                        </div>
                    </div>
                    <br><br>
                    </div>
                 </div> 
                    </div>
   <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Library</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
                <form class="" form action="" method="post" >   
                    <div class="form-group"> 
                        <h4> 1.Behavior of the Staff:</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="J1" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="J1">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="J1">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="J1">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="J1">Non-Satisfactory</label>
                        </div>
                    </div>
              
     
                    <div class="form-group">
                        <h4> 2.Availability of the Books</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="J2" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="J2">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="J2">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="J2">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="J2">Non-Satisfactory</label>
                        </div>
                    </div>     

                    <div class="form-group">     
                        <h4> 3.Knowledge of staff</h4>

                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="J3" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="J3">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="J3">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="J3">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="J3">Non-Satisfactory</label>
                        </div>
                    </div>
                    <div class="form-group">     
                        <h4> 4.Overall Experience</h4>

                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="J4" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="J4">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="J4">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="J4">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="J4">Non-Satisfactory</label>
                        </div>
                    </div>
                    <br><br>
                </div> 
                 </div></div>
                <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Canteen</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
                <form class="" form action="" method="post" >   
                    <div class="form-group"> 
                        <h4> 1.Behavior of the Staff:</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="T1" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="T1">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="T1">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="T1">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="T1">Non-Satisfactory</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4> 2.Quality of food</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="T2" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="T2">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="T2">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="T2">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="T2">Non-Satisfactory</label>
                        </div>
                    </div>     

                    <div class="form-group">     
                        <h4> 3.Level of Hygiene</h4>

                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="T3" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="T3">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="T3">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="T3">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="T3">Non-Satisfactory</label>
                        </div>
                    </div>
                    <div class="form-group">     
                        <h4> 4.Overall Experience</h4>

                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="T4" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="T4">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="T4">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="T4">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="T4">Non-Satisfactory</label>
                          </div>
                    </div>
                    <br><br>
                    </div>
                 </div> 
                    </div>
                <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Toilet</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
                <form class="" form action="" method="post" >   
                    <div class="form-group"> 
                        <h4> 1.Level of Hygiene</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="G1" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="G1">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="G1">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="G1">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="G1">Non-Satisfactory</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4> 2.Maintainance</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="G2" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="G2">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="G2">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="G2">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="G2">Non-Satisfactory</label>
                        </div>
                    </div>     

                    <div class="form-group">     
                        <h4> 3.Availability of Water</h4>

                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="G3" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="G3">Very Good</label>
                            <label class="radio-inline"
                                <input type="radio" value ="3" name="G3">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="G3">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="G3">Non-Satisfactory</label>
                        </div>
                    </div>
                    <div class="form-group">     
                        <h4> 4.Overall Experience</h4>

                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="G4" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="G4">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="G4">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="G4">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="G4">Non-Satisfactory</label>
                           </div>
                    </div>
                    <br><br>
                    </div>
                 </div> 
                    </div>
         <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Medical Rooms</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">
                <form class="" form action="" method="post" >   
                    <div class="form-group"> 
                        <h4> 1.Availability of Beds</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="M1" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="M1">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="M1">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="M1">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="M1">Non-Satisfactory</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4> 2.Level of Hospitality</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="M2" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="M2">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="M2">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="M2">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="M2">Non-Satisfactory</label>
                        </div>
                    </div>     

                    <div class="form-group">     
                        <h4> 3.Availability of First-Aid Box</h4>

                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="M3" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="M3">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="M3">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="M3">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="M3">Non-Satisfactory</label>
                        </div>
                    </div>
                    <div class="form-group">     
                        <h4> 4.Overall Experience</h4>

                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="M4" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="M4">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="M4">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="M4">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="M4">Non-Satisfactory</label>
                       </div>
                    </div>
                    <br><br>
                    </div>
                 </div> 
                    </div>
                 <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Lab Assistant:<?php echo " ".$lab_assistant; ?></a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">
                <form class="" form action="" method="post" >   
                    <div class="form-group"> 
                        <h4> 1.Behavior of the Staff:</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="L1" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="L1">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="L1">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="L1">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="L1">Non-Satisfactory</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4> 2.Knowledge of the Lab Apparatus</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="L2" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="L2">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="L2">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="L2">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="L2">Non-Satisfactory</label>
                        </div>
                    </div>     

                    <div class="form-group">     
                        <h4> 3.Ability to Solve Issues</h4>

                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="L3" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="L3">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="L3">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="L3">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="L3">Non-Satisfactory</label>
                        </div>
                    </div>
                    <div class="form-group">     
                        <h4> 4.Punctuality of Staff</h4>

                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="L4" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="L4">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="L4">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="L4">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="L4">Non-Satisfactory</label>
                       </div>
                    </div>
                    <br><br>
                    </div></div></div></div></div> 
                              <div class="col-md-4 col-sm-4 col-xs-12">  </div>
                              
                               <div class="col-md-4 col-sm-4 col-xs-12"> 
                     <ul class="pager">
                        <button name="next" id="abc" type="submit"  class="btn btn-success btn-block">Next</button> <br><br>
                        <li><a name="redir12" style ="visibility:hidden" id="done123" href = "sfeed.php"> </a></li>
                    </ul>
                </div>
                <?php
               if (isset($_POST['next']))
                {                
                   $Q1 = $_POST['Q1'];
                   $Q2 = $_POST['Q2'];
                   $Q3 = $_POST['Q3'];
                   $Q4 = $_POST['Q4'];
                   $J1 = $_POST['J1'];
                   $J2 = $_POST['J2'];
                   $J3 = $_POST['J3'];
                   $J4 = $_POST['J4'];
                   $T1 = $_POST['T1'];
                   $T2 = $_POST['T2'];
                   $T3 = $_POST['T3'];
                   $T4 = $_POST['T4'];
                   $T1 = $_POST['T1'];
                   $G1 = $_POST['G1'];
                   $G2 = $_POST['G2'];
                   $G3 = $_POST['G3'];
                   $G4 = $_POST['G4'];
                   $M1 = $_POST['M1'];
                   $M2 = $_POST['M2'];
                   $M3 = $_POST['M3'];
                   $M4 = $_POST['M4'];
                   $L1 = $_POST['L1'];
                   $L2 = $_POST['L2'];
                   $L3 = $_POST['L3'];
                   $L4 = $_POST['L4'];
                   mysqli_query($conn,"insert into management_data values('".$_SESSION['Username']."','Office','".$Q1."','".$Q2."','".$Q3."','".$Q4."')");
                   mysqli_query($conn,"insert into management_data values('".$_SESSION['Username']."','Library','".$J1."','".$J2."','".$J3."','".$J4."')");
                   mysqli_query($conn,"insert into management_data values('".$_SESSION['Username']."','Canteen','".$T1."','".$T2."','".$T3."','".$T4."')");
                   mysqli_query($conn,"insert into management_data values('".$_SESSION['Username']."','Toilet','".$G1."','".$G2."','".$G3."','".$G4."')");
                   mysqli_query($conn,"insert into management_data values('".$_SESSION['Username']."','Medical Room','".$M1."','".$M2."','".$M3."','".$M4."')");
                   mysqli_query($conn,"insert into management_data values('".$_SESSION['Username']."','".$lab_assistant."','".$Q1."','".$Q2."','".$Q3."','".$Q4."')");
                   echo '<script language = "javascript">
                 document.getElementById("done123").click();
                  </script>';
                }
?>
    


            </script>
            </form> 
        </div>
    </div>

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