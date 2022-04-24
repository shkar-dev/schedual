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
echo $_POST['faculty'];
$data=getPosts();


if(isset($_POST['insert'])){

    $faculty = $_POST['faculty'];

    $room = $_POST['room'];
    $course = $_POST['course'];
    $query1 = "Select * from addtable where room =  '$room' and faculty = '$faculty' and course = '$course'";
    $query1_result = mysqli_query($connect, $query1) or die("failed");
    if(mysqli_num_rows($query1_result) >0){

        $start = $_POST['start_time'];
        $end = $_POST['end_time'];
        $query = "Select * from addtable where start_time  = '$start' and end_time  = '$end' and room = '$room'and faculty = '$faculty' and course = '$course' ";


        $result= mysqli_query($connect , $query);
        if(mysqli_num_rows($result) > 0){
            $day = $_POST['day'];
            $query = "Select * from addtable where day  = '$day' and start_time  = '$start' and end_time  = '$end' and room = '$room' and faculty = '$faculty' and course = '$course' ";
            $result= mysqli_query($connect , $query);
            if(mysqli_num_rows($result) > 0 ){
                echo "<script type='text/javascript'>
                        alert('girawa !');
                           window.location='home.php';
                             </script>";
            }else{
//
                $teacher = $_POST['teacher'];
                $query = "Select * from addtable where day  = '$day' and start_time  = '$start' and end_time  = '$end'    and teacher = '$teacher' and faculty = '$faculty' and course = '$course'";
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
        $query = "select * from addtable  where start_time = '$start' and end_time ='$end' and day = '$day' and teacher = '$teacher'  and faculty = '$faculty' and course = '$course'  ";
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
