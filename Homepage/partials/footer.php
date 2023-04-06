<?php 
$about_us = new About_us();
$result = $about_us->fetchAbout_us();
?>

<div class="w3l-footer">
    <?php 
    while ($row = $result->fetch_assoc()){
        ?>
        <div class="container">
         <div class="footer-info-agile">
				<div class="col-md-4 footer-info-grid address">
					<h4>Address</h4>
					<address>
						<ul>
							<li><?php echo $row['address']; ?></li>
							<li>Telephone :<?php  echo $row['contact'] ?></li>
							<li>Email : <a href="<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></li>
						</ul>
					</address>
				</div>
				<div class="col-md-4  footer-grid">
				   <h4>Gallery</h4>
					<div class="footer-grid-instagram">
					<a href="#"><img src="images/<?php echo $row['image']; ?>" alt=" " class="img-responsive"></a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 footer-info-grid">
				<div class="connect-social">
					<h4>Connect with us</h4>
					<section class="social">
                        <ul>
							<li><a class="icon fb" href="<?php echo $row['facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
							<li><a class="icon tw" href="<?php echo $row['twitter']; ?>"><i class="fa fa-twitter"></i></a></li>
							
						</ul>
					</section>

				</div>	
				</div>
				<div class="clearfix"></div>
			</div>	
	   </div>
        <?php
    }?>
		
</div>

		
			<div class="w3agile_footer_copy">
				    <p>© 2023 Resort. All rights reserved | Design by Gelchu Jarso</a></p>
			</div>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- Dropdown-Menu-JavaScript -->
			<script>
				$(document).ready(function(){
					$(".dropdown").hover(            
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
							$(this).toggleClass('open');        
						},
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
							$(this).toggleClass('open');       
						}
					);
				});
			</script>
		<!-- //Dropdown-Menu-JavaScript -->


<script type="text/javascript" src="js/jquery.zoomslider.min.js"></script>
		<!-- search-jQuery -->
				<script src="js/main.js"></script>

<!--/script-->
	<script src="js/simplePlayer.js"></script>
			<script>
				$("document").ready(function() {
					$("#video").simplePlayer();
				});
			</script>
			<!-- flexSlider -->
					<script defer src="js/jquery.flexslider.js"></script>
					<script type="text/javascript">
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				  </script>

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>

<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
 <script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
<!--end-smooth-scrolling-->
<!--js for bootstrap working-->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>