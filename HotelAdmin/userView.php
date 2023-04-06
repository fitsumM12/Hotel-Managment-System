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
    $query = "SELECT * from `user`";
    $result = mysqli_query($conn,$query);
    // <!-- delete room -->
    if(isset($_GET['delete_id'])){
        $delete_id = $_GET['delete_id'];

        $delet_query = "DELETE FROM `user` where user_id=$delete_id";
        $delete_result = mysqli_query($conn,$delet_query);
        if($delete_result){
            header("Location: userView.php");
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4><a href="userAdd.php?add_id=">ADD NEW USER</a></h4>
                  <p class="card-description"> </p>

                  <div class="table-responsive table-hover">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Profile</th>
                          <th>User Role</th>
                          <th colspan="2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($row=mysqli_fetch_assoc($result)){ ?>
                        <tr>
                          <td><?php echo $row['username'];?></td>
                          <td><?php echo $row['user_email'];?></td>
                          <td><?php echo $row['mobile'];?></td>
                          <td><img src="images/faces/<?php echo $row['profile'];?>"></td>
                          <td><?php echo $row['user_role'];?></td>

                          <td><a href="userEdit.php?edit_id=<?php echo $row['user_id'];?>">Edit</a></td>
                          <td><a href="userView.php?delete_id=<?php echo $row['user_id'];?>">Delete</a></td>
                        </tr>
           
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                
                </div>
              </div>
            </div>


          


  


            
          
 <?php include "includes/footer.php"; ?>