<?php 
    include('config/constants.php');
    $imgdata = $_REQUEST['img'];

    // fetch profile image
        $dimg = "SELECT * FROM code_tbl WHERE code = '$imgdata'";
        $dimgconn = mysqli_query($conn,$dimg);
        $dimgcount = mysqli_num_rows($dimgconn);

        if($dimgcount > 0)
        {
            while($dimgFetch=mysqli_fetch_assoc($dimgconn))
            {
                $dimage = $dimgFetch['image'];
            }
        }
    // fetch profile image


    if(isset($_POST['updateimg']))
    {
        $upcode = $_POST['code'];
        
        $rand_name = $random.$_FILES['image']['name'];
        $upimg = $rand_name;

            
        $uppic = "UPDATE code_tbl SET image = '$upimg' WHERE code = '$upcode'";
        $uppic_conn = mysqli_query($conn,$uppic) or die(mysqli_error());

        if($uppic_conn ==  TRUE)
        {           
            move_uploaded_file($_FILES['image']['tmp_name'],"img/$upimg");

            $remove_img = "img/".$dimage;
            $remove = unlink($remove_img);

            header("location:".SITEURL.'smad/updateimg.php');
            $_SESSION['upimage'] = "Image Updated";
        }
           
    }

    
?>

<img src="img/<?php echo $dimage; ?>" alt="oldimg" width="350px" height="450px">




