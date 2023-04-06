<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"; ?>

<?php include_once "includes/commentcontrol.php"; ?>
<?php include_once "partials/nav.php"; ?>
<?php include_once "includes/control.php"; ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Post Comment Section</h4>
            <p class="card-description">View and<code>approve/disapprove/delete option</code>
            </p>
            <p class="text-right"><button class="btn btn-success" id="approveComment">Approve</button>&nbsp;&nbsp;&nbsp;
                <button class="btn badge-warning" id="unapproveComment">unApprove</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" id="deleteComment">Delete</button>
            </p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $comment->viewComment();
                            ?>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php include_once "partials/footer.php";  ?>