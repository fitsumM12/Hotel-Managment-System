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
              //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = $conn->real_escape_string($_POST['otp']);
        $check_code = "SELECT * FROM `team_members` WHERE  `tm_code` = '$otp_code'";
       if($code_res=$conn->query($check_code)){
            if(mysqli_num_rows($code_res) > 0){
            $fetch_data = $code_res->fetch_assoc();
            $email = $fetch_data['email'];
            // $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!".$_SESSION['email'];
        }
       }
       else{
        $errors['otp-error'] = "Incorrect SYNTAX".$conn->error;
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
                            <h3 class="card-title text-center mb-3">Forget Password</h3>

                            <form method="POST" enctype="multipart/form-data">
                                <h2 class="text-center">Code Verification</h2>
                                <?php 
                                    if(isset($_SESSION['info'])){
                                     ?>
                                <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                                    <?php echo $_SESSION['info']; ?>
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
                                    <input class="form-control" type="number" name="otp" placeholder="Enter code"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control button" type="submit" name="check-reset-otp"
                                        value="Submit">
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