<?php include "includes/header.php"; ?>

<?php

// function getRoom(){
//   global $conn;
//   $reservedRoom = 0;
//   $query = "SELECT * FROM `reservation` where `room_type`=";
//   $res = mysqli_query($conn,$query);
//   while($row = mysqli_fetch_assoc($res)){
//     $reservedRoom = ($reservedRoom + $row['no_of_room']);
    
//   }
//   return $reservedRoom;
//   }
//       // update remaining room
// $reservedRoom = getRoom($room_type);
// $query = "UPDATE room set `no_of_room` = `no_of_room` - $reservedRoom";
// $result = mysqli_query($conn,$query);

// view  room
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


<style>

    .room_input{
        border:3px solid gray;
    }
 
</style>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4><a href="roomView.php?add_id=">ADD NEW ROOM</a></h4>
                  <p class="card-description"> </p>
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
                
                </div>
              </div>
            </div>


            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Room Review</h4>
<!-- edit -->
               
                  <?php
                   if(isset($_GET['edit_id'])){
                       $edit_id = $_GET['edit_id'];

                       $query = "SELECT * from `room` where room_no=$edit_id";
                       $result = mysqli_query($conn,$query);
                       $row1 = mysqli_fetch_array($result);


                  ?>
                     <p class="card-description">Edit Room</code></p>
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label for="room_id" class="col-sm-2 col-form-label">Room Id</label>
                            <div class="col-sm-10">
                            <input type="text" class="room_input form-control" id="room_id" name="room_id" disabled value="<?php echo $row1['room_no'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="room_name" class="col-sm-2 col-form-label">Room Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="room_input form-control" id="room_name" name="room_name"  value="<?php echo $row1['room_name'];?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="room_price" class="col-sm-2 col-form-label">Room Price($)</label>
                            <div class="col-sm-10">
                            <input type="text" class="room_input form-control" id="room_price" name="room_price"  value="<?php echo $row1['room_price'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="room_type" class="col-sm-2 col-form-label">Room Type</label>
                            <div class="col-sm-10">
                            <select style="border:solid 3px gray;" name="room_type" id="room_type" class="room_input form-control" disabled>

                            <option value="<?php echo $row['room_type'];?>"><?php echo $row1['room_type'];?></option>
                      
                            </select>
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_of_room" class="col-sm-2 col-form-label">Avaliable Room</label>
                            <div class="col-sm-10">
                            <input type="text" class="room_input form-control" id="no_of_room" name="no_of_room" value="<?php echo $row1['no_of_room'];?>">
                            </div>
                        </div>
                     
                        <button type="submit" class="btn btn-primary" name="update">Update </button>
                        </form>

                 <?php }?>
                                    <!-- edit room -->
                    <?php

                    if(isset($_POST['update'])){
                        $room_price = $_POST['room_price'];
                        $available_room = $_POST['no_of_room'];
                        $query = "UPDATE `room` set `room_price`=$room_price, `no_of_room`=$available_room WHERE `room_no`=$edit_id";
                        $result = mysqli_query($conn,$query);
                        if($result){
                            echo "<script>alert('Room updated')</script>";
                            header("Location:roomView.php");
                        }
                        else{
                            echo "<script>alert('Something wents Wrong please try again');</script>";
                            // mysqli_error($conn);
                        }
                    }


                    ?>


                 <!-- add new room -->

                  <?php
                   if(isset($_GET['add_id'])){
               
                  ?>
                <p class="card-description">Add New Room</code> </p>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="room_name" class="col-sm-2 col-form-label">Room Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="room_input form-control" id="room_name" name="room_name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="room_price" class="col-sm-2 col-form-label">Room Price($)</label>
                            <div class="col-sm-10">
                            <input type="text" class="room_input form-control" id="room_price" name="room_price">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="room_image" class="col-sm-2 col-form-label">Room Image</label>
                            <div class="col-sm-10">
                            <input type="file" class="room_input form-control" id="room_image" name="room_image">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="room_type" class="col-sm-2 col-form-label">Room Type</label>
                            <div class="col-sm-10">
                            <select style="border:solid 3px gray;" name="room_type" id="room_type" class="room_input form-control" required>

                            <option>Select room</option>
								<option value="Standard Single Room">Standard Single Room</option>
								<option value="Standard Double Room">Standard Double Room</option>
								<option value="Standard Family Room">Standard Family Room</option>
								<option value="Garden Family Room">Garden Family Room</option>
								<option value="Deluxe Double Room">Deluxe Double Room</option>
								<option value="Executive Junior Suite">Executive Junior Suite</option>
								<option value="Maisonette">Maisonette</option>
								<option value="Maisonette">Gust house</option>
                      
                            </select>
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_of_room" class="col-sm-2 col-form-label">No of Room</label>
                            <div class="col-sm-10">
                            <input type="text" class="room_input form-control" id="no_of_room" name="no_of_room" >
                            </div>
                        </div>
                     
                        <button type="submit" class="btn btn-primary" name="add">ADD ROOM </button>
                        </form>

                 <?php
                //  add room

                if(isset($_POST['add'])){
                    $room_name = $_POST['room_name'];
                    $no_of_room = $_POST['no_of_room'];
                    $room_price = $_POST['room_price'];
                    $room_type = $_POST['room_type'];


                    // upload image
                    $room_image = $_FILES['room_image']['name'];
                    $room_image_tmp =$_FILES['room_image']['tmp_name'];

                    move_uploaded_file($room_image_tmp,'../Homepage/images/'.$room_image);
               

                   $query = "INSERT INTO `room`(`room_name`, `room_type`, `room_price`, `room_image`, `no_of_room`)
                            VALUES('$room_name','$room_type',$room_price,'$room_image',$no_of_room)";
                   $result = mysqli_query($conn,$query);
                   if($result){
                    echo "<script>alert('Room Added')</script>";
                    header("Location:roomView.php");
                    }
                    else{
                        echo "<script>alert('Something wents Wrong please try again');</script>";
                        mysqli_error($conn);
                    }
                  
                }
                
                
                
                }
                 ?>


                </div>
              </div>
            </div>


  


            
          
 <?php include "includes/footer.php"; ?>