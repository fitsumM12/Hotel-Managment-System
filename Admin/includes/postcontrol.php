<?php 
include_once "db.inc.php";

class Post{
    public function viewPost(){
        GLOBAL $conn;
        $sql ="SELECT `p_id`, `p_title`, `p_description`, `p_photo`, `p_date`, `status`, `p_author` FROM `posts` WHERE 1";
        try{
            $result = $conn->query($sql);
            while($rows = $result->fetch_assoc()){
                $s_author = $rows['p_author'];
                $sql2 = "SELECT `tm_name` FROM `team_members` WHERE `tm_id`='$s_author'";
                $result2 = $conn->query($sql2);
                $rows2 = $result2->fetch_assoc();
            echo"
            <tr>
            <td>
            <input type='checkbox' id='selectedPost' name='selectedPost[]' value=".$rows['p_id']."></input></td>
                <td>".$rows['p_title']."</td>
                <td>".$rows2['tm_name']."</td>
                <td>".$rows['p_date']."</td>
                <td><label class='badge '>".$rows['status']."</label></td>
                
                <td><label class='badge badge-success'><a href='post_preview?p_id=".$rows['p_id']."'>VIEW</a></label></td>
            </tr>
                
            ";
            }
        }catch(Exception $e){
            
            $e=$e->getMessage();
            Header("Location: error_message?message=$e");
        }
    }
    public function fetchPost(){
        global $conn;
        if(isset($_GET['p_id'])){
            $p_id = $_GET['p_id'];
            $sql = "SELECT `p_id`, `p_title`, `p_description`, `p_photo`, `p_date`,`p_cat`, `status`, `p_author` FROM `posts` WHERE  `p_id`='$p_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo '
            <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <address>
                        <img src="../Home/images/blog/'.$row['p_photo'].'"  style="border-radius:15px" alt="" width="auto" height="200px">
                        <br>
                            <p class="font-weight-bold">Title</p>
                            <p>'.$row['p_title'].'</p>
                            <p class="font-weight-bold">Status:</p>
                            <p> '.$row['status'].'</p>
                        </address>
                    </div>
                    <div class="col-md-6">
                    <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Setting </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <a class="dropdown-item" href="post_image_setting?Edit='.$p_id.'">Update Image</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="post_edit?Edit='.$p_id.'">Update Content</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="post_comment?p_id='.$p_id.'">Manage Comment</a>
                    </div>
                        <address class="text-primary">
                        <p class="font-weight-bold"> Author ID: </p>
                        <p class="mb-2"> '.$row['p_author'].'</p>
                        <p class="font-weight-bold"> Category ID: </p>
                        <p class="mb-2"> '.$row['p_cat'].'</p>
                            <p class="font-weight-bold"> Date:</p>
                            <p class="mb-2">'.$row['p_date'].'</p>
                            
                        </address>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Description</h4>
                </p>
                <p class="lead">'.$row['p_description'].'</p>
            </div>
        </div>
            
            ';
        }
      
    }
    public function editPost(){
        GLOBAL $conn;
        try{
            if(isset($_GET['Edit'])){
                $p_id = $_GET['Edit'];
                $query = "SELECT * FROM `posts` WHERE `p_id`='$p_id' limit 1";  
                $result =NULL;
                
                if(!$conn->query($query)){
                    throw new Exception("Erron in Syntax");
                }
                else{
                    $result  = $conn->query($query);
                    return $rows = $result->fetch_assoc();
                }   
            } 
        }catch(Exception $e)
        {
            $e=$e->getMessage();
            Header("Location: error_message?message=$e");        
        }
    }
    public function updatePost(){
        GLOBAL $conn;
        if(isset($_POST['updatePost'])){
            $p_id = $_POST['updatePost'];
            $postTitle = $conn->real_escape_string($_POST['postTitle']);
            $postDescription = $conn->real_escape_string($_POST['postDescription']);
            $postAuthor = $conn->real_escape_string($_POST['postAuthor']);
            $postCategory = $conn->real_escape_string($_POST['postCategory']);
            $postDate = $_POST['date'];
            $sql = "UPDATE `posts` SET `p_title`='$postTitle',`p_description`='$postDescription',`p_date`='$postDate',`p_cat`='$postCategory',`p_author`='$postAuthor' WHERE  `p_id`=$p_id";
            try{
                if($conn->query($sql)){
                    
                    $conn->query($query);
                    echo "<script>alert('update')</script>";
                    Header("Location: post_preview?p_id=$p_id"); 
                }else{ 
                    throw new Exception("Incorrect syntax");
                }
            }catch(Exceptionn $e){
                $e=$e->getMessage();
                Header("Location: error_message?message=$e");  
            }
            
        }
    }
    public function updatePostImage(){
        GLOBAL $conn;
        
            if(isset($_POST['updatePostImage'])){
                $p_id = $_POST['updatePostImage'];
                
            // handling the file or the image
            $img=$_FILES['img']['name'];
            $img_type=$_FILES['img']['type'];
            $img_tmp_name=$_FILES['img']['tmp_name'];
            $img_size=$_FILES['img']['size'];
        
            try{
                if($img_type=="image/jpeg" || $img_type=="image/jpg" || $img_type=="image/png" || $img_type=="image/gif"){
                    if($img_size<=50000000){
                        $pic_name=time()."_".$img;
                        move_uploaded_file($img_tmp_name,"../Home/images/blog/".$pic_name);
                        $query = "UPDATE `posts` SET `p_photo`='$pic_name' WHERE `p_id`='$p_id'";
                    
                        if($conn->query($query)){
                            
                            Header("Location: post_preview?p_id=$p_id");
                        }
                        else{
                            throw new Exception("Query error".$conn->error);
                        }
                    }
                    else{
                        throw new Exception("The image size should be less than 50Mb");
                    }
                }
                else{
                throw new Exception("Image type should be JPEG, JPG ,PNG ,GIF.<br> TRY AGAIN");
                }
            }
        catch(Exception $e){
            $e=$e->getMessage();
            Header("Location: error_message? message=$e");
        }
     }
    }
    public function addPost(){
        GLOBAL $conn;
        if(isset($_POST['addPost'])){
            $postTitle = $conn->real_escape_string($_POST['postTitle']);
            $postDescription = $conn->real_escape_string($_POST['postDescription']);
            $postAuthor = $conn->real_escape_string($_POST['postAuthor']);
            $postCategory = $conn->real_escape_string($_POST['postCategory']);
            $date = $_POST['date'];
            // handling the file or the image
            $img=$_FILES['img']['name'];
            $img_type=$_FILES['img']['type'];
            $img_tmp_name=$_FILES['img']['tmp_name'];
            $img_size=$_FILES['img']['size'];
            
            try{
                if($img_type=="image/jpeg" || $img_type=="image/jpg" || $img_type=="image/png" || $img_type=="image/gif"){
                    if($img_size<=50000000){
                    $pic_name=time()."_".$img;
                    move_uploaded_file($img_tmp_name,"../Home/images/blog/".$pic_name);
                    $query = "INSERT INTO `posts`(`p_title`, `p_description`, `p_photo`, `p_date`,`p_cat`,`p_author`) VALUES ('$postTitle','$postDescription','$pic_name','$date','$postCategory','$postAuthor')";
                   
                    if(!$conn->query($query)){
                        throw new Exception("Query error".$conn->error);
                    }
                    else{
                        $message ="Updated Successfully";
                        Header("Location: post_view?message=$message");
                    }
                    }
                    else{
                        throw new Exception("The image size should be less than 50Mb");
                    }
                }
                else{
                   throw new Exception("Image type should be JPEG, JPG ,PNG ,GIF.<br> TRY AGAIN");
                }
            }
            catch(Exception $e){
                $e=$e->getMessage();
                Header("Location: error_message?message=$e");
            }
        }
    }
    public function approvePost()
        {
        global $conn;
        if(isset($_GET['approvePost'])){
            foreach($_POST['selectedPost'] as $p_id)
            {
                $query ="UPDATE `posts` SET `status`='approved' WHERE `p_id`='$p_id'";
                $conn->query($query);
            }
        }
        
    }
    public function unapprovePost()
     {
        global $conn;
        if(isset($_GET['unapprovePost'])){
            foreach($_POST['selectedPost'] as $p_id)
            {
                $query ="UPDATE `posts` SET `status`='unapproved' WHERE `p_id`='$p_id'";
                $conn->query($query);
            }
        }
        
    }
    public function deletePost()
     {
        global $conn;
        if(isset($_GET['deletePost'])){
            foreach($_POST['selectedPost'] as $p_id)
            {
                $query = "DELETE FROM `posts` WHERE `p_id`='$p_id'";
                $conn->query($query);
            }
        }
        
    }
    
}
$post = new Post();
$post->updatePost();
$post->updatePostImage();
$post->addPost();
$post->approvePost();
$post->unapprovePost();
$post->deletePost();
?>