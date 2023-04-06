<!DOCTYPE html>
<html lang="en">

<?php include_once "includes/teamcontrol.php"; ?>
<?php include_once "partials/head.php"; ?>
<?php include_once "includes/control.php"; ?>

<?php include_once "partials/nav.php"; ?>


<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <center>Add Team Member</center>
            </h4>

            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="memberName">Member Name</label>
                    <input type="text" class="form-control" name="memberName" id="memberName" placeholder="Name"
                        required>
                </div>
                <div class="form-group">
                    <label for="memberEmail">Member email</label>
                    <input type="email" class="form-control" name="memberEmail" id="memberEmail" placeholder="email"
                        required>
                </div>
                <div class="form-group">
                    <label for="memberName">Password</label>
                    <input type="password" class="form-control" name="memberPassword" id="memberPassword"
                        placeholder="password" required>
                </div>

                <button type="submit" name="addMember" class="btn btn-primary mr-2">Add Member</button>
            </form>
        </div>
    </div>
</div>



<?php include_once "partials/footer.php";  ?>