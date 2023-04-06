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
				<li>Gallery</li>
			</ul>
		</div>
	</div>
	<?php 
	$gallery = new Gallery();
	$result = $gallery->fetchGallery();
	?>
			<!--/content-inner-section-->
				<div class="w3_content_agilleinfo_inner">
					<div class="container">
					      <div class="inner-agile-w3l-part-head">
					            <h2 class="w3l-inner-h-title">Gallery</h2>
							</div>
				                <div class="gallery-grids">
									<?php
									while($row = $result->fetch_assoc()){
										?>
										<div class="col-md-4 gallery-grid">
										<div class="grid">
											<figure class="effect-apollo">
												<a class="example-image-link" href="images/g8.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut sem ac lectus mattis sagittis. Donec pulvinar quam sit amet est vestibulum volutpat. Phasellus sed nibh odio. Phasellus posuere at purus sit amet porttitor. Cras euismod egestas enim eget molestie. Aenean ornare condimentum odio, in lacinia felis finibus non. Nam faucibus libero et lectus finibus, sed porttitor velit pellentesque.">
													<img src="images/<?php echo $row['image']; ?>" alt="" />
													<figcaption>
														<p><?php echo $row['title']; ?> <span><a href="<?php echo $row['link']; ?>">Booking </a></span></p>
													</figcaption>	
												</a>
												</figure>
										</div>
										</div>
										<?php
									} 
									?>
							</div>

					</div>
					
					<div class="clearfix"> </div>
					
			</div>

					</div>
				</div>
			<!--//content-inner-section-->

 <!-- Footer -->
 <?php  require_once "partials/footer.php"; ?>