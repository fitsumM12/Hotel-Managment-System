<?php 
// Database connection
include "includes/db.php";
include "includes/controllers.php";


// Header opening
include_once "partials/header.php"; 
// Header closing
?>

<body>
<!-- Navigation Opening -->
<?php
include "partials/navigations.php";
?>
<!-- Navigation Closing -->


<!-- Hotel Admin message Section -->
<?php
include "partials/hotel_admin_msg.php";
?>

<!-- services -->
<?php
include_once "partials/services.php";
?>
<!-- //services -->
			
		
<!-- testimonials -->
<?php
include "partials/testimonials.php";
?>

<!-- //testimonials -->
<?php include "partials/footer.php"; ?>

 