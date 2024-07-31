<?php 
    @session_start();
    $_SESSION['mode'] = "add";
    include_once('../db/connectdb.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalnia+Glaze:wght@100..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../style.css">
    <title>Unit</title>
</head>
<body>

    <h1 class="logo">Add Unit</h1>    
    <form action="services/save-unit.php" class="container text-center" method="POST">
    <div class="row">
        <div class="col">
            <label for="statusid" class="form-add">ID Unit</label>
            <input type="text" class="form-control" name="unitid" id="unitid">
            <br>
            <label for="statusid" class="form-add">Name Unit</label>
            <input type="text" class="form-control" name="unitname" id="unitname">
            <br>
            <label for="statusid" class="form-add">Select Status</label>
            <select class="form-select" aria-label="Default select example" name="statusid" id="statusid">
                <option selected>Open this select</option>
                <?php 
                    $sql="SELECT * FROM tbstatus";
                    $result = $conn->query($sql);
                    foreach($result as $row){
                ?>
                <option value="<?php echo $row['statusid'] ?>"><?php echo $row['statusname'] ?></option>
                <?php } ?>
              </select>
              <br>
            <button class="btn btn-primary submit" type="submit" name="submit">SAVE</button>
            <a href="manage-unit.php" class="btn btn-secondary">ย้อนกลับ</a>
        </div>
    </div>
    </form>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>