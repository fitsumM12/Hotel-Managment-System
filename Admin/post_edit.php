<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"; ?>
<?php include_once "includes/control.php"; ?>
<?php include_once "partials/nav.php"; ?>
<?php include_once "includes/postcontrol.php"; ?>


<div class="col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <center>Edit Post</center>
            </h4>
            <?php
            // SELECT `p_id`, `p_title`, `p_description`, `p_photo`, `p_date`, `status`, `p_author` FROM `posts` WHERE 1
                                if(!isset($_GET['Edit'])){
                                    echo "<p style='color:red; margin-top:10px;'>select a service which has to be edited!!</p>";
                                }
                                else{
                                    
                                    $rows =$post-> editPost();
                                    $p_id = $rows['p_id'];
                                    $p_title = $rows['p_title'];
                                    $p_description = $rows['p_description'];
                                    $p_author = $rows['p_author'];
                                    $p_status = $rows['status'];
                                    $p_date = $rows['p_date'];
                               ?>



            <form class="forms-sample" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="postTitle">Post Title</label>
                    <input type="text" class="form-control" name="postTitle" id="postTitle"
                        value="<?php echo $p_title; ?>" placeholder="Name" required>
                </div>


                <div class="form-group">
                    <label for="postDescription">Post Description</label>
                    <textarea class="form-control" name="postDescription" id="postDescription"
                        rows="4"> <?php echo $p_description; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="postAuthor">Author</label>
                    <select class='form-control' name="postAuthor" id='postAuthor'>
                        <?php fetchAuthor(); ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="postCategory">Category</label>
                    <select class='form-control' name="postCategory" id='postCategory'>
                        <?php fetchCategory(); ?>
                    </select>

                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" value="<?php echo $p_date; ?>" name="date" class="form-control" id="date">
                </div>
                <button type="submit" value="<?php echo $p_id; ?>" name="updatePost"
                    class="btn btn-primary mr-2">Update</button>
            </form>


            <?php }
                                ?>


        </div>
    </div>
</div>

<?php include_once "partials/footer.php";  ?>