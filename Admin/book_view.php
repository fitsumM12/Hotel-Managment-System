<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"; ?>
<?php include_once "includes/bookcontrol.php"; ?>
<?php include_once "partials/nav.php"; ?>
<?php include_once "includes/control.php"; ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ticket Book Management Section </h4>
            <p class="card-description">View and<code>Control option</code>
            </p>
            

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Name</th>
                            <th>Arrival Date</th>
                            <th>Departure Date</th>
                            <th>Room ID</th>
                            <th>Status</th>
                            <th></th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <?php $book->viewBook(); ?>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php include_once "partials/footer.php";  ?>