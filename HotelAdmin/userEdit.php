
<?php include "includes/header.php"; ?>
<style>

.room_input{
    border:3px solid gray;
}

</style>

<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Review</h4>
<!--  -->
               
                  <?php
                   if(isset($_GET['edit_id'])){
                       $edit_id = $_GET['edit_id'];

                       $query = "SELECT * from `user` where user_id=$edit_id";
                       $result = mysqli_query($conn,$query);
                       $row1 = mysqli_fetch_array($result);


                  ?>
                     <p class="card-description">Edit User</code></p>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">User Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="room_input form-control" id="username" name="username" value="<?php echo $row1['username'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="text" class="room_input form-control" id="email" name="email"  value="<?php echo $row1['user_email'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="room_price" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                            <input type="password" class="room_input form-control" id="password" name="password"  value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="room_type" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="col-sm-10">
                            <input type="text" class="room_input form-control" id="mobile" name="mobile"  value="<?php echo $row1['mobile'];?>">
  
                            </select>
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_of_room" class="col-sm-2 col-form-label">Profile Picture</label>
                            <div class="col-sm-10">
                            <input type="file" class="room_input form-control" id="avatar" name="avatar" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="user_role" class="col-sm-2 col-form-label">User Role</label>
                            <div class="col-sm-10">
                            <select name="user_role" id="user_role" class=" form-control" style="border:solid 3px gray;">
                            <option value="subscriber">Subscriber</option>
                            <option value="Admin">Admin</option>
                            
                            </select>
                            </div>
                        </div>
                     
                        <button type="submit" class="btn btn-primary" name="update">Update </button>
                        </form>

                 <?php }?>
                                    <!-- edit room -->
                    <?php

                    if(isset($_POST['update'])){
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $mobile = $_POST['mobile'];
                        $password = $_POST['password'];
                        $password = password_hash($password,PASSWORD_DEFAULT);
                        $user_role = $_POST['user_role'];

                         // upload image
                    $avatar = $_FILES['avatar']['name'];
                    $avatar_tmp =$_FILES['avatar']['tmp_name'];

                    move_uploaded_file($avatar_tmp,'images/faces/'.$avatar);

                    if($avatar){
                        $query = "UPDATE `user` SET `username`='$username',`user_email`='$email',
                        `mobile`='$mobile',`user_password`='$password',`user_role`='$user_role',`profile`='$avatar' WHERE `user_id`='$edit_id'";

                         $result = mysqli_query($conn,$query);

                    }else{
                        $query = "UPDATE `user` SET `username`='$username',`user_email`='$email',
                        `mobile`='$mobile',`user_password`='$password',`user_role`='$user_role' WHERE `user_id`='$edit_id'";
                        $result = mysqli_query($conn,$query);
                    }

 
                        if($result){
                            echo "<script>alert('User updated')</script>";
                            header("Location:userView.php");
                        }
                        else{
                            echo "<script>alert('Something wents Wrong please try again');</script>";
                            mysqli_error($conn);
                        }
                    }


                    ?>


                 <!-- add new room -->

                </div>
              </div>
            </div>

            <?php include "includes/footer.php"; ?>