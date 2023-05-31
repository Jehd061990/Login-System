<?php
    include('config/constants.php');

    $random = (rand(10,10000));

    if(isset($_POST['register']))
    {
        $code = $_POST['code'];
        $name = $_POST['name'];
        $lname = $_POST['lname'];
        $level = $_POST['level'];
        $section = $_POST['section'];
        $patron_admin_id = $_POST['patron_admin_id'];
        $patron_user_id = $_POST['patron_user_id'];
        $random_name = $random.$_FILES['image']['name'];
        $img = $random_name;

        $sql_duplicate = "SELECT * FROM code_tbl WHERE code='$code'";

        $res_duplicate = mysqli_query($conn,$sql_duplicate);

        $count_duplicate = mysqli_num_rows($res_duplicate);

        if($count_duplicate==1)
        {
            header("location:".SITEURL.'smad/reg.php');
            $_SESSION['duplicate'] = "Barcode Already Exist! Please Enter Other Barcode Number";
        }
        else
        {
            $insertdata = "INSERT INTO code_tbl SET admin_id = $patron_user_id , patron_id = $patron_admin_id,code='$code', name='$name', lastname='$lname', grade_level='$level', section = '$section', image='$img'";
            $registered = mysqli_query($conn,$insertdata) or die(mysqli_error());

            if($registered ==  TRUE)
            {
                
                move_uploaded_file($_FILES['image']['tmp_name'],"img/$img");
                header("location:".SITEURL.'smad/reg.php');
                $_SESSION['success'] = "Registered Successfuly";
                $_SESSION['level'] = "$level";
            }
            else
            {
                echo "fail";
            }
        }

        
        unset($_POST['register']);
    }
?>