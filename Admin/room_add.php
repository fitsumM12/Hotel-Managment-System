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
            <form class="forms-sample" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="serviceTitle">Room Name:</label>
                    <input type="text" class="form-control" name="room_name" id="room_id"
                    placeholder="2bxx" >
                </div>
                <div class="form-group">
                    <label for="serviceTitle">Room Type:</label>
                    <input type="text" class="form-control" name="room_type" id="serviceTitle"
                        placeholder="Standard Single Room" required>
                </div>
                <div class="form-group">
                    <label for="serviceTitle">Number Of room</label>
                    <input type="text" class="form-control" name="no_of_room" id="serviceTitle"
                         placeholder="2" required>
                </div>
                <div class="form-group">
                    <label for="serviceTitle">Room Price</label>
                    <input type="text" class="form-control" name="room_price" id="serviceTitle"
                         placeholder="2" required>
                </div>
                <div class="form-group">
                <label for="">Image:</label>
                <div class="btn btn-success" style="position: relative; overflow: hidden;">
                    select image
                    <input type="file" name="img" accept="image/*" required
                        style=" position: absolute;  opacity: 0; right: 0; top: 0;" />
                </div>
                </div>
                
                <button type="submit"  name="addRoom"
                    class="btn btn-primary mr-2">Update</button>
            </form>





        </div>
    </div>
</div>

<?php include_once "partials/footer.php";  ?>