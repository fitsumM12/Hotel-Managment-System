 <div class="w3layouts-top-strip">
			<div class="top-srip-agileinfo">
				<div class="agileits-contact-info text-right">
					<ul>
						<li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> +91 83 74 08 69 18</li>
						<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:kenawnuru@gmail.com">aakgzHotel@gmail.com</a></li>
					</ul>
				</div>
				<div class="clearfix">
				
				</div>
			</div>
	</div>
	<div id="demo-1" data-zs-src='["images/4.jpg", "images/2.jpg", "images/1.jpg","images/3.jpg"]' data-zs-overlay="dots">
		<div class="demo-inner-content">
		<!--/header-w3l-->
			   <div class="header-w3-agileits" id="home">
			     <div class="inner-header-agile">	
								<nav class="navbar navbar-default">
									<div class="navbar-header">
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
										<h1><a  href="index.html"><span>A</span>ddis Hotel<p class="s-log">Booking</p></a>
										 
										</h1>
									</div>
									<!-- navbar-header -->
									<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
										
				 						<ul class="nav navbar-nav">
											<li class="active"><a href="index.php">Home</a></li>
												<li><a href="about.php">About</a></li>
												<li><a href="gallery.php">Gallery</a></li>
												<li><a href="room.php">Room</a></li>
										
										
												<li><a href="contact.php">Contact</a></li>
												<li><a href="reservesion.php">BOOK NOW</a></li>

												<?php if(!isset($_SESSION['user_email'])){?>
													<li><a href="login.php">Login</a></li>
													
												<?php }else{ ?>
													<li><a href="../HotelAdmin/index.php">Admin</a></li>
													<li><a href="includes/logout.php">Logout</a></li>
												<?php } ?>

										</ul>


									</div>
									<div class="clearfix"> </div>	
								</nav>
									<div class="w3ls_search">
													<div class="cd-main-header">
														<ul class="cd-header-buttons">
															<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
														</ul> <!-- cd-header-buttons -->
													</div>
													<div id="cd-search" class="cd-search">
														<form action="#" method="post">
															<input name="Search" type="search" placeholder="Search...">
														</form>
													</div>
												</div>
					
							</div> 	
		<!--//header-w3l-->
			<!--/banner-info-->
			   <div class="baner-info">   
			      <h3>Wel<span>Come </span>To   <span>Luxury </span> Hotel</h3>
				  <h4>Book Your Dream Resort Destinations</h4>
				  <p>Enjoy Your Stay In</p>
			   </div>
			<!--/banner-ingo-->
			
		</div>
	</div>
    </div>