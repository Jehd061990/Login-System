<?php 
    include('config/constants.php');

    $user_id = $_REQUEST['id'];
    $user_password = $_REQUEST['pw'];
    // echo $user_id;

    $save_pw = "UPDATE admin_tbl SET admin_pw = '$user_password' WHERE id = $user_id";
    $save_pw_conn = mysqli_query($conn,$save_pw);
    
    if($save_pw_conn == true)
    {
        echo $user_password;
    }
?>