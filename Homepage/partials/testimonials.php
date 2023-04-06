<?php 
$testimonials = new Testimonial();
$result = $testimonials->fetchTestimonials();
?>
<div class="guests-agile">
			<h3 class="tittle">Our Customers</h3>
			<div class="w3_agileits_testimonial_grids">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<?php 
                            while($row = $result->fetch_assoc()){
                                ?>
                                <li>
								<div class="w3_agileits_testimonial_grid">
								<i class="fa fa-quote-right" aria-hidden="true"></i>
									<p><?php echo $row['message']; ?></p>
									<img src="images/<?php echo $row['image']; ?>" alt=" " class="img-responsive" />
									
								</div>
							</li>
                            <?php
                            }
                            ?>
						</ul>
					</div>
				</section>
				
				<!-- //flexSlider -->
			</div>
	</div>