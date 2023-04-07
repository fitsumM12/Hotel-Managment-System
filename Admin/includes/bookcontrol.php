<?php 
include_once "db.inc.php";

class Book{
    public function viewBook(){
        GLOBAL $conn;
        $sql ="SELECT * FROM `reservation` WHERE 1";
        try{
            $result = $conn->query($sql);
            while($rows = $result->fetch_assoc()){
            echo"
            <tr>
            <td>
            <input type='checkbox' id='selectedPost' name='selectedPost[]' value=".$rows['id']."></input></td>
                <td>".$rows['name']."</td>
                <td>".$rows['arrival_date']."</td>
                <td>".$rows['departure_date']."</td>
                <td>".$rows['room_id']."</td>
                <td>".$rows['status']."</td>
                
                <td><label class='badge badge-success'><a href='book_preview?p_id=".$rows['id']."'>VIEW</a></label></td>
                <td><label class='badge badge-success'><a href='book_view?free_id =".$rows['room_id']."'>Free</a></label></td>
            </tr>
                
            ";
            }
        }catch(Exception $e){
            
            $e=$e->getMessage();
            Header("Location: error_message?message=$e");
        }
    }
    public function fetchBook(){
        global $conn;
        if(isset($_GET['p_id'])){
            $p_id = $_GET['p_id'];
            $sql = "SELECT * FROM `reservation` WHERE  `id`='$p_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo '
            <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <address>
                        <img src="../Homepage/images/1.jpg"  style="border-radius:15px" alt="" width="auto" height="200px">
                        <br>
                            <p class="font-weight-bold">Customer Details</p>
                            <p>Name: '.$row['name'].'</p>
                            <p>Email: '.$row['email'].'</p>
                            <p> Contact: '.$row['mobile'].'</p>
                        </address>
                    </div>
                    <div class="col-md-6">
                    <div class="dropdown">
                    
                        <address class="text-primary">
                        <p class="font-weight-bold"> Room Details: </p>
                        <p class="mb-2"> Room ID: '.$row['room_id'].'</p>
                        <p class="mb-2"> Room Type: '.$row['room_type'].'</p>
                        <p class="mb-2"> Room No: '.$row['no_of_room'].'</p>
                            
                        </address>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Arrival and Departure Date </h4>
                </p>
                <p> Arrival Date: '.$row['arrival_date'].' Arrival Time '.$row['arrival_time'].'</p>
                <p> Departure Date: '.$row['departure_date'].' Departure Time '.$row['departure_time'].'</p>
            </div>
        </div>
            
            ';
        }
      
    }
    
    public function freeRoom()
     {
        global $conn;
        if(isset($_GET['free_id'])){
            $_id = $_GET['free_id'];
            // Update reservation
            $query1 = "UPDATE `reservation` SET `status`='used' WHERE `room_id`='$_id'";
            $conn->query($query1);
               
                $query3 = "UPDATE `room` SET `room_status`='free' WHERE `room_id`='$_id'";
                $conn->query($query3);
         
            
            
        }
        
    }
    
}
$book = new Book();
$book->freeRoom();
?>