<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"; ?>
<?php include_once "includes/control.php"; ?>
<?php include_once "includes/companycontrol.php"; ?>
<?php include_once "partials/nav.php"; ?>

<div class="col-md-12 grid-margin stretch-card">
    <?php $company->fetchCompany(); ?>
</div>

<?php include_once "partials/footer.php";  ?>