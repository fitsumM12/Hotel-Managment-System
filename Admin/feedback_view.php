<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"; ?>
<?php include_once "includes/control.php"; ?>
<?php include_once "includes/feedbackcontrol.php"; ?>

<?php include_once "partials/nav.php"; ?>

<!-- partial -->
<div class="col-md-12 grid-margin stretch-card">
    <?php $feedback->fetchFeedback(); ?>
</div>

<?php include_once "partials/footer.php";  ?>