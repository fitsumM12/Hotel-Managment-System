<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"; 
include_once "includes/db.inc.php"; ?>


<?php include_once "partials/nav.php"; 
global $conn;    
if(!isset($_GET['basic_information'])&!isset($_GET['social_media'])&!isset($_GET['profile_picture'])){
        $tm_id = $_SESSION['tm_id'];
        $query = "SELECT `tm_name`, `tm_email`, `tm_contact`, `tm_role`, `tm_status`, `tm_photo`, `tm_description`, `tm_profession` FROM `team_members` WHERE `tm_id`='$tm_id'";
        $queryResult = $conn->query($query);
        list($tm_name,$tm_email,$tm_contact,$tm_role, $tm_status,$tm_photo, $tm_description,$tm_profession) = $queryResult->fetch_array();
    ?>

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <address>
                        <img src="<?php echo"../Home/images/team/".$tm_photo;  ?>" style="border-radius:15px" alt=""
                            width="200px" height="200px" srcset="">
                        <br>
                        <p class="font-weight-bold">User Name:</p>
                        <p><?php echo $tm_name;  ?></p>

                        <p class="font-weight-bold"> Profession:</p>
                        <p class="mb-2"><?php echo $tm_profession;  ?></p>
                        <p class="font-weight-bold"> Role:</p>
                        <p class="mb-2"><?php echo $tm_role;  ?></p>

                    </address>
                </div>
                <div class="col-md-4">
                    <address class="text-primary">


                        <p class="font-weight-bold"> Email: </p>
                        <p class="mb-2"> <?php echo $tm_email;  ?></p>
                        <p class="font-weight-bold"> Phone Number: </p>
                        <p class="mb-2"> <?php echo $tm_contact;  ?></p>
                        <p class="font-weight-bold">Status:</p>
                        <p><?php echo $tm_status;  ?></p>
                    </address>

                </div>
                <div class="col-md-4">
                    <div class="dropdown">


                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Option for
                            setting</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php echo'<a class="dropdown-item" href="profile_setting?profile_picture='.$_SESSION['user_id'].'">change profile picture</a>' ?>
                            <div class="dropdown-divider"></div>
                            <?php echo'<a class="dropdown-item" href="profile_setting?basic_information='.$_SESSION['user_id'].'">Edit basic information</a>' ?>
                            <div class="dropdown-divider"></div>
                            <?php echo'<a class="dropdown-item" href="profile_setting?social_media='.$_SESSION['user_id'].'">Update Social media account</a>' ?>
                            <div class="dropdown-divider"></div>



                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Description</h4>
                </p>
                <p class="lead"><?php echo $tm_description;  ?></p>
            </div>
        </div>
    </div>
</div>
<?php
    }
    // <!-- update profile picture section -->
    if(isset($_GET['profile_picture'])){
        
        
        $tm_id = $_SESSION['tm_id'];
        $query = "SELECT `tm_photo` FROM `team_members` WHERE `tm_id`='$tm_id'";
        $queryResult = $conn->query($query);
        list($tm_photo) = $queryResult->fetch_array();
          
        ?>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-md-8">
                    <form class="forms-sample" action="profile_config" method="POST" enctype="multipart/form-data">
                        <img src="<?php echo"../Home/images/team/".$tm_photo; ?>" width="100%" height="50%"
                            alt="No image">
                        <br>
                        <div class="btn btn-success" style="position: relative; overflow: hidden;">
                            select image
                            <input type="file" name="img" accept="image/*" required
                                style=" position: absolute;  opacity: 0; right: 0; top: 0;" />
                        </div>
                        <div class=" btn  btn-primary text-right">
                            <button type="submit" class="btn" value="<?php echo $tm_id; ?>"
                                name="updateProfilePicture">Update</button>
                        </div>

                    </form>
                </div>
                <div class="col-md-4">
                    <div class="dropdown">


                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Option for
                            setting</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php echo'<a class="dropdown-item" href="profile_setting?profile_picture='.$_SESSION['user_id'].'">change profile picture</a>' ?>
                            <div class="dropdown-divider"></div>
                            <?php echo'<a class="dropdown-item" href="profile_setting?basic_information='.$_SESSION['user_id'].'">Edit basic information</a>' ?>
                            <div class="dropdown-divider"></div>
                            <?php echo'<a class="dropdown-item" href="profile_setting?social_media='.$_SESSION['user_id'].'">Update Social media account</a>' ?>
                            <div class="dropdown-divider"></div>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
}
?>


