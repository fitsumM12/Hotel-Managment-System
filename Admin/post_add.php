<!DOCTYPE html>
<html lang="en">

<?php include_once "includes/postcontrol.php"; ?>
<?php include_once "partials/head.php"; ?>
<?php include_once "includes/control.php"; ?>
<?php include_once "partials/nav.php"; ?>

<div class="col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <center>Add Post</center>
            </h4>

            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="postTitle">Post Title</label>
                    <input type="text" class="form-control" name="postTitle" id="postTitle" placeholder="post title"
                        required>
                </div>
                <!-- INSERT INTO `posts`(`p_id`, `p_title`, `p_description`, `p_photo`, `p_date`, `status`, `p_author`) -->
                <div class="form-group">
                    <label for="postDescription">Service Description</label>
                    <textarea class="form-control" placeholder="write a description" name="postDescription"
                        id="postDescription" rows="6" required></textarea>
                </div>
                <div class="form-group">
                    <label for="postAuthor">Author</label>
                    <select class='form-control' name="postAuthor" id='postAuthor' required>
                        <!-- <option>Select Author</option> -->
                        <?php fetchAuthor(); ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="postCategory">Category</label>
                    <select class='form-control' name="postCategory" id='postCategory' required>
                        <!-- <option>Select Author</option> -->
                        <?php fetchCategory(); ?>
                    </select>

                </div>
                <div class="form-group">
                    <label>Icon/Image</label>
                    <input type="file" accept="image/*" name="img" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" id="date" required>
                </div>
                <button type="submit" name="addPost" class="btn btn-primary mr-2">Add post</button>
            </form>
        </div>
    </div>
</div>



<?php include_once "partials/footer.php";  ?>