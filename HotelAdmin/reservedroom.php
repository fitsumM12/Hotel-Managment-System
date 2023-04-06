<?php include "includes/header.php";?>
<?php
// view  room
    $query = "SELECT * from `reservation` order by id desc";
    $result = mysqli_query($conn,$query);
    // <!-- delete room -->
    if(isset($_GET['delete_id'])){
        $delete_id = $_GET['delete_id'];

        $delet_query = "DELETE FROM `reservation` where `id`=$delete_id";
        $delete_result = mysqli_query($conn,$delet_query);
        if($delete_result){
            header("Location: reservedroom.php");
        }else{
            echo "<script>alert('Something wents Wrong please try again');</script>";
    
        }

    }

?>


<style>

    .room_input{
        border:3px solid gray;

    }
    .table{
        width:100%
    }
 
</style>
<div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Reserved Room</p>
                  <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table" boarder=2px>
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone Number</th>
                          
                          <th>Arrival Date</th>
                          <th>Departure Date</th>
                          <th>Room Type</th>
                          <th>Room Number</th>
                          <th>Room Price</th>
                          <th colspan="3">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($row=mysqli_fetch_assoc($result)){ ?>
                        <tr>
                          <td><?php echo $row['name'];?></td>
                          <td><?php echo $row['email'];?></td>
                          <td><?php echo $row['mobile'];?></td>
                          <td><?php echo $row['arrival_date'];?></td>
                          <td><?php echo $row['departure_date'];?></td>
                          <td><?php echo $row['room_type'];?></td>
                          <td><?php echo $row['no_of_room'];?></td>
                          <td><?php echo $row['total_price'];?></td>
                          <td><a href="reservedroom.php?confirm=<?php echo $row['id'];?>">Confirm</a></td>
                
                          <td><?php echo $row['status'];?></td>
                          <td><a href="reservedroom.php?delete_id=<?php echo $row['id'];?>">Delete</a></td>
                        </tr>
           
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                
                </div>
              </div>
            </div>
            <!-- confirm booking -->
       <?php
    if(isset($_GET['confirm'])){?>
    <?php
      $id = $_GET['confirm'];
      $query="UPDATE `reservation` set `status`='Accepted' where id=$id";
          $result = mysqli_query($conn,$query);
    }
    ?>

<?php include "includes/footer.php";?>