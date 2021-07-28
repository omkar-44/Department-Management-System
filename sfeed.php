<?php
session_start();
if ($_SESSION["Username"] == true) {
    echo "Welcome" . " " . $_SESSION["Name"];
} else {
    header('Location:student.php');
}
?>
<?php
$dbServer = "localhost";
$dbUser = "root";
$dbPass = "";
$url = "http://localhost/feedback/alogin.php";
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

                    <li><a href = "stlogin.php">Home</a></li>

                    <li  class = "active"><a href = "sfeed.php">Give Feedback</a></li>





                    <li><a href = "stlogout.php">Log out</a></li>


                </ul>
            </div>
        </div>

    </div>    


</body>
</html>
<form name="feedback_form" action="sfeed.php" method="post">

<?php
$sql = "SELECT Username from from feedback_data where Username='" . $_SESSION['Username'] . "'";
$result = mysqli_query($conn, $sql);
if ($result == TRUE) {
     echo '<script language = "javascript">
       document.getElementById("done123").click();
            </script>';
}
$sql = "SELECT Subname,Teacher from allosub where Dept='" . $_SESSION['Dept'] . "' and Sem ='" . $_SESSION['Sem'] . "'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
}
?>
    <?php
    mysqli_query($conn, "insert into counter values('1','" . $_SESSION['Username'] . "')");
    $trname[50] = ".";
    $sub[50] = ".";
    $Q1[50] = "";
    $Q2[50] = "";
    $Q3[50] = "";
    $Q4[50] = "";
    $Q5[50] = "";
    $Q6[50] = "";
    $Q7[50] = "";
    $cmnts[50] = "";
    $field1;
    $field2;
    $i = 0;
    $j = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $trname[$i] = $row['Teacher'];
        $sub[$i] = $row['Subname'];
        $i++;
    }

    $field1 = $trname[0];
    $field2 = $sub[0];
    $p = 0;
    ?>

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" id="pan1"><?php echo 'Teacher Name: ' . $field1 . ''; ?></div>
            <div class="panel panel-success" >
                <div class="panel-heading" id="pan2"><?php echo 'Subject Name: ' . $field2 . ''; ?></div>
            </div>
            <div class="panel-body">
                <form class="" form action="" method="post" >   
                    <div class="form-group"> 
                        <h4> 1.Knowledge of the Subject:</h4>
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
                        <h4> 2.Behavior of the Faculty:</h4>
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
                        <h4> 3.Use of Teaching Aids:</h4>

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
                        <h4> 4.Punctuality of the Faculty:</h4>
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

                    <div class="form-group">
                        <h4> 5.Ability to Motivate Students:</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="Q5" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="Q5">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="Q5">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="Q5">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="Q5">Non-Satisfactory</label>
                        </div>
                    </div>


                    <div class="form-group">
                        <h4> 6.Ability to Solve doubts:</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="Q6" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="Q6">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="Q6">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="Q6">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="Q6">Non-Satisfactory</label>
                        </div>
                    </div>




                    <div class="form-group">
                        <h4> 7.Ability to involve students into discussions:</h4>
                        <div class="form-control" width="350px">
                            <label class="radio-inline">
                                <input type="radio" value ="5" name="Q7" required>Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" value ="4" name="Q7">Very Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="3" name="Q7">Good</label>
                            <label class="radio-inline">
                                <input type="radio" value ="2" name="Q7">Satisfactory</label>
                            <label class="radio-inline">
                                <input type="radio" value ="1" name="Q7">Non-Satisfactory</label>
                        </div>
                    </div>

                    <h4>Comments/Compliments</h4>
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="5" name="comment"></textarea>
                    </div>
                    <br><br>
                    <ul class="pager">
                        <button name="next" id="abc" type="submit"  class="btn btn-primary btn-group-xsm ">Next</button> <br><br>
                        <li><a name="redir12" style ="visibility:hidden" id="done123" href = "feeddone.php"> </a></li>
                    </ul>

            </div> 
            <script>

