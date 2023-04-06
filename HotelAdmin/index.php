
<?php 
require_once "includes/header.php"; 
require_once "../Homepage/includes/auth.php";
?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                  </div>
                  <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                    <p class="text-primary mb-0 hover-cursor">Home</p>
                  </div>
                </div>

                <?php
                if(isset($_GET['room_id'])){
                  $room_id =$_GET['room_id'];
                   $query = "SELECT * FROM room where room_no=$room_id";
                   $result = mysqli_query($conn,$query);
                
                  ?>
                  <!-- view clicked room type -->
                  <div class="table-responsive table-hover">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Room Id</th>
                          <th>Room Name</th>
                          <th>Room Type</th>
                          <th>Room Price</th>
                          <th>Unreserved Room</th>
                          <th colspan="2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($row=mysqli_fetch_assoc($result)){ ?>
                        <tr>
                          <td><?php echo $row['room_no'];?></td>
                          <td><?php echo $row['room_name'];?></td>
                          <td><?php echo $row['room_type'];?></td>
                          <td><?php echo $row['room_price'];?></td>
                          <td><?php echo $row['no_of_room'];?></td>

                          <td><a href="roomView.php?edit_id=<?php echo $row['room_no'];?>">Edit</a></td>
                          <td><a href="roomView.php?delete_id=<?php echo $row['room_no'];?>">Delete</a></td>
                        </tr>
           
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <?php } ?>


                  <!-- /// view room -->
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                  <!-- <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
                    <i class="mdi mdi-download text-muted"></i>
                  </button>
                  <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-clock-outline text-muted"></i>
                  </button>
                  <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-plus text-muted"></i>
                  </button>
                  <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button> -->
                </div>
              </div>
            </div>
          </div>
          <div class="row" id="proBanner">
            <div class="col-md-12 grid-margin">
              <div class="card bg-gradient-primary border-0">
                <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
                  <p class="mb-0 text-white font-weight-medium">make user to visit our precious hotle when you reach ADDIS ABABA</p>
                  <div class="d-flex">
                    <a href="https://www.bootstrapdash.com/product/majestic-admin-pro?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn btn-outline-light mr-2 bg-gradient-danger border-0">Check Pro Version</a>
                    <button id="bannerClose" class="btn border-0 p-0 ml-auto">
                      <i class="mdi mdi-close text-white"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false" disable>Sales</a>
                    </li> -->
                    <!-- <li class="nav-item">
                      <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false" readonly>Purchases</a>
                    </li> -->
                  </ul>
                  <?php
                   $query = "SELECT * FROM room";
                   $result = mysqli_query($conn,$query);
                   $room_count = mysqli_num_rows($result);
                  
                  ?>
                  <a href="roomView.php">
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-home icon-lg mr-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Room</small>
                            <div class="dropdown">
                              <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="roomView.php" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 d-inline-block"><?php echo $room_count;?></h5>
                              </a>
                              
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                               <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                <a class="dropdown-item" href="index.php?room_id=<?php echo $row['room_no'];?>"> <?php echo $row['room_type']; ?> </a>
                                <?php } ?> 
                              </div>
                              </a>
 
                            </div>
                          </div>
                        </div>
                        <?php
                          $query = "SELECT * FROM notice";
                          $result = mysqli_query($conn,$query);
                          $notice_count = mysqli_num_rows($result);
                        
                        
                        ?>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-bell mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                          <a href="noticePage.php">
                            <small class="mb-1 text-muted">Notice</small>
                            <h5 class="mr-2 mb-0"><?php echo $notice_count;?></h5>
                          </a>
                          </div>
                        </div>

                        <?php  $query = "SELECT * FROM user";
                          $result = mysqli_query($conn,$query);
                          $user_count = mysqli_num_rows($result);
                          ?>
                      <a href="userView.php">
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-account mr-3 icon-lg text-success"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total User</small>
                            <h5 class="mr-2 mb-0"><?php echo $user_count;?></h5>
                          </div>
                        </div>
                        </a>
                        <?php
                          $query = "SELECT * FROM notice";
                          $result = mysqli_query($conn,$query);
                          $reserve_count = mysqli_num_rows($result);

                        ?>
                        <a href="reservedroom.php">
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-room-service mr-3 icon-lg text-warning"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Reserved Room</small>
                            <h5 class="mr-2 mb-0"><?php echo $reserve_count;?></h5>
                          </div>
                        </div>
                        </a>
                        <!-- <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Service</small>
                            <h5 class="mr-2 mb-0">6</h5>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Start date</small>
                            <div class="dropdown">
                              <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Downloads</small>
                            <h5 class="mr-2 mb-0">2233783</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total views</small>
                            <h5 class="mr-2 mb-0">9833550</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Revenue</small>
                            <h5 class="mr-2 mb-0">$577545</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Flagged</small>
                            <h5 class="mr-2 mb-0">3497843</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Start date</small>
                            <div class="dropdown">
                              <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Revenue</small>
                            <h5 class="mr-2 mb-0">$577545</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total views</small>
                            <h5 class="mr-2 mb-0">9833550</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Downloads</small>
                            <h5 class="mr-2 mb-0">2233783</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Flagged</small>
                            <h5 class="mr-2 mb-0">3497843</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Cash deposits</p>
                  <p class="mb-4">Amount of cash deposit from our hotel per month</p>
                  <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
                  <canvas id="cash-deposits-chart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Total sales</p>
                  <h1>$5000</h1>
                  <h4>Total gross sell per month</h4>
                  <p class="text-muted">Total payment collected per month from room reservation and food </p>
                  <div id="total-sales-chart-legend"></div>                  
                </div>
                <canvas id="total-sales-chart"></canvas>
              </div>
            </div>
          </div>
<?php
$query = "SELECT * from `room`";
$result = mysqli_query($conn,$query);
// <!-- delete room -->
if(isset($_GET['delete_id'])){
$delete_id = $_GET['delete_id'];

$delet_query = "DELETE FROM `room` where room_no=$delete_id";
$delete_result = mysqli_query($conn,$delet_query);
if($delete_result){
  header("Location: roomView.php");
}else{
  echo "<script>alert('Something wents Wrong please try again');</script>";

}

}


  
?>
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Recent customer</p>
                  <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                      <tr>
                          <th>Room Id</th>
                          <th>Room Name</th>
                          <th>Room Type</th>
                          <th>Room Price</th>
                          <th>Unreserved Room</th>
                          <th colspan="2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($row=mysqli_fetch_assoc($result)){ ?>
                        <tr>
                          <td><?php echo $row['room_no'];?></td>
                          <td><?php echo $row['room_name'];?></td>
                          <td><?php echo $row['room_type'];?></td>
                          <td><?php echo $row['room_price'];?></td>
                          <td><?php echo $row['no_of_room'];?></td>

                          <td><a href="roomView.php?edit_id=<?php echo $row['room_no'];?>">Edit</a></td>
                          <td><a href="roomView.php?delete_id=<?php echo $row['room_no'];?>">Delete</a></td>
                        </tr>
           
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <?php include "includes/footer.php"; ?>
       