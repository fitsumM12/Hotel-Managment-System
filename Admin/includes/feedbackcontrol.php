<?php 
include_once "db.inc.php";


class Feedback{
    public function viewFeedback(){
        GLOBAL $conn;
        $sql ="SELECT `fb_id`, `fb_uname`, `fb_email`, `fb_subject`, `fb_message`, `fb_status` FROM `feedback` WHERE 1";
        try{
            if($result = $conn->query($sql)){
                while($rows = $result->fetch_assoc()){
                    echo"
                <tr>
                    <td><input type='checkbox' id='selectedFeedback' name='selectedFeedback[]' value=".$rows['fb_id']."> </input></td>
                    <td>".$rows['fb_email']."</td>
                    <td>".$rows['fb_subject']."</td>
                    <td><label class='badge'>".$rows['fb_status']."</label></td>
                    
                    <td><label class='badge badge-success'><a href='feedback_view?feedbackID=".$rows['fb_id']."'>VIEW</a></label></td>
                
        
                    
                </tr>
                    
                ";  
                }
              
            }
            else{
                throw new Exception("Syntax error");
            }
            
           
            
        }catch(Exception $e){
            
            $e=$e->getMessage();
            Header("Location: error_message?message=$e");
        }
    }
    public function fetchFeedback(){
        global $conn;
        if(isset($_GET['feedbackID'])){
            $fb_id = $_GET['feedbackID'];
            $sql = "SELECT  `fb_uname`, `fb_email`, `fb_subject`, `fb_message`, `fb_status` FROM `feedback` WHERE `fb_id`='$fb_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo '
            <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <address>
                            <p class="font-weight-bold">Name:</p>
                            <p>'.$row['fb_uname'].'</p>
                            <p class="font-weight-bold">Status:</p>
                            <p> '.$row['fb_status'].'</p>
                        </address>
                    </div>
                    <div class="col-md-6">
                        <address class="text-primary">
                            <p class="font-weight-bold"> E-mail: </p>
                            <p class="mb-2"> '.$row['fb_email'].'</p>
                            <p class="font-weight-bold"> Subject:</p>
                            <p class="mb-2">'.$row['fb_subject'].'</p>
                        </address>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Message</h4>
                </p>
                <p class="lead">'.$row['fb_message'].'</p>
            </div>
        </div>
            
            ';
        }
      
    }
    public function deleteFeedback()
     {
        global $conn;
        if(isset($_GET['deleteFeedback'])){
            foreach($_POST['selectedFeedback'] as $fb_id)
        {
            $query = "DELETE FROM `feedback` WHERE `fb_id`='$fb_id'";
            $conn->query($query);
        }
        }
        
    }
    public function unapproveFeedback()
     {
        global $conn;
        if(isset($_GET['unapproveFeedback'])){
            foreach($_POST['selectedFeedback'] as $fb_id)
        {
            $query = "UPDATE `feedback` SET `fb_status`='unapproved' WHERE `fb_id`='$fb_id'";
            $conn->query($query);
        }
        }
        
    }
    public function approveFeedback()
     {
        global $conn;
        if(isset($_GET['approveFeedback'])){
            foreach($_POST['selectedFeedback'] as $fb_id)
        {
            $query = "UPDATE `feedback` SET `fb_status`='approved' WHERE `fb_id`='$fb_id'";
            $conn->query($query);
        }
        }
        
    }
}
$feedback  = new Feedback();

$feedback->approveFeedback();
$feedback->unapproveFeedback();
$feedback->deleteFeedback();


?>