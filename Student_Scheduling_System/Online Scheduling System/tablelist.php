<?php
   include_once("header.php");
   include_once("navbar.php");
?>
<html>
<head>

</head>
<body><br>
<div align="center">
			<fieldset>
            <legend>Schedule</legend>
<body>
    <?php
     echo "<tr>
            <td>";
              
			   $host       = "localhost"; 
               $username   = "root"; 
               $password   = "";
               $database   = "insertion"; 
			   
      
			   $connect=mysqli_connect($host,$username,$password,$database) or die(mysql_error()); 
             
                    $query = ("SELECT *,day.day as dayName FROM addtable inner join day on day.id = addtable.day");
                    $result = mysqli_query($connect, $query) or die(mysql_error());
                    echo "<div class='container'><table width='' class='table table-bordered' border='1' >
                            <tr>
                                <th>Faculty</th>
								<th>Semester</th>
                                <th>Subject</th>
								<th>Room</th>
								<th>Start time</th>
								<th>End time</th>
								<th>Day</th>
								<th>Teacher</th>



                                <th>Action</th>
                            </tr>";
                        while($row = mysqli_fetch_array($result))
                        {
                        echo "<tr>";
                        echo "<td>" . $row['faculty'] . "</td>";
						echo "<td>" . $row['course'] . "</td>";
                        echo "<td>" . $row['subject'] . "</td>";
						echo "<td>" . $row['room'] . "</td>";
						echo "<td>" . $row['start_time'] . "</td>";
						echo "<td>" . $row['end_time'] . "</td>";
						echo "<td>" . $row['dayName'] . "</td>";
						echo "<td>" . $row['teacher'] . "</td>";



                        echo "<td><form class='form-horizontal' method='post' action='tablelist.php'>
                        <input name='id' type='hidden' value='".$row['id']."';>
                        <input type='submit' class='btn btn-danger' name='delete' value='Delete'>
                        </form></td>";
                        echo "</tr>";
                        }
                    echo "</table>";

            echo "</td>           
        </tr>";

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
		echo '<script type="text/javascript">
                      alert("Schedule Successfuly Deleted");
                         location="tablelist.php";
                           </script>';
    }
    if(isset($_POST['id']))
    {
    $id = $_POST['id'];
    $sql = mysqli_query($connect, "DELETE FROM addtable WHERE id='$id'");
    if(!$sql)
    {
        echo ("Could not delete rows" .mysqli_error());
    }
	
    }
    ?>
</fieldset>
</form>
</div>
</div>
</div>

<div align="center">
<br>
<a href="home.php"><input type='submit' class='btn btn-success' name='delete' value='New'></a>
<a href="Index.php"><input type='submit' class='btn btn-primary' name='delete' value='Logout'></a>
</div>
</div>
	</body>
	</html>
	
<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "footer.php";
   include_once("footer.php");

?>