<?php
// include the database connection
include_once "includes/db.inc.php";
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
// the common section for all
function fetchAuthor(){
    GLOBAL $conn;
    $sql = "SELECT tm_id, tm_name FROM `team_members` WHERE 1";
    $result = $conn->query($sql);
    while($rows = $result->fetch_array()){
        echo "<option value='".$rows[0]."'>".$rows[1]."</option>"; 
    }
}
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
function fetchCategory(){
    GLOBAL $conn;
    $sql = "SELECT cat_id, cat_title FROM `categories` WHERE 1";
    $result = $conn->query($sql);
    while($rows = $result->fetch_array()){
        echo "<option value='".$rows[0]."'>".$rows[1]."</option>"; 
    }
}


?>