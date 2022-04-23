<?php 
 
 $con = mysqli_connect ('localhost', 'root', '');
 
 if (!$con)
 {
	 echo 'not connected to server';
 }
 if (!mysqli_select_db($con, 'insertion'))
 {
	 echo 'database not selected';
 }

 $Start_Time = $_POST['starttime'];
 $End_Time = $_POST['endtime'];
 $day=$_POST['day'];
 
 $sql = "INSERT INTO timer (Start_Time, End_Time,day) VALUES ('$Start_Time', '$End_Time','$day')";

 if (!mysqli_query ($con, $sql))
 {
	 echo 'not inserted';
 }
 else
 {
	 echo '<script type="text/javascript">
                      alert("New Time Added!");
                         location="home.php";
                           </script>';
 }
 

?>