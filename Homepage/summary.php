
<?php
	 //session_start();
  require_once "partials/header.php";
  require_once "includes/db.php";
  require_once "includes/controllers.php";
  
//   require_once "partials/navigations.php";
  Global $conn;
$room_id = $_GET['room_id'];
$query = "UPDATE `room` SET `room_status` = 'reserved' WHERE`room_id`=$room_id; ";
$conn->query($query);


$query = "SELECT * FROM `reservation` where `room_id`=$room_id; ";
$result = $conn->query($query);
	$row = $result->fetch_array();

?>
<style>
.w3l-footer1{
	background-color:#fdef;
}
</style>

<div class="summary">
 <div class="w3l-footer1">
		<div class="container">
         <div class="footer-info-agile">
			<div class="col-md-4 footer-info-grid address">
					<h4>OREDR SUMMARY</h4>
					<address>
						<ul>
							<li><pre>USER NAME:<?php echo $row['name'];?></pre></li>
							<li><pre>USER EMAIL:<?php echo $row['email'];?></pre></li>
							<li><pre>PHONE NUMBER:<?php echo $row['mobile'];?></pre></li>
							<li><pre>ROOM TYPE:<?php echo $row['room_type'];?></pre></li>
							<li><pre>Number OF ROOM:<?php echo $row['no_of_room'];?></pre></li>
							<li><pre>ARRIVAL DAT:<?php echo $row['arrival_date'] ." ".  $row['arrival_time'];?></pre></li>
							<li><pre>DEPARTURE DATE:<?php echo $row['departure_date']. " ".  $row['departure_time'];?></pre></li>
							<li><pre>TOTAL PRICE:<?php echo $row['total_price'];?></li>
						</ul>
					</address>
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
				<div class="col-md-4 footer-info-grid">
				</div>
				<div class="clearfix"></div>
	     </div>
      </div>
    </div>
</div>

			<hr>		
<?php
  require_once "partials/footer.php";
  ?>