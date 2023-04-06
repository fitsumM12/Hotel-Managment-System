<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"; ?>
<?php include_once "includes/control.php"; ?>
<?php include_once "includes/servicecontrol.php"; ?>

<?php include_once "partials/nav.php"; ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Service Provided by Company</h4>
            <p class="card-description">View and<code>edit/delete option</code>

            </p>
            <?php
                    if($_SESSION['tm_role']=='admin'){?>
            <p class="text-right"><button class="btn btn-success" id="approveService">Approve</button>&nbsp;&nbsp;&nbsp;
                <button class="btn badge-warning" id="unapproveService">unApprove</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" id="deleteService">Delete</button>
            </p>
            <?php }
                    ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Service Title</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $service->viewService(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once "partials/footer.php";  ?>