<!-- update basic information section -->
<?php
if(isset($_GET['basic_information'])){
    $tm_id = $_SESSION['tm_id'];
$query = "SELECT `tm_email`, `tm_contact`, `tm_description`, `tm_profession` FROM `team_members` WHERE `tm_id`='$tm_id'";
$queryResult = $conn->query($query);
list($tm_email,$tm_contact, $tm_description,$tm_profession) = $queryResult->fetch_array();
  
?>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-md-8">

                    <h2 class="text-center">BASIC INFORMATION UPDATE</h2>
                    <form class="forms-sample" method="POST" action="profile_config" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="tm_email">Email:</label>
                            <input type="email" class="form-control" name="tm_email" id="tm_email" placeholder=""
                                required value="<?php echo $tm_email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tm_contact">Contact:</label>
                            <input type="text" class="form-control" name="tm_contact" id="tm_contact" placeholder=""
                                value="<?php echo $tm_contact; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tm_description">Description:</label>
                            <textarea class="form-control" name="tm_description" id="tm_description"
                                rows="6"><?php echo $tm_description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tm_profession">Profession:</label>
                            <input type="text" name="tm_profession" value="<?php echo $tm_profession; ?>"
                                class="form-control" id="tm_profession">
                        </div>
                        <button type="submit" name="updateBasicInformation" class="btn btn-primary mr-2">Update</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="dropdown">


                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Option for
                            setting</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php echo'<a class="dropdown-item" href="profile_setting?profile_picture='.$_SESSION['user_id'].'">change profile picture</a>' ?>
                            <div class="dropdown-divider"></div>
                            <?php echo'<a class="dropdown-item" href="profile_setting?basic_information='.$_SESSION['user_id'].'">Edit basic information</a>' ?>
                            <div class="dropdown-divider"></div>
                            <?php echo'<a class="dropdown-item" href="profile_setting?social_media='.$_SESSION['user_id'].'">Update Social media account</a>' ?>
                            <div class="dropdown-divider"></div>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
}
?>



<?php
if(isset($_GET['social_media'])){
$tm_id = $_SESSION['tm_id'];
$query = "SELECT  `facebook`, `twitter`, `linkedin`, `telegram` FROM `team_member_address` WHERE `tm_id`='$tm_id'";
$queryResult = $conn->query($query);
list($facebook,$twitter, $linkedin, $telegram) = $queryResult->fetch_array();
    ?>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-md-8">

                    <h2 class="text-center">SOCIAL MEDIA LINK</h2>
                    <form class="forms-sample" method="POST" action="profile_config" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="facebook">Facebook Address:</label>
                            <input type="text" class="form-control" placeholder="https://www.facebook.com/***"
                                name="facebook" value="<?php echo $facebook; ?>">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter:</label>
                            <input type="text" class="form-control" placeholder="https://www.twitter.com/***"
                                name="twitter" value="<?php echo $twitter; ?>">
                        </div>
                        <div class="form-group">
                            <label for="linkedin">Linkedin Address:</label>
                            <input type="text" class="form-control" placeholder="https://www.linkedin.com/***"
                                name="linkedin" value="<?php echo $linkedin; ?>">
                        </div>
                        <div class="form-group">
                            <label for="telegram">Telegram Address:</label>
                            <input type="text" class="form-control" placeholder="https://www.telegram.com/***"
                                name="telegram" value="<?php echo $telegram; ?>">
                        </div>
                        <button type="submit" name="updateSocialMediaLink" class="btn btn-primary mr-2">Update</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="dropdown">


                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Option for
                            setting</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php echo'<a class="dropdown-item" href="profile_setting?profile_picture='.$_SESSION['user_id'].'">change profile picture</a>' ?>
                            <div class="dropdown-divider"></div>
                            <?php echo'<a class="dropdown-item" href="profile_setting?basic_information='.$_SESSION['user_id'].'">Edit basic information</a>' ?>
                            <div class="dropdown-divider"></div>
                            <?php echo'<a class="dropdown-item" href="profile_setting?social_media='.$_SESSION['user_id'].'">Update Social media account</a>' ?>
                            <div class="dropdown-divider"></div>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
}
?>
<?php include_once "partials/footer.php";  ?>