<!doctype HTML>
<html>
    <head>
        <title>login</title>
        <meta charset="utf-8">
        <!-- disallow browser cache -->
<meta HTTP-EQUIV="Pragma" content="no-cache">
<meta HTTP-EQUIV="Expires" content="-1" >

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
                  <li><a href = "editstaff.php">Edit Staff</a></li>
                  <li class = "dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Student<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                         <li><a href = "excelstu.php">Add Through Excel Sheet</a></li>
                         <li><a href = "addstu.php">Add Manually</a></li>
                         <li><a href = "editstu.php">Edit Details</a></li>
                     </ul>
                    
                    <li  class = "active" class = "dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Subject<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                        
                         <li class = "active"><a href = "allosub.php">Allocate subject</a></li>
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
   
 


            <?php
             $servername = "localhost";
              $username = "root";
              $password = "";
              $db_name = "feed";
              $conn = new mysqli($servername,$username,$password,$db_name);  
              $sql;
   if(isset($_POST['submit']))
   {
                  $subname =$_POST['Subname_Select'];
                 $subcode =$_POST['Subcode_Select'];
               $scheme = $_POST['scheme'];
               $dept = $_POST['Dept_Select'];
               $sem =$_POST['sem'];

               $teacher =$_POST['Staff_Select'];
               
            
               $sql = "select Subcode from allosub where subcode='".$subcode."' AND Teacher='.$teacher.'";
               $result = mysqli_query($conn, $sql);
               if(mysqli_affected_rows($conn)>0)
               {
                 
                   $msg = "Subject has been already allocated!!";
               }
               else
               {
                    $sql = "insert into allosub values('".$subcode."','".$subname."','".$teacher."','".$scheme."','".$dept."','".$sem."')";
                    mysqli_query($conn, $sql);
                   
                     $msg = "Subject allocated Successfully!";
                
               }
   }
               
            ?>
            <div class="container">
   <div class="row">
      <div class="col-md-12 text-center">
               <fieldset>  <legend><h2>Manage Subjects</h2></legend> <p></p>
          <p></p></div>
       <div class="col-md-4 col-sm-4 col-xs-12"></div>
        
   <div class="col-md-4 col-sm-4 col-xs-12">
     

                  
                   
                   <?php
                    if(!empty($msg)) 
                  { ?> <div class="alert alert-success alert-dismissible fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                <?php   echo $msg; ?> </div><?php } ?>
       <form action="" method="post">
   
                    
                   
            
        
                    
                     <div class="controls form-group">
	   
             <label>Department</label>
 <?php
         
         $sql = "SELECT Dept FROM operator where Dept= '".$_SESSION['Dept']."'";
                     $result = mysqli_query($conn, $sql);
?>
           <select id="2" name="Dept_Select" style="width:350px" class="form-control" required>
  <?php     
       
            while($row = mysqli_fetch_assoc($result)) {
       
         echo '<option value="'.$row['Dept'].'">'.$row['Dept'].'</option>';
}?>

</select>
                     </div>

                           		   
                                                 
       <div class="controls form-group">
	    <label id="4" name="teacher"  class="">Faculty</label><label>*:</label>
                 
 <?php
         
         $sql = "SELECT Name FROM staff where DEPARTMENT= '".$_SESSION['Dept']."'";
                     $result = mysqli_query($conn, $sql);
?>
           <select name ="Staff_Select" class="form-control" style="width:350px" >
    
           <option value="" selected disabled>Select Staff</option>;
         <?php    
             
                           while($row = mysqli_fetch_assoc($result)) {
       
         echo '<option value="'.$row['Name'].'">'.$row['Name'].'</option>';
}
                           ?>


</select>
                 </div>    
           
                        
      
                                                <div class="form-group">

                
     <label  name="Scheme" for="Name">Scheme</label><label>*:</label>
       <select id="6" name="scheme" style="width:350px" class="form-control" required>
           
                <option value="" selected disabled>Select Scheme</option>
              <option value="A">A</option>
              <option value="C">C</option>
              <option value="G">G</option>
              <option value="H">H</option>
              <option value="I">I</option>
       </select></div>       
                                                       
       <div class="controls form-group">
	    <label id="" name="sem"  class="">Semester</label><label>*:</label>
                 
 <?php
         
         $sql = "SELECT * FROM semester";
                     $result = mysqli_query($conn, $sql);
            $rowCount =  $result->num_rows;
?>
           <select name ="sem" id="sem" class="form-control" style="width:350px" >
    
           <option value="">Select Sem</option>;
     
        <?php
        if($rowCount > 0){  
             
                           while($row = mysqli_fetch_assoc($result)) {
       
         echo '<option value="'.$row['sem'].'">'.$row['sem'].'</option>';
}
          
        }else{
            echo '<option value="">Semester not available</option>';
        }
               ?>


</select>

                 </div> 
                        
  <div class="controls form-group">
      
            <label>Subject Name</label>
            
            <select name="Subname_Select" id="subname" class="form-control" style="width:350px">
                <option>Select Subject</option>
            </select>
            </div>
        
                        
       <div class="controls form-group">
      
            <label>Subject Code</label>
            
            <select name="Subcode_Select" id="subcode"  class="form-control" style="width:350px" >
                <option>Select subcode</option>
            </select>
            </div>
                    
         
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
       <script type="text/javascript">
$(document).ready(function(){
    $('#sem').on('change',function(){
        var sem = $(this).val();
        if(sem){
            $.ajax({
                type:'POST',
               url:'sem.php',
                data:'sem='+sem,
                success:function(html){
                    $('#subname').html(html);
                    $('#subcode').html('<option value="">Select Subject name first</option>'); 
                }
            }); 
        }else{
            $('#subname').html('<option value="">Select Department first</option>');
            $('#subcode').html('<option value="">Select subject name first</option>'); 
        }
    });
    
    $('#subname').on('change',function(){
        var Subname = $(this).val();
        if(Subname){
            $.ajax({
                type:'POST',
                url:'sem.php',
                data:'Subname='+Subname,
                success:function(html){
                    $('#subcode').html(html);
                }
            }); 
        }else{
            $('#subcode').html('<option value="">Select subname first</option>'); 
        }
    });
});
</script>
           
       
        
 
                      <div class="col-md-2 col-sm-4 col-xs-12">  </div>
                              
                               <div class="col-md-8 col-sm-4 col-xs-12">       
                                   <button type="submit" class="btn btn-success btn-block" name="submit"  >Submit</button></div>
        </form></div>
                     </div>
</div></div>

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