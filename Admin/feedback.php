<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"; ?>
<?php include_once "includes/control.php"; ?>
<?php include_once "includes/feedbackcontrol.php"; ?>
<?php include_once "partials/nav.php"; ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Feedback</h4>
            <p class="card-description">View and<code>Approve/Delete</code>
            </p>

            <?php
                    if($_SESSION['tm_role']=='admin'){?>
            <p class="text-right"><button class="btn btn-success"
                    id="approveFeedback">Approve</button>&nbsp;&nbsp;&nbsp;
                <button class="btn badge-warning" id="unapproveFeedback">unApprove</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" id="deleteFeedback">Delete</button>
            </p>
            <?php
                    }
            ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Feedback Email</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $feedback->viewFeedback(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?php include_once "partials/footer.php";  ?>