<?php
  require_once "includes/header.php";
function checkUser(){
    global $conn;
    $query = "SELECT * FROM `user`";
    $check_result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($check_result)){
    $user_email = $row['user_email'];
    }
    return $user_email;
}

// user registeration
if(isset($_POST['register'])){

    $username = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $pass = $_POST['password'];

    $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);

    $existing_email = checkUser();

    if($existing_email==$email){
        echo "<script>alert('This email is already exist')</script>";
    } else{
        

        $query  = "INSERT INTO `user`(`username`,`user_email`,`mobile`,`user_password`) ";
        $query = $query."VALUES('$username','$email','$mobile','$pass_hashed')";

        $result = mysqli_query($conn,$query);
        if($result){
            echo "<script>alert('registration successfull')</script>";
            header("Location: login.php");
        }
        else{
            echo mysqli_error($conn);
        }
    }

}





?>
<div class="about-bottom" id="ab">
	<div class="col-md-6 w3l_about_bottom_right two">
			<h3 class="tittle why">Register Here</h3>
			<div class="book-form">

			   <form action="" method="post">
					<div class="col-md-6 form-date-w3-agileits">
						<label><i class="fa fa-user" aria-hidden="true"></i> Name :</label>
						<input type="text" name="name" placeholder="Your name" required="">
					</div>
					<div class="col-md-6 form-date-w3-agileits second-agile">
						<label><i class="fa fa-envelope" aria-hidden="true"></i> Email :</label>
						<input type="email" name="email" placeholder="Your email" required="">
					</div>
                    <div class="col-md-6 form-date-w3-agileits second-agile">
						<label><i class="fa fa-envelope" aria-hidden="true"></i> Mobile :</label>
						<input type="text" name="mobile" placeholder="Your phone" required="">
					</div>
                    <div class="col-md-6 form-date-w3-agileits second-agile" >
						<label><i class="fa fa-lock" aria-hidden="true"></i> Password :</label>
						<input type="password" name="password" placeholder="Your pass" required="">
					</div>
					<div class="clearfix"> </div>
					<div class="make wow shake" data-wow-duration="1s" data-wow-delay=".5s">
						  <input type="submit" value="Register" name="register">
					</div>
			</form>
		  </div>
		</div>


        <?php  require_once "includes/footer.php"; ?>