       <?php
$dbDatabase = "feed";

$dbServer = "localhost";

$dbUser = "root";

$dbPass = "";
$message="";
$conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');
     


if(isset($_POST["sem"]) && !empty($_POST["sem"])){
    //Get all teacher data
    
     $results=mysqli_query($conn,"SELECT * FROM subject WHERE Sem = ".$_POST['sem']."");
    //Count total number of rows
    $rowCount = $results->num_rows;
    
    //Display teachers list
    if($rowCount > 0){
        echo '<option value="">Select subject</option>';
        while($row = mysqli_fetch_assoc($results)){ 
            echo '<option value="'.$row['Subname'].'">'.$row['Subname'].'</option>';
        }
    }else{
        echo '<option value="">subject not available</option>';
    }
}
 
if(isset($_POST["Subname"]) && !empty($_POST["Subname"])){
    //Get all subject data
 $Subname = $_POST['Subname'];
     $results=mysqli_query($conn,"SELECT * FROM subject where Subname ='$Subname'");
    //Count total number of rows
    $rowCount = $results->num_rows;
    
    //Display cities list
    if($rowCount > 0){
       
        while($row = mysqli_fetch_assoc($results)){ 
            echo '<option value="'.$row['Subcode'].'">'.$row['Subcode'].'</option>';
        }
    }else{
        echo '<option value="">subcode not available</option>';
    }
}
?>
        
        
        