<?php
require_once "includes/db.php";
require_once "includes/controllers.php";
  require_once "partials/header.php";
//   reservation

if(isset($_POST['book'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $arrival_date = $_POST['arrival_date'];
	$arrival_time = $_POST['arrival_time'];
    $dept_date = $_POST['dept_date'];
    $dept_time = $_POST['dept_time'];
    $room_type = $_POST['room_type'];
	$no_of_room = $_POST['no_of_room'];
	$no_of_day = $_POST['no_of_day'];
	// set price for each room
	$total_price = 0;
	if($room_type == "Standard Single Room"){
	$total_price = 50*$no_of_room*$no_of_day;
	}
	else if($room_type == "Standard Double Room"){
		$total_price = 75*$no_of_room*$no_of_day;
	}
	else if($room_type == "Standard Family Room"){
		$total_price = 100*$no_of_room*$no_of_day;
	}
	else if($room_type == "Garden Family Room"){
		$total_price = 125*$no_of_room*$no_of_day;
	}
	else if($room_type == "Deluxe Double Room"){
		$total_price = 150*$no_of_room*$no_of_day;
	}
	else if($room_type == "Executive Junior Suite"){
		$total_price = 175*$no_of_room*$no_of_day;
	}
	else if($room_type == "Maisonette"){
		$total_price = 200*$no_of_room*$no_of_day;
	}
	else if($room_type == "Gust house"){
		$total_price = 250*$no_of_room*$no_of_day;
	}

	// check if the selected room type is available

		Global $conn;
		$free_room_id = 0;
		$query  = "SELECT `room_id` FROM `room` where `room_type`='$room_type' and `room_status` = 'free' LIMIT 1;";
		$result = $conn->query($query);
		// echo $free_room_id;
		if($result){
			
		$row = $result->fetch_array();
		$free_room_id = $row['room_id'];
				$query  = "INSERT INTO `reservation`(`name`, `email`, `mobile`, `arrival_date`, `arrival_time`, `departure_date`, `departure_time`, `room_type`,`no_of_room`,`total_price`,`no_of_day`,`room_id`) 
				VALUES ('$username','$email','$mobile','$arrival_date','$arrival_time','$dept_date','$dept_time','$room_type','$no_of_room','$total_price',$no_of_day, $free_room_id)";
	
				if(!$conn->query($query)){
					echo $conn->error;
				}
				else{
					
					header("Location:summary.php?room_id=$free_room_id");
				}
				
	
			}
		else{
					echo "<script>alert('This Room Type is not available right now')</script>";
			}
		

		
		// notify user booking
		$time = date("Y-m-d h:i:s");
		$detail = "New Room Reserveation has made for ".$room_type." of Total ".$no_of_room." with total price ".$total_price;

		$query = "INSERT INTO notice(`time`,`detail`)VALUES('$time','$detail')";
		$result = $conn->query($query);
        

}

  ?>


	<!-- about-bottom -->
	<div class="w3_breadcrumb">
	<div class="breadcrumb-inner">	
			<ul>
				<li><a href="index.php">Home</a> <i>/</i></li>
				
				<li>Book Now</li>
			</ul>
		</div>
	</div>
	<div class="about-bottom" id="ab">
	<div class="col-md-6 w3l_about_bottom_right two">
			<h3 class="tittle why">Book a Reservation</h3>
			<div class="book-form">

			   <form action="" method="post">
					<div class="col-md-6 form-date-w3-agileits">
						<label><i class="fa fa-user" aria-hidden="true"></i> Name :</label>
						<input type="text" name="name" placeholder="Your name" required="" >
					</div>
					<div class="col-md-6 form-date-w3-agileits second-agile">
						<label><i class="fa fa-envelope" aria-hidden="true"></i> Email :</label>
						<input type="email" name="email" placeholder="Your email" required="" >
					</div>

					<div class="col-md-6 form-date-w3-agileits">
							<label><i class="fa fa-calendar" aria-hidden="true"></i> Arrival Date :</label>
							<input  id="datepicker" name="arrival_date" type="date"  required="">
								
					</div>
					<div class="col-md-6 form-time-w3layouts second-agile">
							<label><i class="fa fa-clock-o" aria-hidden="true"></i> Time :</label>
							<input id="datepicker" type="time" name="arrival_time">
					</div>

					
					<div class="col-md-6 form-date-w3-agileits">
						     <label><i class="fa fa-calendar" aria-hidden="true"></i> Departure Date :</label>
							<input  id="datepicker1" name="dept_date" type="date"   required="">
					</div>
					<div class="col-md-6 form-time-w3layouts second-agile">
							<label><i class="fa fa-clock-o" aria-hidden="true"></i> Time :</label>
							<input id="timepicker" type="time" name="dept_time">
					</div>
					<div class="col-md-6 form-left-agileits-w3layouts bottom-w3ls">
							<label><i class="fa fa-home" aria-hidden="true"></i> Choose a Room :</label>
							<select class="form-control" name="room_type">
								<option></option>
								<option value="Standard Single Room">Standard Single Room</option>
								<option value="Standard Double Room">Standard Double Room</option>
								<option value="Standard Family Room">Standard Family Room</option>
								<option value="Garden Family Room">Garden Family Room</option>
								<option value="Deluxe Double Room">Deluxe Double Room</option>
								<option value="Executive Junior Suite">Executive Junior Suite</option>
								<option value="Maisonette">Maisonette</option>
								<option value="Maisonette">Gust house</option>
							</select>
					</div>

					<div class="col-md-6 form-date-w3-agileits">
						<label><i class="fa fa-phone" aria-hidden="true"></i> phone number :</label>
						<input type="text" name="mobile" placeholder="Your phone number" required="" >
					</div>

					<div class="col-md-6 form-date-w3-agileits second-agile">
							<label><i class="fa fa-users" aria-hidden="true"></i> No.of Room :</label>
							<select class="form-control" name="no_of_room">
								<option></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="more">More</option>
							</select>
					</div>

					
					<div class="col-md-6 form-left-agileits-w3layouts">
							<label><i class="fa fa-clander" aria-hidden="true"></i> No.of days you will wait :</label>
							<select class="form-control" name="no_of_day">
								<option></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value=" more">More</option>
							</select>
					</div>
					<div class="clearfix"> </div>
					<div class="make wow shake" data-wow-duration="1s" data-wow-delay=".5s" style="margin:10px; padding:5px">
						  <input type="submit"  name="book" value="Make a Reservation">
						  <a href="summary.php" ></a>
					
					</div>
			</form>
		</div>

		</div>
		<div class="col-md-6 w3l_about_bottom_left">
			
<img src="images/33.jpg" alt="" class="img-responsive"/>
			<div class="w3l_about_bottom_left_video book-text">
				<h4>BooK Now</h4>
			</div>
		</div>
		
		<div class="clearfix"> </div>
	</div>
<?php
  require_once "partials/footer.php";
  ?>