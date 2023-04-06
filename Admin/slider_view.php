<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"; ?>

<?php include_once "includes/slidercontrol.php"; ?>
<?php include_once "partials/nav.php"; ?>
<?php include_once "includes/control.php"; ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Post in the Blog Section</h4>
            <p class="card-description">View and<code>edit/delet option</code>
            </p>
            <?php
                    if($_SESSION['tm_role']=='admin'){?>
            <p class="text-right"><button class="btn btn-success" id="approveSlider">Approve</button>&nbsp;&nbsp;&nbsp;
                <button class="btn badge-warning" id="unapproveSlider">unApprove</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" id="deleteSlider">Delete</button>
            </p>
            <?php }
                    ?>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <?php $slider->viewSlider(); ?>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php include_once "partials/footer.php";  ?>