<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HMS</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <!-- <link rel="shortcut icon" href="../assets/images/favicon.png" /> -->
    <?php 
          include_once "../includes/db.inc.php";

          $errors = array();
          //if user click login button
    if(isset($_POST['login'])){
        $email = $conn->real_escape_string($_POST['user_email']);
        $password = $conn->real_escape_string($_POST['user_password']);
        $check_email = "SELECT * FROM `team_members` WHERE `email` = '$email'";
        $res = $conn->query($check_email);
        if($fetch = $res->fetch_assoc()){
            
            $fetch_pass = $fetch['password'];
            $fetch_role = $fetch['role'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $_SESSION['username']=$fetch['name'];
                $_SESSION['tm_role']=$fetch['role'];
                $_SESSION['tm_id']=$fetch['id'];
                $_SESSION['tm_photo']=$fetch['image'];
                // $status = $fetch['tm_role'];
                Header("Location: ../dashboard"); 
                
            }else{
                $errors['email'] = "Incorrect  password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Please contact the company".$conn->error;
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
                            <h3 class="card-title text-center mb-3">Login</h3>
                            <?php
                    if(count($errors) > 0){
                        ?>
                            <div class="alert alert-danger text-center">
                                <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                        }
                            ?>
                            </div>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" required name="user_email" class="form-control p_input">
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" required name="user_password" class="form-control p_input">
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"> Remember me </label>
                                    </div>
                                    <a href="forget_password" class="forgot-pass">Forgot password</a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="login"
                                        class="btn btn-primary btn-block enter-btn">Login</button>
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
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>