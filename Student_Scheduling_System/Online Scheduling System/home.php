<?php

include 'db/database.php';



$query = "SELECT * FROM `course`";
$result1 = mysqli_query($connect, $query);

$query = "SELECT * FROM `faculty`";
$result2 = mysqli_query($connect, $query);
$options = "";
while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option >$row2[1]</option>";
}

?>
<?php
  $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "header.php";
   include_once("header.php");
   include_once("navbar.php");
?>
<html>
<head>
<style>
body {
	background-color: white;
}

</style>
</head>
<body>
<br><div class="container" >
	
  <div class="row" align="center">
    <div class="col-lg-6">
		<div class="jumbotron">
		Here you will set your schedules
<form class="form-horizontal" method= "post" action = "add.home.php">
<fieldset>

			<!-- Form Name -->
			<legend>Set Schedule</legend>


        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
        
		<!-- Method Two -->
        <div class="form-group">
			<label class="col-md-4 control-label" for="faculty">Faculty</label> 
			<div class="col-md-5">
		<select id="faculty" name="faculty" class="form-control">
            <?php echo $options;?>
        </select>
		</div>
		</div>
        <!--Method One-->
        <div class="form-group">
			<label class="col-md-4 control-label" for="Course">Stage</label>
			<div class="col-md-5">
        <select name="course" id="course" class="form-control" required >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
		</div>
    </div>
    </body>

</html>

<?php



$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "insertion";



$connect = mysqli_connect($hostname, $username, $password, $databaseName);


$query = "SELECT * FROM `rooms`";

$result1 = mysqli_query($connect, $query);
$query = "SELECT * FROM `subject`";
$result2 = mysqli_query($connect, $query);
$options = "";
while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[2]</option>";
}
//?>
<html>
<head>
</head>
<body>


        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>


        <div class="form-group">
			<label class="col-md-4 control-label" for="subject">Subject</label>
			<div class="col-md-5">
		<select  id="subject" name="subject"  class="form-control">
            <?php echo $options;?>
        </select>
		</div>
		</div>



            <?php while($row2 = mysqli_fetch_array($result2)):;?>

            <option value="<?php echo $row2[0];?>"><?php echo $row2[2];?></option>

            <?php endwhile;?>

        </select>
		<?php



$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "insertion";



$connect = mysqli_connect($hostname, $username, $password, $databaseName);


$query = "SELECT * FROM `rooms`";


$result1 = mysqli_query($connect, $query);


$query = "SELECT * FROM `rooms`";
$result2 = mysqli_query($connect, $query);


$options = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[1]</option>";
}

 
?>



<html>
<head>
</head>
<body>
<meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
        
		<!-- Method Two -->
        <div class="form-group">
			<label class="col-md-4 control-label" for="room">Room</label> 
			<div class="col-md-5">
		<select  id="room" name="room"  class="form-control">
            <?php echo $options;?>
        </select>
		</div>
		</div>
		
        <!--Method One-->
        
       

            <?php while($row2 = mysqli_fetch_array($result2)):;?>

            <option value="<?php echo $row2[0];?>"><?php echo $row2[1];?></option>
			

            <?php endwhile;?>

        </select>
        
	
        



<?php



$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "insertion";



$connect = mysqli_connect($hostname, $username, $password, $databaseName);


$query = "SELECT * FROM `timer`";



$result1 = mysqli_query($connect, $query);


$query = "SELECT * FROM `timer`";
$result2 = mysqli_query($connect, $query);


$options = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[1]</option>";
}

 
?>



<html>
<head>
</head>
<body>
<meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
        
		
		
        <!--Method One-->
        <div class="form-group">
			<label class="col-md-4 control-label" for="start_time">Start time</label> 
			<div class="col-md-5">
		<select  id="start_time" name="start_time" class="form-control">
		  <?php echo $options;?>
       

            <?php while($row2 = mysqli_fetch_array($result2)):;?>

            <option value="<?php echo $row2[0];?>"><?php echo $row2[1];?></option>
			

            <?php endwhile;?>

        </select>
        
		</div>		
    </div>
    </body>
</head>

</html>
        

<?php



$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "insertion";


$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$query = "SELECT * FROM `timer`";



$result1 = mysqli_query($connect, $query);

$query = "SELECT * FROM `timer`";
$result2 = mysqli_query($connect, $query);


$options = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[2]</option>";
}

?>





        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <body>
        
		<!-- Method Two -->
        <div class="form-group">
			<label class="col-md-4 control-label" for="end_time">End time</label> 
			<div class="col-md-5">
		<select  id="end_time" name="end_time" class="form-control">
            <?php echo $options;?>
        </select>
		</div>
		</div>
		
       

            <?php while($row2 = mysqli_fetch_array($result2)):;?>

            <option value="<?php echo $row2[0];?>"><?php echo $row2[1];?></option>

            <?php endwhile;?>

        </select>

        <?php



$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "insertion";


$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$query = "SELECT * FROM `timer`";



$result1 = mysqli_query($connect, $query);

$query = "SELECT * FROM `day`";
$result2 = mysqli_query($connect, $query);


//$options = "";
//
//while($row2 = mysqli_fetch_array($result2))
//{
//    $day_id= $row2[0];
//    $options = $options."<option value='$day_id'>$row2[3]</option>";
//}

?>


        <html>
<head>
</head>
<body>
<meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
        
		
		
        <!--Method One-->
        <div class="form-group">
			<label class="col-md-4 control-label" for="day">Day</label> 
			<div class="col-md-5">
		<select  id="day" name="day" class="form-control">


            <?php while($row2 = mysqli_fetch_array($result2)): ?>

            <option value="<?php echo $row2[0];?>"><?php echo $row2[1];?></option>
			

            <?php endwhile;?>

        </select>
        
		</div>		
    </div>
    </body>
</head>

</html>


<?php



$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "insertion";


$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$query = "SELECT * FROM `subject`";



$result1 = mysqli_query($connect, $query);

$query = "SELECT * FROM `subject`";
$result2 = mysqli_query($connect, $query);


$options = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[1]</option>";
}

?>


        <html>
<head>
</head>
<body>
<meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
        
		
		
        <!--Method One-->
        <div class="form-group">
			<label class="col-md-4 control-label" for="teacher">Teacher</label> 
			<div class="col-md-5">
		<select  id="teacher" name="teacher" class="form-control">
		  <?php echo $options;?>
       

            <?php while($row2 = mysqli_fetch_array($result2)):;?>

            <option value="<?php echo $row2[0];?>"><?php echo $row2[1];?></option>
			

            <?php endwhile;?>

        </select>


        
		</div>

    </div>
<!--        <div class="form-group">-->
<!--            <label class="col-md-4 control-label" for="teacher">Subject</label>-->
<!--            <div class="col-md-5">-->
<!--                <select class="form-control" disabled>-->
<!--                    <option  selected >None</option>-->
<!--                    <option    >Php</option>-->
<!--                    <option    >Css</option>-->
<!--                    <option    >Jquery</option>-->
<!--                    <option    >Java</option>-->
<!--                </select>-->
<!--            </div>-->
<!--        </div>-->
    </body>
</head>

</html>





		<!-- Button -->
				<div class="form-group"  align="right">
				  <label class="col-md-4 control-label" for="submit"></label>
				  <div class="col-md-5">
					<button id="submit" name="insert" class="btn btn-primary"> Set </button>
				  </div>
				</div>
        
        
</fieldset>
</form>
			
		</div>		
    </div>
    </body>

  
	
</head>

</html>





