
<?php 
$service = new Service();
$result = $service->fetchService();
?>
<div class="w3_agileits_services_grids">
                            <?php while($row = $result->fetch_assoc()){ ?>

                                <div class="col-md-3 w3_agileits_services_grid hvr-overline-from-center">
									<div class="w3_agileits_services_grid_agile">
										<div class="w3_agileits_services_grid_1">
											<img src="images/<?php echo $row['image']; ?>" alt="service-img">
										</div>
										<h3><?php echo $row['title']; ?></h3>
										<p><?php echo $row['message']; ?></p>
									</div>
								</div>

                        <?php
                            } 
						?>
                            
								<div class="clearfix"> </div>
							</div>