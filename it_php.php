<?php include('config/constants.php');?>


<?php
    $it_id = $_GET['it_id'];
    $it_un = $_GET['it_un'];
    $it_pw = $_GET['it_pw'];

    echo $it_id;
    echo $it_un;
    echo $it_pw;

    $check = "SELECT * FROM it_tbl WHERE user_nm = '$it_un' AND user_pw = '$it_pw' ";
    $check_conn = mysqli_query($conn,$check);
    $check_num = mysqli_num_rows($check_conn);
    if($check_num==1)
    {
        header('location:'.SITEURL.'smad/it_patron.php');
        $_SESSION['group_id'] = $it_id;
    }
    else
    {
        header('location:'.SITEURL.'smad/loginform.php');
        $_SESSION['failmanage'] = "please login properly";
    }

    // echo "nice";
?>

