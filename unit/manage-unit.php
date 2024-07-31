<?php 

include_once('../db/connectdb.php');
include('../center/linkcss.php');

@session_start(); //@หน้า session เอาไว้เช็คว่า session ยังอยู่ไหม

$sql = "SELECT unitid , unitname ,statusid
              FROM tbunit 
              ORDER BY unitid* 1 DESC ";//ถ้าข้อมูลข้างใน ตัวเลขล้วนให้ใส่ *1 ถ้าข้อมูลไม่ใช่ตัวเลขไม่ต้องใส่ เเนะนำเอาข้อมูลล่าสุดไว้บนสุด
$result = $conn->query($sql);
//echo $sql;exit(); //ใช้ดีบัค sql
$unitidList=$unitnameList=array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
</head>
<body>

  <div class="container-fulid">
    <div class="row">
        <div class="col-12">
          <?php include('../center/menu.php'); ?>
          <h1 class="text-center">จัดการหน่วย</h1>
          <div class="d-grid justify-content-md-end" >
            <a href="from-add-unit.php" class="btn btn-primary">เพิ่มข้อมูล</a>
          </div>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">รหัสหน่วย</th>
                <th scope="col">ชื่อหน่วย</th>
                <th scope="col">ชื่อสถานนะ</th>
                <th scope="col">แก้ไข</th>
                <th scope="col">เเสดงข้อมูล</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if($result->num_rows > 0){
                  $count = 1;
                  $unitidList = $unitnameList=array();
                  foreach ($result as $row) {
                    //ทำตัวเเปรฝากข้อมูล
                    $unitidList[] = $row['unitid'];
                    $unitnameList[] = $row['unitname'];
                    $statusid[] =$row['statusid'];
                  }
                    for ($i=0; $i < $result->num_rows ; $i++) { 
                    
              ?>
              <tr>
                <th scope="row"><?php echo $count; ?></th>
                <td><?php echo $unitidList[$i]; ?></td>
                <td><?php echo $unitnameList[$i]; ?></td> 
                <?php 

                  for ($j=0; $j < count($statusid) ; $j++) { 
                      $sql = "SELECT statusname FROM tbstatus WHERE statusid = '$statusid[$j]'";
                      $querystatus = $conn->query($sql);
                      foreach($querystatus as $rowstatus){
                ?>
                <td><?php echo $rowstatus ['statusname']; ?></td>
                <?php }} ?> 
                <td><a class="btn btn-primary" href="from-edit-unit.php?id=<?php echo $unitidList[$i]; ?>"><i class="fa-regular fa-pen-to-square"></i></a></td>
                <td><a class="btn btn-primary" href="view-unit.php?id=<?php echo $unitidList[$i]; ?>"><i class="fa-solid fa-eye"></i></a></td>  
              </tr>
              <?php 
                    }
                    
                  } else{
                    echo '<td colspan="3" class ="text-center">ไม่มีข้อมูล<td>';
                  }      
              ?>
              
              
            </tbody>
          </table>

      </div>
    </div>
  </div>




<?php 
include('../center/linkjs.php');
?>
</body>
</html>