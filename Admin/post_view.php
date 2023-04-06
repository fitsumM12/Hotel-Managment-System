<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"; ?>
<?php include_once "includes/postcontrol.php"; ?>
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
            <p class="text-right"><button class="btn btn-success" id="approvePost">Approve</button>&nbsp;&nbsp;&nbsp;
                <button class="btn badge-warning" id="unapprovePost">unApprove</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" id="deletePost">Delete</button>
            </p>
            <?php }
                    ?>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <?php $post->viewPost(); ?>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php include_once "partials/footer.php";  ?>