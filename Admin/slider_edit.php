<!DOCTYPE html>
<html lang="en">

<?php include_once "includes/slidercontrol.php"; ?>
<?php include_once "partials/head.php"; ?>
<?php include_once "includes/control.php"; ?>
<?php include_once "partials/nav.php"; ?>


<div class="col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <center>Edit Slider Content</center>
            </h4>
            <?php
                                if(!isset($_GET['Edit'])){
                                    echo "<p style='color:red; margin-top:10px;'>select a service which has to be edited!!</p>";
                                }
                                else{
                                    
                                    $rows = $slider->editSlider();
                                    $sl_id = $rows['sl_id'];
                                    $sl_title = $rows['sl_title'];
                                    $sl_subtitle = $rows['sl_subtitle'];
                                    $link = $rows['link'];
                               ?>



            <form class="forms-sample" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="sliderTitle">Slider Title</label>
                    <input type="text" class="form-control" name="sliderTitle" id="sliderTitle"
                        value="<?php echo $sl_title; ?>" placeholder="title" required>
                </div>
                <div class="form-group">
                    <label for="sliderSubtitle">Slider Subtitle</label>
                    <input type="text" class="form-control" name="sliderSubtitle" id="sliderSubtitle"
                        value="<?php echo $sl_subtitle; ?>" placeholder="subtitle" required>
                </div>
                <div class="form-group">
                    <label for="sliderLink">Slider Link</label>
                    <input type="text" class="form-control" name="sliderLink" id="sliderLink"
                        value="<?php echo $link; ?>" placeholder="Link" required>
                </div>
                <button type=" submit" value="<?php echo $sl_id; ?>" name="updateSlider"
                    class="btn btn-primary mr-2">Update</button>
            </form>


            <?php }
                                ?>


        </div>
    </div>
</div>

<?php include_once "partials/footer.php";  ?>