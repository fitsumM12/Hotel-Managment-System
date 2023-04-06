<?php
// include the database connection
include_once "includes/db.inc.php";
if(isset($_GET['admin'])){
    $tm_id =$_GET['admin'];
    $sql = "UPDATE `team_members` SET `tm_role`='admin' WHERE  `tm_id`='$tm_id'";
    if($conn->query($sql)){
        Header("Location: team_view");
        
    }
    else{
        Header("Location: error_message?message=$conn->error");
    }
}
if(isset($_GET['author'])){
    $tm_id =$_GET['author'];
    $sql = "UPDATE `team_members` SET `tm_role`='author' WHERE  `tm_id`='$tm_id'";
    if($conn->query($sql)){
        Header("Location: team_view");
        
    }
    else{
        Header("Location: error_message?message=$conn->error");
    } 
}
if(isset($_GET['pending'])){
    $tm_id =$_GET['pending'];
    $sql = "UPDATE `team_members` SET `tm_role`='pending' WHERE  `tm_id`='$tm_id'";
    if($conn->query($sql)){
        Header("Location: team_view");
        
    }
    else{
        Header("Location: error_message?message=$conn->error");
    }
}

?>