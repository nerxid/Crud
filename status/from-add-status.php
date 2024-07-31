<?php
@session_start();
$_SESSION['mode'] = 'add';
include_once('../db/connectdb.php');
include '../center/linkcss.php'
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
                <h1 class="text-center">เพิ่มสถานะ</h1>
                <form action="services/save-status.php" class="container text-center" method="POST">
                    <div class="row">
                        <div class="col">
                            <label for="statusid" class="form-add">ID Status</label>
                            <input type="text" class="form-control" name="statusid" id="statusid">
                            <br>
                            <label for="statusid" class="form-add">Name Status</label>
                            <input type="text" class="form-control" name="statusname" id="statusname">
                            <br>
                            <button class="btn btn-primary submit" type="submit">SAVE</button>
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