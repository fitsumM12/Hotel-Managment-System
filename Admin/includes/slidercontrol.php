<?php 
include_once "db.inc.php";

class Slider{
    public function viewSlider(){
        GLOBAL $conn;
        $sql ="SELECT `sl_id`, `sl_title`, `sl_subtitle`,`sl_status` FROM `slider` WHERE 1";
        try{
            $result = $conn->query($sql);
            while($rows = $result->fetch_assoc()){
              
            echo"
            <tr>
            <td>
            <input type='checkbox' id='selectedPost' name='selectedPost[]' value=".$rows['sl_id']."></input></td>
                <td>".$rows['sl_title']."</td>
                <td>".$rows['sl_subtitle']."</td>
                <td>".$rows['sl_status']."</td>
                <td><label class='badge badge-success'><a href='slider_preview?sl_id=".$rows['sl_id']."'>VIEW</a></label></td>
            </tr>
                
            ";
            }
        }catch(Exception $e){
            
            $e=$e->getMessage();
            Header("Location: error_message?message=$e");
        }
    }
    public function fetchSlider(){
        global $conn;
        if(isset($_GET['sl_id'])){
            $sl_id= $_GET['sl_id'];
            $sql = "SELECT `sl_id`, `sl_title`, `sl_subtitle`, `sl_image`, `link`, `sl_status` FROM `slider` WHERE   `sl_id`='$sl_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo '
            <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <address>
                        <img src="../Home/images/slider/'.$row['sl_image'].'"  style="border-radius:15px" alt="" width="auto" height="200px">
                        <br>
                            <p class="font-weight-bold">Title</p>
                            <p>'.$row['sl_title'].'</p>
                            <p class="font-weight-bold">Subtitle:</p>
                            <p> '.$row['sl_subtitle'].'</p>
                        </address>
                    </div>
                    <div class="col-md-6">';
        if($_SESSION['tm_role']=='admin'){
        echo'<div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Setting </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <a class="dropdown-item" href="slider_image_setting?Edit='.$sl_id.'">Update Image</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="slider_edit?Edit='.$sl_id.'">Update Content</a>
        </div>
         
        </div> ';
     }
                    echo'
                      <address class="text-primary">
                    <p class="font-weight-bold">status: </p>
                    <p class="mb-2"> '.$row['sl_status'].'</p>
                    <p class="font-weight-bold"> Link: </p>
                    <p class="mb-2"> '.$row['link'].'
                   </p>
                        
                    </address>
                </div>
            </div>
           
        </div>
            
            ';
        }
      
    }
    public function editSlider(){
        GLOBAL $conn;
        try{
            if(isset($_GET['Edit'])){
                $sl_id = $_GET['Edit'];
                $query = "SELECT * FROM `slider` WHERE `sl_id`='$sl_id' limit 1";  
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
    public function updateSliderImage(){
        GLOBAL $conn;
        
            if(isset($_POST['updateSliderImage'])){
                $sl_id = $_POST['updateSliderImage'];
                
            // handling the file or the image
            $img=$_FILES['img']['name'];
            $img_type=$_FILES['img']['type'];
            $img_tmp_name=$_FILES['img']['tmp_name'];
            $img_size=$_FILES['img']['size'];
        
            try{
                if($img_type=="image/jpeg" || $img_type=="image/jpg" || $img_type=="image/png" || $img_type=="image/gif"){
                    if($img_size<=50000000){
                        $pic_name=time()."_slider_".$img;
                        move_uploaded_file($img_tmp_name,"../Home/images/slider/".$pic_name);
                        $query = "UPDATE `slider` SET `sl_image`='$pic_name' WHERE `sl_id`='$sl_id'";
                    
                        if($conn->query($query)){
                            
                            Header("Location: slider_preview?sl_id=$sl_id");
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
    public function updateSlider(){
        GLOBAL $conn;
        if(isset($_POST['updateSlider'])){
            $sl_id = $_POST['updateSlider'];
            $sliderTitle = $conn->real_escape_string($_POST['sliderTitle']);
            $sliderSubtitle = $conn->real_escape_string($_POST['sliderSubtitle']);
            $link = $conn->real_escape_string($_POST['sliderLink']);
            $sql = "UPDATE `slider` SET `sl_title`='$sliderTitle',`sl_subtitle`='$sliderSubtitle', `link`='$link' WHERE  `sl_id`='$sl_id'";
            try{
                if($conn->query($sql)){
                    
                    $conn->query($query);
                    Header("Location: slider_preview?sl_id=$sl_id"); 
                }else{ 
                    throw new Exception("Incorrect syntax");
                }
            }catch(Exceptionn $e){
                $e=$e->getMessage();
                Header("Location: error_message?message=$e");  
            }
            
        }
    }
    public function addSlider(){
        GLOBAL $conn;
        if(isset($_POST['addSlider'])){
            $sliderTitle = $conn->real_escape_string($_POST['sliderTitle']);
            $sliderSubtitle = $conn->real_escape_string($_POST['sliderSubtitle']);
            $link = $conn->real_escape_string($_POST['link']);
            // handling the file or the image
            $img=$_FILES['img']['name'];
            $img_type=$_FILES['img']['type'];
            $img_tmp_name=$_FILES['img']['tmp_name'];
            $img_size=$_FILES['img']['size'];
            
            try{
                if($img_type=="image/jpeg" || $img_type=="image/jpg" || $img_type=="image/png" || $img_type=="image/gif"){
                    if($img_size<=50000000){
                    $pic_name=time()."_slider_".$img;
                    move_uploaded_file($img_tmp_name,"../Home/images/slider/".$pic_name);
                    $query = "INSERT INTO `slider`( `sl_title`, `sl_subtitle`, `sl_image`, `link`) VALUES ('$sliderTitle','$sliderSubtitle','$pic_name','$link')";
                   
                    if(!$conn->query($query)){
                        throw new Exception("Query error".$conn->error);
                    }
                    else{
                        $message ="Updated Successfully";
                        Header("Location: slider_view?message=$message");
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
    public function approveSlider()
        {
            global $conn;
            if(isset($_GET['approveSlider'])){
                foreach($_POST['selectedSlider'] as $sl_id)
                {
                    $query = "UPDATE `slider` SET `sl_status`='approved' WHERE `sl_id`='$sl_id'";
                    $conn->query($query);
                }
            }
            
    }
    public function unapproveSlider()
        {
            global $conn;
            if(isset($_GET['unapproveSlider'])){
                foreach($_POST['selectedSlider'] as $sl_id)
                {
                    $query = "UPDATE `slider` SET `sl_status`='unapproved' WHERE `sl_id`='$sl_id'";
                    $conn->query($query);
                }
            }
            
    }
    public function deleteSlider()
        {
            global $conn;
            if(isset($_GET['deleteSlider'])){
                foreach($_POST['selectedSlider'] as $sl_id)
                {
                    $query = "DELETE FROM `slider` WHERE `sl_id`='$sl_id'";
                    $conn->query($query);
                }
            }
    
    }

}
$slider = new Slider();
$slider->updateSliderImage();
$slider->updateSlider();
$slider->addSlider();
$slider->approveSlider();
$slider->unapproveSlider();
$slider->deleteSlider();
?>