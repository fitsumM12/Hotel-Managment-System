<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"; ?>
<?php include_once "includes/control.php"; ?>
<?php include_once "includes/companycontrol.php"; ?>

<?php include_once "partials/nav.php"; ?>

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <?php
                                if(isset($_GET['Edit'])){
                                $rows = $company->editCompany();
                                $id = $rows['id'];
                                $place = $rows['address'];
                                $facebook = $rows['facebook'];
                                $email = $rows['email'];
                                $twitter = $rows['twitter'];
                                $contact1 = $rows['contact'];
                               ?>

                <div class="col-md-8">
                    <h4 class="card-title">

                        <h2 class="text-center">ADDRESS AND SOCIAL MEDIA</h2>
                    </h4>

                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="place">Address:</label>
                            <input type="text" class="form-control" placeholder="street, city" name="place"
                                value="<?php echo $place; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" placeholder="@zementech.com" name="email"
                                value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="contact1">Tele 1:</label>
                            <input type="text" class="form-control" placeholder="+2519....." name="contact1"
                                value="<?php echo $contact1; ?>">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter Address:</label>
                            <input type="text" class="form-control" placeholder="https://www.twitter.com/***"
                                name="twitter" value="<?php echo $twitter; ?>">
                        </div>
                        <button type="submit" name="updateCompanySocialMedia" value="<?php echo  $id; ?>"
                            class="btn btn-primary mr-2">Update</button>
                    </form>


                </div>

                <?php
                echo '<div class="col-md-4">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Setting </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <a class="dropdown-item" href="company_logo_setting?Edit='.$id.'">Update Image</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="company_edit?Edit='.$id.'">Update Content</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="company_address?Edit='.$id.'">Update Social
                            address</a>
                    </div>

                </div>
            </div>';
                            }
                            else{
                                echo "<p style='color:red; margin-top:10px;'>select a company which has to be edited!!</p>";
                            }
                            ?>
            </div>

        </div>
    </div>
</div>
<?php include_once "partials/footer.php";  ?>