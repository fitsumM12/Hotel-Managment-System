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
				<li>About</li>
			</ul>
		</div>
	</div>
	<?php 
$about_us = new About_us();
$result = $about_us->fetchAbout_us();
?>
				<div class="w3_content_agilleinfo_inner">
					<?php
					while($row = $result->fetch_assoc()){?>
					<div class="container">
					      <div class="inner-agile-w3l-part-head">
					            <h2 class="w3l-inner-h-title">About</h2>
							</div>
							<div class="ab-w3l-spa">
							 <img src="images/<?php echo $row['image']; ?>" alt="" class="img-responsive" />
								<p><?php echo $row['message'];?></p>
							</div>
				<?php } ?>
								<!-- services -->
							<?php include_once "partials/services.php"?>
				<!-- //services -->
				
				

					</div>

		 	<div class="featured-facility">
	</div>
</div>
<?php 
$team = new  TeamMembers();
$result = $team->fetchTeamMembers();
?>
<!-- Our Team Section -->
	 <div class="team-section">
	 		      <div class="container">
				  <h3 class="tittle">Our Team</h3>
		      <div class="team-row">
					
				<?php 
				while($row = $result->fetch_assoc()){
					?>
				<div class="col-md-3 team-grids">
					<div class="team-img">
						<img class="img-responsive" src="images/<?php echo $row['image'] ?>" alt="">
						<div class="captn">
							<ul class="top-links">
									<li><a href="<?php echo $row['facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
									<li><a href="<?php echo $row['twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
									
								</ul>
						
						</div>
					</div>
					<div class="team-agile">
						<h4><?php echo $row['name'] ?></h4>
						
					</div>
				</div>
					<?php
				}
				?>
							
				<div class="clearfix"> </div>
			</div> 
		</div>	
</div>			
	<!-- /plans -->
      
	
 <!-- Footer -->
 <?php  require_once "partials/footer.php"; ?>