<?php 
include_once "db.inc.php";

class Comment{
    public function viewComment(){
        GLOBAL $conn;
        if($_GET['p_id']){
            $p_id = $_GET['p_id'];
        $sql ="SELECT `c_id`, `c_uname`, `c_uemail`, `c_message`, `c_status`, `created`, `updated` FROM `comments` WHERE `p_id`='$p_id'";
        try{
            $result = $conn->query($sql);
            while($rows = $result->fetch_assoc()){
                
    
            echo"
            <tr>
            <td>
            <input type='checkbox' id='selectedComment' name='selectedComment[]' value=".$rows['c_id']."></input></td>
                <td>".$rows['c_uname']."</td>
                <td>".$rows['c_message']."</td>
                <td>".$rows['c_status']."</td>
                
                <td><label class='badge badge-success'><a href='post_comment_preview?c_id=".$rows['c_id']."'>VIEW</a></label></td>
            </tr>
                
            ";
            }
        }catch(Exception $e){
            
            $e=$e->getMessage();
            Header("Location: error_message?message=$e");
        }
        }
    }
    public function fetchComment(){
        global $conn;
        if(isset($_GET['c_id'])){
            $c_id = $_GET['c_id'];
            $sql = "SELECT `c_uname`, `c_uemail`, `c_message`, `c_status`, `created`, `updated`, `p_id` FROM `comments` WHERE `c_id`='$c_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo '
            <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <address>
                            <p class="font-weight-bold">Name</p>
                            <p>'.$row['c_uname'].'</p>
                            <p class="font-weight-bold">Email:</p>
                            <p> '.$row['c_uemail'].'</p>
                            <p class="font-weight-bold">status:</p>
                            <p> '.$row['c_status'].'</p>
                        </address>
                    </div>
                    <div class="col-md-6">
                   
                        <address class="text-primary">
                        <p class="font-weight-bold"> post ID: </p>
                        <p class="mb-2"> '.$row['p_id'].'</p>
                        <p class="font-weight-bold"> Created Date: </p>
                        <p class="mb-2"> '.$row['created'].'</p>
                            <p class="font-weight-bold"> Updated Date:</p>
                            <p class="mb-2">'.$row['updated'].'</p>
                            
                        </address>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Message</h4>
                </p>
                <p class="lead">'.$row['c_message'].'</p>
            </div>
        </div>
            
            ';
        }
      
    }
    public function deleteComment()
     {
        global $conn;
        if(isset($_GET['deleteComment'])){
            foreach($_POST['selectedComment'] as $c_id)
        {
            $query = "DELETE FROM `comments` WHERE `c_id`='$c_id'";
            $conn->query($query);
        }
        }
        
    }
    public function unapproveComment()
     {
        global $conn;
        if(isset($_GET['unapproveComment'])){
            foreach($_POST['selectedComment'] as $c_id)
        {
            $query = "UPDATE `comments` SET `c_status`='unapproved' WHERE `c_id`='$c_id'";
            $conn->query($query);
        }
        }
        
    }
    public function approveComment()
     {
        global $conn;
        if(isset($_GET['approveComment'])){
            foreach($_POST['selectedComment'] as $c_id)
        {
            $query = "UPDATE `comments` SET `c_status`='approved' WHERE `c_id`='$c_id'";
            $conn->query($query);
        }
        }
        
    }
}
$comment = new Comment();
$comment->approveComment();
$comment->unapproveComment();
$comment->deleteComment();