<?php  
require_once "includes/db.php";
require_once "includes/controllers.php";
require_once "partials/header.php";

if(isset($_POST['contact'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['phone'];
	$text = $_POST['Messages'];

		$query = "INSERT INTO `contact`( `username`, `email`, `mobile`, `text`) 
				VALUES ('$username','$email','$mobile','$text')";
	$result = $conn->query($query);
	if($result){
		echo "<script>alert('Message was sent successfully')</script>";
		header("Location: index.php");
	}
	else{
		echo mysqli_error($conn->error);
	}
}
   
?>
	        
						<!-- breadcrumb -->
	<div class="w3_breadcrumb">
	<div class="breadcrumb-inner">	
			<ul>
				<li><a href="index.php">Home</a> <i>/</i></li>
				
				<li>Contact</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumb -->
			<!--/content-inner-section-->
				  <div class="w3_content_agilleinfo_inner">
					    <div class="container">
							<div class="inner-agile-w3l-part-head">
					           <h2 class="w3l-inner-h-title">Contact</h2>
								
							</div>
									<div class="w3_mail_grids">
										<form action="#" method="post">
											<div class="col-md-6 w3_agile_mail_grid">
													<input type="text" placeholder="Your Name" name="name" required="">
													<input type="email" placeholder="Your Email" name="email" required="">
													<input type="text" placeholder="Your Phone Number" name="phone" required="">

												
											</div>
											<div class="col-md-6 w3_agile_mail_grid">
												<textarea name="Messages" placeholder="Your Message"  required=""></textarea>
												<input type="submit" value="Submit" name="contact">
											</div>
											<div class="clearfix"> </div>
										</form>
							</div>
					   </div>
							
				  </div>


			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3740.7036563628562!2d85.81476931485741!3d20.353857486367843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a19093de2ef679d%3A0x7df51d211d0ee66a!2sKIIT%20Road%2C%20Patia%2C%20Bhubaneswar%2C%20Odisha%20751024!5e0!3m2!1sen!2sin!4v1617683340398!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

 <?php  require_once "partials/footer.php"; ?>