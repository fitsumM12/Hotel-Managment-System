<!-- Making  database connection -->
<?php
class Connection extends Exception{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "hms";
    public function connect(){
        try{
            if(!mysqli_connect($this->servername, $this->username, $this->password, $this->dbname)){
                throw new Exception("Connection Failed");
            }
            else  if($con = new mysqli($this->servername, $this->username, $this->password, $this->dbname)){
                return $con;
            }
            else{
                echo "Something unknown occured";
            }
        }catch(Exception $e){
            // Exception Handled here
            $e = $e->getMessage();
            Header("Location: error_message.php?message=$e");
        }
    }
}
// Creation of object to connect with database
$obj = new Connection();
$conn = $obj->connect();
?>