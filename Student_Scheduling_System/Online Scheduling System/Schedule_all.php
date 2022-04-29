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
$sql = "SELECT * FROM  faculty ";
$result1 = mysqli_query($connect,$sql);
?>
<style>
    .container_main{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .table_title{
        text-align: center;
        width: 100%;
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
    .formStyle{
        text-align: center;
        padding: 20px 100px;
        display: flex;
        justify-content: center;
        flex-direction: row;
    }
</style>
<div class="container_main">
    <div class="table_title"  >
        <h2>College of Science </h2>
        <form  action="" method="post">
        <div class="row py-3 formStyle">
               <div class="col-md-2"  >
                   <select class="form-control" name="faculty"   >
                       <?php while($row = mysqli_fetch_array($result1)){ ?>
                           <option value="<?php echo $row['faculty_name']; ?>"><?php echo $row['faculty_name']; ?></option>
                       <?php }?>
                   </select>
               </div>
                <div class="col-md-2">
                    <select class="form-control" name="stage">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
               <div class="col-md-6">
                   <button class="btn btn-primary mx-2" name="search"  style="width: 200px">Search</button>
                   <button class="btn btn-primary mx-2" id="print"  style="width: 200px"    type="button">print</button>
               </div>
        </div>
        </form>
        <div class="row" style="text-align: center">
            <?php
                if (isset($_POST['faculty'])){
            ?>
            <h4 style="text-transform: capitalize">department <?php echo $_POST['faculty']; ?>  - stage <?php echo $_POST['stage']; ?></h4>
        <?php }  ?>
        </div>
    </div>
    <div class="teble_content" style="width : 80%"   id="printTable">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function() {
        $("#print").click(function() {
            $("#printTable").print();
        });
    });

</script>

<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "footer.php";
include_once("footer.php");
?>