</script>
<?php
if (isset($_POST['next'])) {
    $sql = "SELECT * FROM counter where Username = '" . $_SESSION['Username'] . "'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $j = $row['count'];
    }
    $p = $j - 1;
    $Q1[$p] = $_POST['Q1'];
    $Q2[$p] = $_POST['Q2'];
    $Q3[$p] = $_POST['Q3'];
    $Q4[$p] = $_POST['Q4'];
    $Q5[$p] = $_POST['Q5'];
    $Q6[$p] = $_POST['Q6'];
    $Q7[$p] = $_POST['Q7'];
    $cmnts[$p] = $_POST['comment'];
    $field1 = $trname[$j];
    $field2 = $sub[$j];
    echo '<script language="javascript">';
    echo 'document.getElementById("pan1").innerHTML = "Teacher Name: ' . $field1 . '";';
    echo 'document.getElementById("pan2").innerHTML = "Subject Name: ' . $field2 . '";';
    echo '</script>';
    $j++;
    mysqli_query($conn, "insert into temp_feed values('" . $_SESSION['Username'] . "','" . $sub[$p] . "','" . $Q1[$p] . "','" . $Q2[$p] . "','" . $Q3[$p] . "','" . $Q4[$p] . "','" . $Q5[$p] . "','" . $Q6[$p] . "','" . $Q7[$p] . "','" . $cmnts[$p] . "')");

    mysqli_query($conn, "update counter set count = count+1 ");
    if ($j == $i) {
        echo '<script language="javascript">';
        echo 'document.getElementById("abc").innerHTML = "Give Feedback";';
        echo 'document.getElementById("abc").name = "give_feedback";';
         echo 'document.getElementById("abc").className = "btn btn-success btn-group-xsm";';
        echo '</script>';
    }
}

if (isset($_POST['give_feedback'])) {
    $sql = "SELECT * FROM counter where Username = '" . $_SESSION['Username'] . "'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $j = $row['count'];
    }
    $p = $j - 1;
    $Q1[$p] = $_POST['Q1'];
    $Q2[$p] = $_POST['Q2'];
    $Q3[$p] = $_POST['Q3'];
    $Q4[$p] = $_POST['Q4'];
    $Q5[$p] = $_POST['Q5'];
    $Q6[$p] = $_POST['Q6'];
    $Q7[$p] = $_POST['Q7'];
    $cmnts[$p] = $_POST['comment'];
    mysqli_query($conn, "insert into temp_feed values('" . $_SESSION['Username'] . "','" . $sub[$p] . "','" . $Q1[$p] . "','" . $Q2[$p] . "','" . $Q3[$p] . "','" . $Q4[$p] . "','" . $Q5[$p] . "','" . $Q6[$p] . "','" . $Q7[$p] . "','" . $cmnts[$p] . "')");
    mysqli_query($conn, "delete from counter where Username = '" . $_SESSION['Username'] . "'");
    $result = mysqli_query($conn, "select * from temp_feed where Username ='" . $_SESSION['Username'] . "'");
    while ($row = mysqli_fetch_assoc($result)) {
        mysqli_query($conn, "insert into feedback_data values('" . $_SESSION['Username'] . "','" . $row['Subname'] . "','" . $row['First'] . "','" . $row['Second'] . "','" . $row['Third'] . "','" . $row['Fourth'] . "','" . $row['Fifth'] . "','" . $row['Sixth'] . "','" . $row['Seventh'] . "','" . $row['Eighth'] . "')");
        mysqli_query($conn, "delete from temp_feed where Username = '" . $_SESSION['Username'] . "'");
    }
    echo '<script language = "javascript">
       document.getElementById("done123").click();
            </script>';
    mysqli_query($conn,"delete from student where Username = '".$_SESSION['Username']."'");
    session_destroy();
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