<?php 
include_once "db.inc.php";

class Room{
    public function viewRoom (){
        GLOBAL $conn;
        $sql ="SELECT * FROM `room`";
        try{
            $result = $conn->query($sql);
            while($rows = $result->fetch_assoc()){
                // echo "we are here";
            echo "
            <tr>
            <td>
            <input type='checkbox' id='selectedMember' name='selectedMember[]' value=".$rows['room_id']."></input></td>
            <td>".$rows['room_id']."</td> 
            <td>".$rows['room_type']."</td>
            <td>".$rows['room_name']."</td>
            <td>".$rows['room_status']."</td>
            <td><a href='room_preview?tm_id=".$rows['room_id']."'>view</a></td>
        </tr>
                
            ";
            }
        }catch(Exception $e){
        
            $e=$e->getMessage();
            Header("Location: error_message?message=$e");
        }
    }
    public function fetchRoom(){
        global $conn;
        if(isset($_GET['tm_id'])){
            $tm_id = $_GET['tm_id'];
            $sql = "SELECT * FROM `room` WHERE `room_id`='$tm_id' LIMIT 1";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo '<div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <address>
                            <img src="../Homepage/images/'.$row['image'].'" style="border-radius:15px" alt="" width="auto"
                                height="200px" srcset="">
                            <br>
                            <p class="font-weight-bold">ID: </p>
                            <p>'.$row['room_id'].'</p>
                            <p class="font-weight-bold">Name: </p>
                            <p>'.$row['room_type'].'</p>
                            <p class="font-weight-bold">Status:</p>
                            <p> '.$row['room_status'].'</p>
                        </address>
                    </div>
                    <div class="col-md-6">
                    ';
                    if($_SESSION['tm_role']=="admin"){
                        echo ' <div class="col-md-6">
    
    
                       <button class="Primary"><a class="" href="updateRoom?room_id='.$tm_id.'">Update</a></button>
                       <address>
                       <br>
                       <p class="font-weight-bold">Room Name: </p>
                       <p>'.$row['room_name'].'</p>
                       <p class="font-weight-bold">Number of Room: </p>
                       <p>'.$row['no_of_room'].'</p>
                   </address>
                    </div>';
                    }
                   
                       echo ' 
                    </div>
                </div>
            </div>         
            ';
        }
    }
   
    public function updateRoom(){
        GLOBAL $conn;
        if(isset($_POST['updateRoom'])){
            // echo "something";
            $room_id = $_POST['room_id'];
            $room_name = $_POST['room_name'];
            $room_type = $_POST['room_type'];
            $no_of_room = $_POST['no_of_room'];
            $img=$_FILES['img']['name'];
            $img_type=$_FILES['img']['type'];
            $img_tmp_name=$_FILES['img']['tmp_name'];
            $img_size=$_FILES['img']['size'];
        
            try{
                if($img_type=="image/jpeg" || $img_type=="image/jpg" || $img_type=="image/png" || $img_type=="image/gif"){
                    if($img_size<=50000000){
                        $pic_name=time()."_slider_".$img;
                        move_uploaded_file($img_tmp_name,"../Homepage/images/".$pic_name);
                        $sql = "UPDATE `room` SET `room_name`='$room_name',`room_type`='$room_type', `no_of_room`=$no_of_room, `image` ='$pic_name' WHERE  `room_id`=$room_id";

                    
                        if($conn->query($sql)){
                            
                    Header("Location: room_view"); 
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
    public function addRoom(){
        GLOBAL $conn;
        if(isset($_POST['addRoom'])){
            // echo "something";
            $room_name = $_POST['room_name'];
            $room_price = $_POST['room_price'];
            $room_type = $_POST['room_type'];
            $no_of_room = $_POST['no_of_room'];
            $img=$_FILES['img']['name'];
            $img_type=$_FILES['img']['type'];
            $img_tmp_name=$_FILES['img']['tmp_name'];
            $img_size=$_FILES['img']['size'];
        
            try{
                if($img_type=="image/jpeg" || $img_type=="image/jpg" || $img_type=="image/png" || $img_type=="image/gif"){
                    if($img_size<=50000000){
                        $pic_name=time()."_room_".$img;
                        move_uploaded_file($img_tmp_name,"../Homepage/images/".$pic_name);
                        $sql = "INSERT INTO `room`(`room_type`, `room_price`,`room_name`,`image`,`no_of_room`) VALUES('$room_type',$room_price,'$room_name', '$pic_name', $no_of_room)";
                    
                        if($conn->query($sql)){
                            Header("Location: room_view"); 
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
    public function editRoom(){
        GLOBAL $conn;
        if(isset($_GET['room_id'])){
            $room_id = $_GET['room_id'];
            $query = "SELECT * from `room` WHERE `room_id`=$room_id";
            return $conn->query($query);
            // return $result->fetch_assoc();

        }
    }
        public function updateSlider(){
            GLOBAL $conn;
            if(isset($_POST['updateSlider'])){
                $sl_id = $_POST['updateSlider'];
                $sliderTitle = $conn->real_escape_string($_POST['sliderTitle']);
                $sliderSubtitle = $conn->real_escape_string($_POST['sliderSubtitle']);
                // $link = $conn->real_escape_string($_POST['sliderLink']);
                $sql = "UPDATE `slider` SET `title`='$sliderTitle',`subtitle`='$sliderSubtitle' WHERE  `id`='$sl_id'";
                try{
                    if($conn->query($sql)){
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
    
    public function addmember(){
        global $conn;
        if(isset($_POST['addMember'])){
            try{
                $memberName =$conn->real_escape_string($_POST['memberName']);
                $memberEmail = $conn->real_escape_string($_POST['memberEmail']);
                $memberPassword =$conn->real_escape_string($_POST['memberPassword']);
                $memberPassword =  password_hash($memberPassword,PASSWORD_BCRYPT,['cost'=>12]);
                $query = "INSERT INTO `team_members`(`name`, `email`, `password`) VALUES ('$memberName','$memberEmail','$memberPassword')";
                
                if($conn->query($query)){
                    Header("Location: team_view");
                    
                    
                }else{
                    throw new Exception("Incorrect Syntax query3");
                }
            }
            catch(Exception $e){
                $e = $e->getMessage();
                Header("Location: error_message?message=$e");
            }
        }
    }
    public function deleteMember()
     {
        global $conn;
        if(isset($_GET['deleteMember'])){
            foreach($_POST['selectedMember'] as $tm_id)
            {
                $query = "DELETE FROM `room` WHERE `room_id`='$tm_id'";
                $conn->query($query);
            }
        }
        
    }
    public function unapproveMember()
     {
        global $conn;
        if(isset($_GET['unapproveMember'])){
            foreach($_POST['selectedMember'] as $tm_id)
            {
                $query = "UPDATE `room` SET `status`='under maintenance' WHERE `room_id`='$tm_id'";
                $conn->query($query);
            }
        }
        
    }
    public function approveMember()
     {
        global $conn;
        if(isset($_GET['approveMember'])){
            foreach($_POST['selectedMember'] as $tm_id)
            // echo "<p>we are here</p>";
            {
                $query = "UPDATE `room` SET `status`='free' WHERE `room_id`='$tm_id'";
                $conn->query($query);
            }
        }
        
    }
}
$room= new Room();
$room->updateRoom();
$room->addRoom();
$room->approveMember();
$room->unapproveMember();
$room->deleteMember();

?>