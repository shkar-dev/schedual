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
$rows = array();
while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
}
//echo '<pre>';
//print_r($rows);
//echo '</pre>';
$table = array();

//$ii=0;
//$y=0;
//while($ii < 8){  //i=0
//    while($y < 8){ //y=0
//        echo $ii;

//        $y++;
//    }
//    $ii++;
//    echo $ii;
//}
//                $table[$i][] = $rows[$y];

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
//$table[1][] = "hawkar choni";
echo '<pre>';
print_r($table[0] );
echo '</pre>';
//if (array_key_exists(2 , $table[5][1])){
//    echo " haya";
//}else{
//    echo "nia";
//}
echo count($table);




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
                for ($i = 0 ; $i < count($table) ; $i++){?>
                <tr>
                    <th scope="row">
                        <div class="cell_column">
                            <h4> <?php echo $table[0][$i]['dayName']; ?></h4>
                        </div>
                    </th>
                   <?php  for ($y=0;$y<=2;$y++){

                        if (array_key_exists($y,$table[0][$i][$y])){ ?>
                            <td colspan="2">
                                <div class="cell">
                                    <h4> haya</h4><p> </p>
                                </div>
                            </td>
                       <?php }else{ ?>
                            <td colspan="2">
                                <div class="cell">
                                    <h4> hich</h4><p> </p>
                                </div>
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

<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "footer.php";
include_once("footer.php");
?>
