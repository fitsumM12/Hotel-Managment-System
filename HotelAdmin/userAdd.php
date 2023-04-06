<?php include "includes/header.php"; ?>


<style>

    .room_input{
        border:3px solid gray;
    }
 
</style>
                  <?php
                   if(isset($_GET['add_id'])){
               
                  ?>
     <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                <pre><p class="card-description">Add New User</code> </p></pre>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">User Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="room_input form-control" id="username" name="username">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                            <input type="password" class="room_input form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="text" class="room_input form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="col-sm-10">
                            <input type="text" class="room_input form-control" id="mobile" name="mobile">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="avatar" class="col-sm-2 col-form-label">Profile Picture</label>
                            <div class="col-sm-10">
                            <input type="file" class="room_input form-control" id="avatar" name="avatar">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="user_role" class="col-sm-2 col-form-label">User Role</label>
                            <div class="col-sm-10">
                            <select name="user_role" id="user_role" class=" form-control" style="border:solid 3px gray;">
                            <option value="Subscriber">Subscriber</option>
                            <option value="Admin">Admin</option>
                            
                            </select>
                            </div>
                        </div>
                     
                        <button type="submit" class="btn btn-primary" name="add_user">ADD USER </button>
                        </form>
                  </div>
                </div>
              </div>
            </div>

                 <?php
                //  add user

                if(isset($_POST['add_user'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $password = password_hash($password,PASSWORD_DEFAULT);
                    $mobile = $_POST['mobile'];
                    $user_role = $_POST['user_role'];

                    // upload image
                    $avatar = $_FILES['avatar']['name'];
                    $avatar_tmp =$_FILES['avatar']['tmp_name'];

                    move_uploaded_file($avatar_tmp,'images/faces/'.$avatar);
               

                   $query = "INSERT INTO `user`(`username`, `user_email`, `mobile`, `user_password`, `user_role`, `profile`)
                            VALUES('$username','$email','$mobile','$password','$user_role','$avatar')";
                   $result = mysqli_query($conn,$query);
                   if($result){
                    echo "<script>alert('User Added')</script>";
                    header("Location:userView.php");
                    }
                    else{
                        echo "<script>alert('Something wents Wrong please try again');</script>";
                        mysqli_error($conn);
                    }
                  
                }
                
                
                
                }
                 ?>

<?php include "includes/footer.php"; ?>