       <?php
$dbDatabase = "feed";

$dbServer = "localhost";

$dbUser = "root";

$dbPass = "";
$message="";
$conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');
     


if(isset($_POST["Dept"]) && !empty($_POST["Dept"])){
    //Get all teacher data
     $Department = $_POST['Dept'];
     $results=mysqli_query($conn,"SELECT * FROM staff WHERE DEPARTMENT = '$Department'");
    //Count total number of rows
    $rowCount = $results->num_rows;
    
    //Display teachers list
    if($rowCount > 0){
        echo '<option value="">Select teacher</option>';
        while($row = mysqli_fetch_assoc($results)){ 
            echo '<option value="'.$row['Name'].'">'.$row['Name'].'</option>';
        }
    }else{
        echo '<option value="">teacher not available</option>';
    }
}
 
if(isset($_POST["Name"]) && !empty($_POST["Name"])){
    //Get all subject data
  $Subname = $_POST['Name'];
     $results=mysqli_query($conn,"SELECT * FROM allosub WHERE Teacher = '$Subname'");
    //Count total number of rows
    $rowCount = $results->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select subject</option>';
        while($row = mysqli_fetch_assoc($results)){ 
            echo '<option value="'.$row['Subname'].'">'.$row['Subname'].'</option>';
        }
    }else{
        echo '<option value="">subject not available</option>';
    }
}
?>
        
        
        