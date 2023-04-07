<?php
function viewProfilePicture(){
    $tm_email = $_SESSION['email'];
    $tm_name = $_SESSION['username'];
    $tm_photo = $_SESSION['tm_photo'];
    echo '
    <div class="navbar-profile">
    <img class="img-xs rounded-circle" src="../Homepage/images/'.$tm_photo.'" alt="">
    <p class="mb-0 d-none d-sm-block navbar-profile-name">'.$tm_name.'</p>
    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
</div>';
}
?>