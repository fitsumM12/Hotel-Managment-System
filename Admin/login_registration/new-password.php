<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>XYZ company</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <!-- <link rel="shortcut icon" href="../assets/images/favicon.png" /> -->
    <?php 
    
$errors = array();
          include_once "../includes/db.inc.php";
          
    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = $conn->real_escape_string($_POST['password']);
        $cpassword = $conn->real_escape_string($_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!".$_SESSION['email'];
        }else{
            $code = 0000; //getting this email using session
            $encpass = password_hash($cpassword,PASSWORD_BCRYPT,['cost'=>12]);
            $email=$_SESSION['email'];
            $update_pass = "UPDATE `team_members` SET `tm_code`= '$code',`tm_password` = '$encpass' WHERE `tm_email`= '$email'";
            $updated = $conn->query($update_pass);
            if($updated){
                    $info = "Your password changed. Now you can login with your new password.";
                    $_SESSION['info'] = $info;
                    header('Location: password-changed');
                
            }else{
                $errors['db-error'] = "Failed to change your password";
            }
         
        }
    }
    

    ?>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">

                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <h2 class="text-center">New Password</h2>
                            <?php 
                                if(isset($_SESSION['info'])){
                                    ?>
                            <div class="alert alert-success text-center">
                                <?php echo $_SESSION['info']."".$_SESSION['email']; ?>
                            </div>
                            <?php
                                    }
                                    ?>
                            <?php
                            if(count($errors) > 0){
                                ?>
                            <div class="alert alert-danger text-center">
                                <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                                }
                                ?>
                            </div>
                            <?php
                                    }
                                    ?>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password"
                                    placeholder="Create new password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="cpassword"
                                    placeholder="Confirm your password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control button" type="submit" name="change-password" value="Change">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>