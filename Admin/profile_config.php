<?php
include_once "partials/head.php"; 
include_once "includes/db.inc.php"; 

if(isset($_POST['updateProfilePicture'])){
    $tm_id = $_SESSION['tm_id'];
$img=$_FILES['img']['name'];
$img_type=$_FILES['img']['type'];
$img_tmp_name=$_FILES['img']['tmp_name'];
$img_size=$_FILES['img']['size'];
try{
if($img_type=="image/jpeg" || $img_type=="image/jpg" || $img_type=="image/png" || $img_type=="image/gif"){
if($img_size<=50000000){ $pic_name=time()."_profile_picture".$img;
    move_uploaded_file($img_tmp_name,"../Home/images/team/".$pic_name);
    $_SESSION['tm_photo']=$pic_name;
    $query="UPDATE `team_members` SET `tm_photo`='$pic_name' WHERE `tm_id`='$tm_id'" ; if(!$conn->query($query)){
    throw new Exception("Query error".$conn->error);
    }
    else{
    $message ="Updated Successfully";
    Header("Location: profile_setting");
    }
    }
    else{
    throw new Exception("The image size should be less than 50Mb");
    }
    }
    else{
    throw new Exception("Image type should be JPEG, JPG ,PNG ,GIF.<br> TRY AGAIN");
    }
    }
    catch(Exception $e){
    $e=$e->getMessage();
    Header("Location: error_message?message=$e");
    }
    }


if(isset($_POST['updateBasicInformation'])){
    $tm_id = $_SESSION['tm_id'];
    $tm_profession = $conn->real_escape_string($_POST['tm_profession']);
    $tm_description = $conn->real_escape_string($_POST['tm_description']);
    $tm_contact = $conn->real_escape_string($_POST['tm_contact']);
    $tm_email = $conn->real_escape_string($_POST['tm_email']);
    $sql="UPDATE `team_members` SET `tm_email`='$tm_email ',`tm_contact`='$tm_contact',`tm_description`='$tm_description',`tm_profession`='$tm_profession' WHERE `tm_id`='$tm_id'";
    if($conn->query($sql)){
        Header("Location: profile_setting");
    }
    else{
        Header("Location: error_message?message=$conn->error");
        exit();
    }
}

if(isset($_POST['updateSocialMediaLink'])){
    $tm_id = $_SESSION['tm_id'];
    $facebook = $conn->real_escape_string($_POST['facebook']);
    $twitter = $conn->real_escape_string($_POST['twitter']);
    $linkedin = $conn->real_escape_string($_POST['linkedin']);
    $telegram = $conn->real_escape_string($_POST['telegram']);
   
        $sql="UPDATE `team_member_address` SET `facebook`='$facebook',`twitter`='$twitter',`linkedin`='$linkedin',`telegram`='$telegram' WHERE  `tm_id`='$tm_id'";
        if($conn->query($sql)){
            Header("Location: profile_setting");
        }
        else{
            Header("Location: error_message?message=$conn->error");
            exit();
        }
   
    }

?>