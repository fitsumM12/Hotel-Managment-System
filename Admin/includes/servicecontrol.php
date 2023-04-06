<?php 
include_once "db.inc.php";

class Service{
    public function deleteService(){
        global $conn;
        if(isset($_GET['deleteService'])){
            foreach($_POST['selectedService'] as $s_id)
            {
                $query = "DELETE FROM `services` WHERE `id`='$s_id'";
                $conn->query($query);
            }
        }
    }
    public function updateService(){
        GLOBAL $conn;
        if(isset($_POST['updateService'])){
            $s_id = $_POST['updateService'];
            $serviceTitle = $conn->real_escape_string($_POST['serviceTitle']);
            $serviceDescription = $conn->real_escape_string($_POST['serviceDescription']);
            // $serviceAuthor = $conn->real_escape_string($_POST['serviceAuthor']);
            // $serviceIcon = $conn->real_escape_string($_POST['serviceIcon']);
            // $date = $_POST['date'];
            $sql = "UPDATE `services` SET `title`='$serviceTitle ',`message`='$serviceDescription' WHERE `id`=$s_id";
            try{
                if($conn->query($sql)){
                    header('Location: service_view');
                    exit;
 
                }else{ 
                    throw new Exception("Incorrect syntax");
                }
            }catch(Exceptionn $e){
                $e=$e->getMessage();
                Header("Location: error_message?message=$e");  
            }
            
        }
    }
    // public function updateServiceImage(){
    //     GLOBAL $conn;
        
    //         if(isset($_POST['updateServiceImage'])){
    //             $s_id = $_POST['updateServiceImage'];
                
    //         // handling the file or the image
    //         $img=$_FILES['img']['name'];
    //         $img_type=$_FILES['img']['type'];
    //         $img_tmp_name=$_FILES['img']['tmp_name'];
    //         $img_size=$_FILES['img']['size'];
        
    //         try{
    //             if($img_type=="image/jpeg" || $img_type=="image/jpg" || $img_type=="image/png" || $img_type=="image/gif"){
    //                 if($img_size<=50000000){
    //                     $pic_name=time()."_".$img;
    //                     move_uploaded_file($img_tmp_name,"../Image/".$pic_name);
    //                     $query = "UPDATE `services` SET `s_image`='$pic_name' WHERE `s_id`='$s_id'";
                    
    //                     if($conn->query($query)){
                            
    //                         Header("Location: service_preview?s_id=$s_id");
    //                     }
    //                     else{
    //                         throw new Exception("Query error".$conn->error);
    //                     }
    //                 }
    //                 else{
    //                     throw new Exception("The image size should be less than 50Mb");
    //                 }
    //             }
    //             else{
    //             throw new Exception("Image type should be JPEG, JPG ,PNG ,GIF.<br> TRY AGAIN");
    //             }
    //         }
    //     catch(Exception $e){
    //         $e=$e->getMessage();
    //         Header("Location: error_message? message=$e");
    //     }
    //     }
    // }
    public function viewService(){
        GLOBAL $conn;
        $sql ="SELECT `id`, `title`, `message`,`image`, `status` FROM `services` WHERE 1";
        try{
            $result = $conn->query($sql);
            while($rows = $result->fetch_assoc()){
            echo"
            <tr>
            <td>
            <input type='checkbox' id='selectedService' name='selectedService[]' value=".$rows['id']."></input></td>
                <td>".$rows['title']."</td>
                <td><label class='badge '>".$rows['status']."</label></td>
                
                <td><label class='badge badge-success'><a href='service_preview?s_id=".$rows['id']."'>VIEW</a></label></td>
            </tr>
                
            ";
            }
        }catch(Exception $e){
            
            $e=$e->getMessage();
            Header("Location: error_message?message=$e");
        }
    }
    public function fetchService(){
        global $conn;
        if(isset($_GET['s_id'])){
            $s_id = $_GET['s_id'];
            $sql = "SELECT `id`, `title`, `message`,`image`, `status` FROM `services` WHERE `id`='$s_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo '
            <div class="card">
            <div class="card-body">
                <div class="row">
                
                    <div class="col-md-6">
                        <address>
                        <br>
                            <p class="font-weight-bold">Title</p>
                            <p>'.$row['title'].'</p>
                            <p class="font-weight-bold">Status:</p>
                            <p> '.$row['status'].'</p>
                        </address>
                    </div>
                    <div class="col-md-6">
                    <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Setting </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      
                      <a class="dropdown-item" href="service_edit?Edit='.$s_id.'">Update Content</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Description</h4>
                </p>
                <p class="lead">'.$row['message'].'</p>
            </div>
        </div>
            
            ';
        }
      
    }
    public function editService(){
        GLOBAL $conn;
        try{
            if(isset($_GET['Edit'])){
                $s_id = $_GET['Edit'];
                $query = "SELECT * FROM `services` WHERE `id`='$s_id' limit 1";  
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
    public function addService(){
        GLOBAL $conn;
        if(isset($_POST['addService'])){
            $serviceTitle = $conn->real_escape_string($_POST['serviceTitle']);
            $serviceDescription = $conn->real_escape_string($_POST['serviceDescription']);
               
            try{ 
                $query = "INSERT INTO `services`(`title`, `message`) VALUES ('$serviceTitle','$serviceDescription')";
                    if(!$conn->query($query)){
                        throw new Exception("Query error".$conn->error);
                    }
                    else{
                        $message ="Updated Successfully";
                        Header("Location: service_view?message=$message");
                    }
                    }catch(Exception $e){
                $e=$e->getMessage();
                Header("Location: error_message?message=$e");
            }
        }
    }
    public function unapproveService()
     {
        global $conn;
        if(isset($_GET['unapproveService'])){
            foreach($_POST['selectedService'] as $s_id)
        {
            $query = "UPDATE `services` SET `status`='unapproved' WHERE `id`='$s_id'";
            if($conn->query($query)){
                echo '<script>
                alert("updated succesfully");
                </script>';
            }
            else{
                echo '<script>
                alert("Not Updated");
                </script>';
            }
        }
        }
        
    }
    public function approveService()
     {
        global $conn;
        if(isset($_GET['approveService'])){
            foreach($_POST['selectedService'] as $s_id)
            {
                $query = "UPDATE `services` SET `status`='approved' WHERE `id`='$s_id'";
                $conn->query($query);
            }
        }
        
    }

}
$service = new Service();
$service->deleteService();
$service->unapproveService();
$service->updateService();
// $service->updateServiceImage();
$service->addService();
$service->approveService();
?>