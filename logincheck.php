<?php include('config/constants.php');?>
<?php

    // Client Side login System
        $admin_in = mysqli_real_escape_string($conn, $_POST['admin']);
        // $admin_in = 'smadadmin';


        $sql1= "SELECT * FROM admin_tbl WHERE barcode='$admin_in'";

        $res1 = mysqli_query($conn,$sql1);

        $count = mysqli_num_rows($res1);

        if($count==1)
        {
            header('location:'.SITEURL.'smad/sila.php');
            $_SESSION['mybarcode'] = $admin_in;
        }
        else
        {
            header('location:'.SITEURL.'smad/loginsila.php');
            $_SESSION['fail_to_signin'] = "wrong barcode! Scan again.";
        }
    // Client Side login System
    
?>