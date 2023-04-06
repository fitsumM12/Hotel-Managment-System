<?php
require_once "includes/db.php";
require_once "includes/controllers.php";
require_once "partials/header.php"; 
?>
    <!-- breadcrumb -->
	<div class="w3_breadcrumb">
	<div class="breadcrumb-inner">	
			<ul>
				<li><a href="index.php">Home</a> <i> /</i></li>
				<li>ROOM</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumb -->






<!-- new -->
<div class="col-md-6 w3l_about_bottom_left">
			
			<!-- <img src="images/33.jpg" alt="" class="img-responsive" />
						<div class="w3l_about_bottom_left_video book-text">
							<h4>BooK Now</h4>
						</div>
					</div> -->
					
					<div class="clearfix"> </div>
</div>
			<!-- //about -->
				<!-- /plans -->
				  <div class="plans-section">
					 <div class="container">
							 <h3 class="w3l-inner-h-title">Rates and Booking</h3>
								<div class="priceing-table-main">
									<?php
									Global $conn;
											$query = "SELECT * FROM `room`";
											$room_res = $conn->query($query);
											while($row = $room_res->fetch_assoc()){
																			
										?>

							 <div class="col-md-3 price-grid">
								<div class="price-block agile">
									<div class="price-gd-top pric-clr1">
										<h4 style='background-color:green;'> <?php echo $row['room_type']; ?></h4>
										<h2 style='background-color:orange;' >Price<span>$</span><?php echo $row['room_price']; ?></h2>
										<h5>1 Night</h5>
									</div>
									<div class="price-gd-bottom">
									<div class="price-list">
									<img src="images/<?php echo $row['image']; ?>" alt="no image" width="200" hight="150" />
									<figcaption>
										<p>Rate and <span>Book</span></p>
									</figcaption>	
								</a>
											
											<ul>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
													<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
													<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
													<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
											
											 </ul>
											 <h6 class="bed"><i class="fa fa-bed" aria-hidden="true"></i></h6>
									</div>
										<div class="price-selet pric-sclr1">		    			   
										<a href="reservesion.php" >Book Now</a>
										</div>
									</div>
								</div>
							</div>
							
<?php } ?>

							<div class="clearfix"> </div>
						</div>
						
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>

 <!-- Footer -->
 <?php  require_once "partials/footer.php"; ?>