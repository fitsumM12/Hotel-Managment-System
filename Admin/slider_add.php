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
                <center>Add Slider</center>
            </h4>
            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="sliderTitle">Slider Title</label>
                    <input type="text" class="form-control" name="sliderTitle" id="sliderTitle"
                        placeholder="slider title" required>
                </div>
                <div class="form-group">
                    <label for="sliderSubtitle">Slider Subtitle</label>
                    <input type="text" class="form-control" name="sliderSubtitle" id="sliderSubtitle"
                        placeholder="slider subtitle" required>
                </div>
                <div class="form-group">
                    <label for="link">Slider link</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="slider link">
                </div>

                <div class="form-group">
                    <label>Icon/Image</label>
                    <input type="file" accept="image/*" name="img" class="form-control" required>
                </div>
                <button type="submit" name="addSlider" class="btn btn-primary mr-2">Add Slider</button>
            </form>
        </div>
    </div>
</div>



<?php include_once "partials/footer.php";  ?>