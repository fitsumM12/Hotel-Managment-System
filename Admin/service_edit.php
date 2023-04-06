<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"; ?>
<?php include_once "includes/control.php"; ?>
<?php include_once "partials/nav.php"; ?>

<?php include_once "includes/servicecontrol.php"; ?>

<div class="col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <center>Edit Service</center>
            </h4>
            <?php
                                if(isset($_GET['Edit'])){
                                $rows =$service->editService();
                                $s_id = $rows['id'];
                                $s_title = $rows['title'];
                                $s_description = $rows['message'];
                                $s_status = $rows['status'];
                                }
                                else{
                                    echo "<p style='color:red; margin-top:10px;'>select a service which has to be edited!!</p>";
                                }
                                ?>



            <form class="forms-sample" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="serviceTitle">Service Title</label>
                    <input type="text" class="form-control" name="serviceTitle" id="serviceTitle"
                        value="<?php echo $s_title; ?>" placeholder="Name" required>
                </div>


                <div class="form-group">
                    <label for="serviceDescription">Service Description</label>
                    <textarea class="form-control" maxlength="200" minlength="195" name="serviceDescription"
                        id="ServiceDescription" rows="4"> <?php echo $s_description; ?></textarea>
                </div>


                <button type="submit" value="<?php echo $s_id; ?>" name="updateService"
                    class="btn btn-primary mr-2">Update</button>
            </form>





        </div>
    </div>
</div>

<?php include_once "partials/footer.php";  ?>