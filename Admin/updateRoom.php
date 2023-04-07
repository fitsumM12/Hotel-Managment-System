<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"; ?>
<?php include_once "includes/control.php"; ?>
<?php include_once "partials/nav.php"; ?>

<?php include_once "includes/roomcontrol.php"; ?>

<div class="col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <center>Edit ROOM</center>
            </h4>
            <?php
            
            
                                if(isset($_GET['room_id'])){
                                $result =$room->editRoom();
                                $rows = $result->fetch_assoc();
                                $room_id = $rows['room_id'];
                                $room_type = $rows['room_type'];
                                $room_price = $rows['room_price'];
                                $room_name = $rows['room_name'];
                                $image = $rows['image'];
                                $no_of_room = $rows['no_of_room'];
                                $room_status = $rows['room_status'];
                                
                                }
                                else{
                                    echo "<p style='color:red; margin-top:10px;'>select a service which has to be edited!!</p>";
                                }
                                ?>



            <form class="forms-sample" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                    <input type="text" class="form-control" name="room_id" id="serviceTitle"
                        value="<?php echo $room_id; ?>" hidden placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="serviceTitle">Room Name:</label>
                    <input type="text" class="form-control" name="room_name" id="room_id"
                        value="<?php echo $room_name; ?>" placeholder="Name" >
                </div>
                <div class="form-group">
                    <label for="serviceTitle">Room Type:</label>
                    <input type="text" class="form-control" name="room_type" id="serviceTitle"
                        value="<?php echo $room_type; ?>" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="serviceTitle">Number Of room</label>
                    <input type="text" class="form-control" name="no_of_room" id="serviceTitle"
                        value="<?php echo $no_of_room; ?>" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="serviceTitle">Status</label>
                    <input type="text" class="form-control" name="room_status" id="serviceTitle"
                        value="<?php echo $room_status; ?>" placeholder="Name" required>
                </div>

                <button type="submit" value="<?php echo $room_id; ?>" name="updateRoom"
                    class="btn btn-primary mr-2">Update</button>
            </form>





        </div>
    </div>
</div>

<?php include_once "partials/footer.php";  ?>