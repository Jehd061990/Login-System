<?php 
    include('config/constants.php');

    $user_id = $_REQUEST['id'];
    $user_name = $_REQUEST['un'];
    // echo $user_id;

    $save_un = "UPDATE admin_tbl SET admin_nm = '$user_name' WHERE id = $user_id";
    $save_un_conn = mysqli_query($conn,$save_un);
    
    if($save_un_conn == true)
    {
        echo $user_name;
    }
?>