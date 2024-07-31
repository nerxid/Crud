<?php 
@session_start();
include ('../../db/connectdb.php');
$mode = $_SESSION['mode'];

if($mode = "add"){
    //echo '<pre>' ,print_r($_POST),'</pre>';
    $unitid = $_POST['unitid'];
    $unitname = $_POST['unitname'];
    $statusid = $_POST['statusid'];
    $sql = "INSERT INTO tbunit (unitid, unitname, statusid)
                            VALUES ('$unitid', '$unitname', '$statusid')";
    if ($conn->query($sql)) {
        header('Location: http://localhost/unit/manage-unit.php');
    }
    else{
        echo 'error';
    }

}

if($mode = "edit"){
    //echo '<pre>' ,print_r($_POST),'</pre>';
    $unitid = $_POST['unitid'];
    $unitname = $_POST['unitname'];
    $statusid = $_POST['statusid'];
    $sql = "UPDATE tbunit
                SET unitname = '$unitname', statusid = '$statusid'
                WHERE unitid = '$unitid'";
    if ($conn->query($sql)) {
        header('Location: http://localhost/unit/manage-unit.php');
    }
    else{
        echo 'error';
    }

}

?>