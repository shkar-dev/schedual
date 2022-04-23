<?php
include 'db/database.php';
include_once("header.php");
include_once("navbar.php");

$sql = " select count(*) as row from addtable inner join day on day.id = addtable.day group by addtable.day order by addtable.day asc , start_time";
$count = mysqli_query($connect , $sql);
$sql1 = " select *,day.day as dayName from addtable inner join day on day.id = addtable.day   order by addtable.day asc , start_time";
$result = mysqli_query($connect , $sql1);
$sql2 = "select * from day";
$result2 =mysqli_query($connect , $sql2);

?>
<style>
    .container_main{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .table_title{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .cell{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100%;
        width: 100%;
    }
    .cell_column{

        text-align: center;
    }
</style>
<div class="container_main">
    <div class="table_title">
        <h2>technical college of informatics</h2>
        <strong><label> information technology </label></strong>
    </div>
    <div class="teble_content" style="width : 80%">
        <table class="table table-bordered"  >
            <thead style="background: #4cae4c">
            <tr style="text-align: center">
                <th scope="col "  class="cell_column">Day / Time</th>
                <th scope="col" class="cell_column">9-10</th>
                <th scope="col" class="cell_column">10-11</th>
                <th scope="col" class="cell_column">11-12</th>
                <th scope="col" class="cell_column">12-1</th>
                <th scope="col" class="cell_column">1-2</th>
                <th scope="col" class="cell_column">2-3</th>
            </tr>
            </thead>
            <tbody>


            <?php
            $increment1 = 0;
            $increment2 = 0;
            $increment3 = 0;

            while($increment1 < mysqli_num_rows($count)){

                 while($row = mysqli_fetch_array($count)){


                      $day = mysqli_fetch_array($result2);

                     ?>
                <tr>
                    <th scope="row">
                        <div class="cell_column">
                            <h4> <?php echo $day[1]; ?></h4>
                        </div>
                    </th>
                    <?php
                     while($data = mysqli_fetch_array($result)){


                         ?>
                         <td colspan="2">
                             <div class="cell">
                                 <h4> <?php echo $data['subject']; ?></h4><p><?php echo $data['teacher']; ?></p>
                             </div>
                         </td>
                   <?php  $increment2++; }
                     ?>

                </tr>
              <?php   }
                 $increment1++;

            }


            ?>











            </tbody>
        </table>
    </div>
</div>

<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "footer.php";
include_once("footer.php");
?>
