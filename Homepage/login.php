<?php
require_once "includes/db.php";
require_once "includes/controllers.php";

  require_once "partials/header.php";
    // user registeration
    if(isset($_POST['login'])){
    // user date entered
        $email = $_POST['email'];
        $pass = $_POST['password'];

        // compare with database

        $query = "SELECT * FROM `user` where user_email='$email'";
        $check_result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($check_result);
        $password_db = $row['user_password'];
        $username_db = $row['username'];
        $email_db= $row['user_email'];
        $mobile_db= $row['mobile'];

        if(password_verify($pass,$password_db) ){
          $_SESSION['user_email'] = $email_db;
          $_SESSION['username'] = $username_db;
          $_SESSION['mobile'] = $mobile_db;
          header("Location: ../HotelAdmin/index.php");
      
        }
        else{
          echo "<script>alert('Login failed!! wrong email id or password')</script>";
              
        }

}





?>
<div class="about-bottom" id="ab">
	<div class="col-md-6 w3l_about_bottom_right two">
			<h3 class="tittle why">Login Here</h3>
			<div class="book-form">

			   <form action="" method="post">

					<div class=" form-date-w3-agileits second-agile">
						<label><i class="fa fa-envelope" aria-hidden="true"></i> Email :</label>
						<input type="email" name="email" placeholder="Your email" required="">
					</div>
                    <div class=" form-date-w3-agileits second-agile" style="width:100">
						<label><i class="fa fa-lock" aria-hidden="true"></i> Password :</label>
						<input type="password" name="password" placeholder="Your pass" required="">
					</div>
				
					
					<div class="clearfix"> </div>
					<div class="make wow shake" data-wow-duration="1s" data-wow-delay=".5s">
						  <input type="submit" value="login" name="login">
					</div>
			</form>
		  </div>
		</div>

 <?php  require_once "partials/footer.php"; ?>