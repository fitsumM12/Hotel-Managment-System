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
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

error_reporting(0);
session_start();
require_once "../includes/db.inc.php";

$errors = array();
try {
    //Server settings
    $mail->SMTPDebug = 1;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'birukm115@gmail.com';                     //SMTP username
    $mail->Password   = 'W55BcVxuJVVQDmR';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    // $address = 'fitsummesfin12@gmail.com';
    // $name = '1705989';
    //Recipients
    $mail->setFrom('birukm115@gmail.com', 'ZemenTech');
    // $mail->addAddress($address);     //Add a recipient
       
    // // $mail->addReplyTo('info@example.com', 'Information');
    // // $mail->addCC('cc@example.com');
    // // $mail->addBCC('bcc@example.com');

    // //Attachments
    // // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    // //Content
    // $mail->isHTML(true);                                  //Set email format to HTML
    // $mail->Subject = 'Email Verification Code';
    // $mail->Body  = 'The verification code to verify your email is  <b>'.$code.'</b>';
    // $mail->AltBody = 'The verification code to verify your email is  <b>'.$code.'</b>';

    // $mail->send();
    // echo 'Message has been sent';



    

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = $conn->real_escape_string($_POST['user_email']);
        $check_email = "SELECT * FROM `team_members` WHERE  `tm_email`='$email'";
        $run_sql = $conn->query($check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE `team_members` SET `tm_code`='$code' WHERE `tm_email` = '$email'";
            $run_query =  $conn->query($insert_code);
            if($run_query){
                $mail->addAddress($email);  
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Email Verification Code';
                $mail->Body  = 'The verification code to verify your email is  <b>'.$code.'</b>';
                $mail->AltBody = 'The verification code to verify your email is  <b>'.$code.'</b>';
                if($mail->send()){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    

    
  
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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

                                <div class="text-center">
                                    <button type="submit" name="check-email"
                                        class="btn btn-primary btn-block enter-btn">Verify</button>
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