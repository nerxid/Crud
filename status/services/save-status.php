<?php
@session_start(); 
$mode = $_SESSION['mode'];
    include_once('../../db/connectdb.php');
    //echo '<pre>' ,print_r($_POST),'</pre>';

if($mode == 'add'){
    $statusid = $_POST['statusid'];
    $statusname = $_POST['statusname'];
    $sql = "INSERT INTO tbstatus(statusid, statusname) 
    VALUES ('$statusid','$statusname')";
    if($conn->query($sql)){
        header('Location: http://localhost/status/managestatus.php');
        
    }
}

if($mode == 'edit'){

    $statusid = $_POST['statusid'];
    $statusname = $_POST['statusname'];
    $sql = "UPDATE tbstatus
                SET statusname = '$statusname'
                WHERE statusid = '$statusid'";
    if($conn->query($sql)){
        header('Location: http://localhost/status/managestatus.php');
        
    }

}
    
?>