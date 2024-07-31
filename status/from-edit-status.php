<?php
@session_start();
$_SESSION['mode'] = 'edit';
include_once('../db/connectdb.php');
if(isset($_GET)){
    $id = $_GET['id'];
}
include '../center/linkcss.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Status</title>
</head>

<body>

    <div class="container-fulid">
        <div class="row">
            <div class="col-12">
                <?php include('../center/menu.php'); ?>
                <h1 class="text-center">แก้สถานะ</h1>
                <form action="services/save-status.php" class="container text-center" method="POST">
                    <div class="row">
                        <div class="col">
                            <?php
                                $sql = "SELECT statusid ,statusname 
                                            FROM tbstatus
                                            WHERE statusid = '$id'";
                                
                                $result = $conn->query($sql);
                                if($result->num_rows > 0){

                                
                                foreach ($result as $row) {
                                    $statusid[] = $row['statusid'];
                                    $statusname[] = $row['statusname'];
                                }
                                for ($i=0; $i < $result->num_rows ; $i++) { 
                                
                            ?>
                            <label for="statusid" class="form-add">ID Status</label>
                            <input type="text" class="form-control" name="statusid" id="statusid" value="<?php echo $statusid[$i]; ?>" readonly>
                            <br>
                            <label for="statusid" class="form-add">Name Status</label>
                            <input type="text" class="form-control" name="statusname" id="statusname" value="<?php echo $statusname[$i]; ?>">
                            <br>
                            <button class="btn btn-primary submit" type="submit">SAVE</button>
                            <?php  }} ?>
                            <a href="managestatus.php" class="btn btn-secondary">ย้อนกลับ</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <?php
    include('../center/linkjs.php');
    ?>
</body>

</html>