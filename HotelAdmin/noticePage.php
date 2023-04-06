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


    $query = "SELECT * from `notice`";
    $result = mysqli_query($conn,$query);


?>


<?php while($row = mysqli_fetch_assoc($result)){ ?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['time'];?> </h5>
    <p class="card-text">  
            <?php echo substr($row['detail'],0,40);?> 
                
    </p>
    <a href="ViewNotice.php?id=<?php echo $row['id'];?>" class="btn btn-primary">View Detail</a>
  </div>
</div>
<?php } ?>

     

      
 <?php include "includes/footer.php"; ?>