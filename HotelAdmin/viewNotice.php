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
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * from `notice` where `id`=$id";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);

?>


<style>

    .room_input{
        border:3px solid gray;
    }
 
</style>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4><a href="userAdd.php?add_id=">Notice Detail</a></h4>
                  <p class="card-description"> </p>
                    <div class="col-md-6">
                    <pre><b>Notice Id:</b> <h6 class="text-primary text-center"><?php echo $row['id'];?></h6></pre>
                    <pre><b>Notice date:</b> <h6 class="text-primary text-center"><?php echo $row['time'];?></h6></pre>
                    <pre><b>Notice detail:</b><h6 class="text-primary text-center"> <?php echo $row['detail'];?></h6></pre>
                    
                </div>
                </div>
              </div>
            </div>


   <?php  }?>       


  


            
          
 <?php include "includes/footer.php"; ?>