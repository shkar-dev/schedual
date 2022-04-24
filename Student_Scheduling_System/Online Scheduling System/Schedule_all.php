<?php
include 'db/database.php';
include_once("header.php");
include_once("navbar.php");
$table = array();
if (isset($_POST['search'])){
    $fac =$_POST['faculty'];
    $stage =$_POST['stage'];
    $sql1 = " select *,day.day as dayName from addtable  inner join day on day.id = addtable.day and faculty ='$fac' and course = '$stage'      order by addtable.day asc , start_time ";
    $result = mysqli_query($connect , $sql1);
    $sql2 = "select * from day";
    $result2 =mysqli_query($connect , $sql2);
    $rows = array();
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    for ($i = 0 ; $i <  count($rows) ;$i++){
        for ($y =0 ; $y <count($rows); $y++){
            if ($rows[$y]['index'] == $i){
                $index = 1;
                if ($rows[$y]['start_time'] == '09:00'){
                    $table[$i][0] = $rows[$y];
                }elseif($rows[$y]['start_time'] == '11:00'){
                    $table[$i][1] = $rows[$y];
                }else{
                    $table[$i][2] = $rows[$y];
                }
            }
        }
    }
}



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
    <div class="table_title  " style="padding: 20px;">
        <h2>technical college of informatics</h2>
        <div class="row py-3">
            <form  action="" method="post">

               <div class="col-md-3"  >
                   <select class="form-control" name="faculty"  style="width: 80px;margin-right: 20px">
                       <option value="DB">DB</option>
                       <option value="IT">IT</option>
                   </select>
               </div>

                <div class="col-md-3">
                    <select class="form-control" name="stage" style="width: 100%" >
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
               <div class="col-md-6">
                   <button class="btn btn-primary mx-2" name="search">Search</button>
                   <button class="btn btn-primary mx-2" id="print" style="display: inline" onclick="printPage()" type="button">print</button>
               </div>
            </form>

        </div>
        <div class="row" style="text-align: center">
            <?php
                if (isset($_POST['faculty'])){
            ?>
            <h4 style="text-transform: capitalize">department <?php echo $_POST['faculty']; ?>  - stage <?php echo $_POST['stage']; ?></h4>
        <?php }  ?>
        </div>
    </div>
    <div class="teble_content" style="width : 80%"  >
        <table class="table table-bordered" >
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
                for ($i = 0 ; $i < count($table) ; $i++){?>
                <tr>
                    <th scope="row">
                        <div class="cell_column">
                           <?php
                           for ($z =0 ;$z <=2 ;$z++ ){

                               if (array_key_exists($z ,$table[$i])){?>
                                    <h4> <?php echo $table[$i][$z]['dayName']; ?></h4>
                               <?php break; }
                           }
                           ?>
                        </div>
                    </th>
                   <?php  for ($y=0;$y<=2;$y++){

                        if (array_key_exists($y,$table[$i])){ ?>
                            <td colspan="2">
                                <div class="cell">
                                    <h4><strong> <?php echo $table[$i][$y]['subject']; ?></strong></h4><p> <?php echo $table[$i][$y]['teacher']; ?>
                                        <code style="text-transform: uppercase;"><?php echo $table[$i][$y]['room']; ?></code> </p>
                                </div>
                            </td>
                       <?php }else{ ?>
                            <td colspan="2">

                            </td>
                      <?php  }
                    }
                }
                ?>







                </tr>



            </tbody>
        </table>
    </div>
</div>
<script>

    function printPage(){
      window.print()

    }
</script>

<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "footer.php";
include_once("footer.php");
?>
