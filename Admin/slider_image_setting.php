<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"; ?>
<?php include_once "includes/control.php"; ?>

<?php include_once "includes/slidercontrol.php"; ?>
<?php include_once "partials/nav.php"; ?>


<div class="col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <center>Edit Post picture</center>
            </h4>
            <?php
                                if(isset($_GET['Edit'])){
                                $rows = $slider->editSlider();
                                
                               ?>



            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                <?php echo '<img src="../Home/images/slider/'.$rows['sl_image'].'"  style="border-radius:15px" alt="" width="auto" height="200px">';  ?>
                <br>
                <div class="btn btn-success" style="position: relative; overflow: hidden;">
                    select image
                    <input type="file" name="img" accept="image/*" required
                        style=" position: absolute;  opacity: 0; right: 0; top: 0;" />
                </div>
                <div class=" btn  btn-primary text-right">
                    <button type="submit" class="btn" value="<?php echo $rows['sl_id']; ?>"
                        name="updateSliderImage">Update</button>
                </div>

            </form>

            <?php
                            }
                            else{
                                echo "<p style='color:red; margin-top:10px;'>select a service which has to be edited!!</p>";
                            }
                            ?>



        </div>
    </div>
</div>
<?php include_once "partials/footer.php";  ?>