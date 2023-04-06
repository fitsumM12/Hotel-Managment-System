<?php 
echo "we are here";
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("Location: ../../home/index"); //to redirect back to homr
exit();
?>