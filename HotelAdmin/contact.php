<?php include "includes/header.php"; ?>
<!-- add contact message -->
<?php 
          $query = "SELECT * FROM `contact`";
          $result = mysqli_query($conn,$query);

          if(isset($_GET['delete_id'])){
            $delete_id = $_GET['delete_id'];
    
            $delet_query = "DELETE FROM `contact` where id=$delete_id";
            $delete_result = mysqli_query($conn,$delet_query);
            if($delete_result){
                header("Location: contact.php");
            }else{
                echo "<script>alert('Something wents Wrong please try again');</script>";
        
            }
    
        }

?>
<div class="row">
            <div class="col-md-100 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Contact request from customer</p>
                  <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table" boarder=2px width="150">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone Number</th>
                          <th>Message</th>
                          
                          <th colspan="3">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($row=mysqli_fetch_assoc($result)){ ?>
                        <tr>
                          <td><?php echo $row['username'];?></td>
                          <td><?php echo $row['email'];?></td>
                          <td><?php echo $row['phone_number'];?></td>
                          <td><?php echo $row['messages'];?></td>
                          <td><a href="reservedroom.php?confirm=<?php echo $row['id'];?>">Responce</a></td>
                          <td><a href="contact.php?delete_id=<?php echo $row['id'];?>">Delete</a></td>
                        </tr>
           
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                
                </div>
              </div>
            </div>
<?php include "includes/footer.php"; ?>