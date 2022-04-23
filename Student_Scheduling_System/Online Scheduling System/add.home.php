<?php
include 'db/database.php';
$con = mysqli_connect ('localhost', 'root', '', 'insertion');
 if (!$con)
 {
	 echo 'not connected to server';
 }
mysqli_select_db($con, 'insertion') ;
 function getPosts()
   {
    $posts = array();
    $posts[0] = $_POST['faculty'];
    $posts[1] = $_POST['course'];
    $posts[2] = $_POST['subject'];
    $posts[3] = $_POST['room'];
	  $posts[4] = $_POST['start_time'];
	  $posts[5] = $_POST['end_time'];
	  $posts[6] = $_POST['day'];
	  $posts[7] =$_POST['teacher'];



    return $posts;
}
$data=getPosts();

//if (isset($_POST['insert'])) {
//
//
//
//	$existing_Query ="SELECT * FROM `addtable` WHERE   (`room`='$data[3]'AND `start_time`='$data[4]'  and `end_time`='$data[5]'AND `day`= '$data[6]'  )";
//	$existing_Query2 ="SELECT * FROM `addtable` WHERE  `teacher`='$data[7]'";
//    $existing_Query3 ="SELECT `id` FROM `addtable` ";
//	$existing_Result = mysqli_query($con, $existing_Query);
//	$existing_Result2 = mysqli_query($con, $existing_Query2);
//	$existing_Result3 = mysqli_query($con, $existing_Query3);
//	if( mysqli_num_rows ($existing_Result)>0){
//    if(mysqli_num_rows($existing_Result2)>0){
//
//        echo '<script type="text/javascript">
//                        alert("The Class is already had a techer0 .");
//                           window.location="home.php";
//                             </script>';
//
//
//
//
//
//    }else{

//
//      if ($insert_Result) {
//        echo "<script type='text/javascript'>
//                        alert('New schedule added successfuly');
//                           window.location='tablelist.php';
//                             </script>";
//      } else {
//        echo "<script type='text/javascript'>
//                        alert('Data not inserted!');
//                           window.location='home.php';
//                             </script>";
//      }
//    }
//
//	} else {
//    if (mysqli_num_rows($existing_Result3) <=0){
//      $insert_Query = "INSERT INTO `addtable` (`faculty`, `course`, `subject`, `room`, `start_time`, `end_time`, `day`, `teacher`) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]','$data[6]','$data[7]')";
//      $insert_Result = mysqli_query($con, $insert_Query);
//
//      if ($insert_Result) {
//        echo "<script type='text/javascript'>
//                        alert('New schedule added successfuly1');
//                           window.location='tablelist.php';
//                             </script>";
//      } else {
//        echo "<script type='text/javascript'>
//                        alert('Data not inserted!');
//                           window.location='home.php';
//                             </script>";
//      }
//    }
//    else{
//      echo '<script type="text/javascript">
//      alert("The Class is already had a techer2 .");
//         window.location="home.php";
//           </script>';
//    }
//  }
//
//
//  }

if(isset($_POST['insert'])){
    $room = $_POST['room'];
    $query1 = "Select * from addtable where room =  '$room'";
    $query1_result = mysqli_query($connect, $query1) or die("failed");
    if(mysqli_num_rows($query1_result) >0){

        $start = $_POST['start_time'];
        $end = $_POST['end_time'];
        $query = "Select * from addtable where start_time  = '$start' and end_time  = '$end' and room = '$room' ";


        $result= mysqli_query($connect , $query);
        if(mysqli_num_rows($result) > 0){
            $day = $_POST['day'];
            $query = "Select * from addtable where day  = '$day' and start_time  = '$start' and end_time  = '$end' and room = '$room' ";
            $result= mysqli_query($connect , $query);
            if(mysqli_num_rows($result) > 0 ){
                echo "<script type='text/javascript'>
                        alert('girawa !');
                           window.location='home.php';
                             </script>";
            }else{
//
                $teacher = $_POST['teacher'];
                $query = "Select * from addtable where day  = '$day' and start_time  = '$start' and end_time  = '$end'    and teacher = '$teacher'";
                $result= mysqli_query($connect , $query);
                if (mysqli_num_rows($result) > 0){
                    echo "<script type='text/javascript'>
                        alert('aw mamostaya nabet  !');
                           window.location='home.php';
                             </script>";
                }else{
                    $insert_Query = "INSERT INTO `addtable` (`faculty`, `course`, `subject`, `room`, `start_time`, `end_time`, `day`, `teacher`) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]','$data[6]','$data[7]')";
                $insert_Result = mysqli_query($con, $insert_Query);
                if ($insert_Result) {
                    echo "<script type='text/javascript'>
                        alert('Data   inserted successfully !');
                           window.location='home.php';
                             </script>";
                }else{
                    echo "<script type='text/javascript'>
                        alert('insertion failed !');
                           window.location='home.php';
                             </script>";
                }
                }


            }
        }else{
            $insert_Query = "INSERT INTO `addtable` (`faculty`, `course`, `subject`, `room`, `start_time`, `end_time`, `day`, `teacher`) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]','$data[6]','$data[7]')";
            $insert_Result = mysqli_query($con, $insert_Query);
            if ($insert_Result) {
                echo "<script type='text/javascript'>
                        alert('Data   inserted successfully !');
                           window.location='home.php';
                             </script>";
            }else{
                echo "<script type='text/javascript'>
                        alert('insertion failed !');
                           window.location='home.php';
                             </script>";
            }


        }

    }else{


        $start = $_POST['start_time'];
        $end = $_POST['end_time'];
        $day = $_POST['day'];
        $teacher =$_POST['teacher'];
        $query = "select * from addtable  where start_time = '$start' and end_time ='$end' and day = '$day' and teacher = '$teacher' ";
        $result = mysqli_query($connect,$query);
        if (mysqli_num_rows($result) > 0){
            echo "<script type='text/javascript'>
                        alert('mamosta darsi haya!');
                           window.location='home.php';
                             </script>";
        }else{
        $insert_Query = "INSERT INTO `addtable` (`faculty`, `course`, `subject`, `room`, `start_time`, `end_time`, `day`, `teacher`) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]','$data[6]','$data[7]')";
        $insert_Result = mysqli_query($con, $insert_Query);
            if ($insert_Result) {
                echo "<script type='text/javascript'>
                            alert('Data   inserted successfully !');
                               window.location='home.php';
                                 </script>";
            }else{
                echo "<script type='text/javascript'>
                            alert('insertion failed !');
                               window.location='home.php';
                                 </script>";
            }
        }
    }
}
