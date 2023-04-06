<?php 
$admin_message = new Admin_message();
$messages = $admin_message->fetchAdminMessage();
?>

<div class="special featured">
		  <div class="container">
            <?php 
            while($rows = $messages->fetch_assoc()){
                ?>
                    <div class="ab-w3l-spa">
				        <h3 class="tittle"><?php echo $rows['title']; ?></h3>
						<p> <?php echo $rows['message']; ?></p>
				   </div>
            <?php }
				   
            ?>