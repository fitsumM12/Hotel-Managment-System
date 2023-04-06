<?php include "includes/header.php"; ?>

<?php
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