<?php include('config/constants.php'); ?>

<?php


     $rand = (rand(10,10000));

    if(isset($_POST['updata']))
    {
        // get the current image
            $thiscode = $_POST['code'];
            $patron_user_id = $_POST['patron_user_id'];
            $patron_admin_id = $_POST['patron_admin_id'];
            $updatename = $_POST['name'];
            $updatelname = $_POST['lname'];
            $updatelevel = $_POST['level'];
            $upsection = $_POST['section']; 

            $querydata = "SELECT * FROM code_tbl WHERE code='$thiscode'";
            $querydata_conn = mysqli_query($conn,$querydata) or die(mysqli_error());
            $querydata_num = mysqli_num_rows($querydata_conn);

            if($querydata_num > 0)
            {
                while($querydata_count=mysqli_fetch_assoc($querydata_conn))
                {
                    $oldcode = $querydata_count['code'];
                    $oldimg = $querydata_count['image'];
                }

            }
        // get the current image
        
        // upload new image if available
            if(isset($_FILES['image']['name']))
            {
                $image_name = $_FILES['image']['name']; //New Image NAme
                
                if($image_name != "")
                {
                    // $rand_img = $rand.$_FILES['image']['name'];
                    $image_name = $rand.$_FILES['image']['name'];
                    // image is available
                    // ready to upload
                    move_uploaded_file($_FILES['image']['tmp_name'],"img/$image_name");

                    if($oldimg != "")
                    {
                        //Current Image is Available
                        //REmove the image
                        $imgpath = "img/".$oldimg;
                        unlink($imgpath);
                    }
                    

                    
                }
                else
                {
                    $image_name = $oldimg;
                    
                }  
            }
            else
            {
                $image_name = $oldimg;
                
            }
        // upload new image if available

        // update all inputs except image
            $updatas ="UPDATE code_tbl SET
            admin_id = '$patron_user_id',
            patron_id = '$patron_admin_id', 
            name = '$updatename',
            lastname = '$updatelname',
            grade_level = '$updatelevel',
            section = '$upsection',
            image = '$image_name'
            WHERE code = '$thiscode'";

            $updataconn = mysqli_query($conn,$updatas);

            if($updataconn == true)
            { 
                // header("location:".SITEURL.'smad/fetchdata.php?oldcode='.$oldcode);
                header("location:".SITEURL.'smad/fetchdata.php');

                $say = $thiscode;
                $_SESSION['updata'] = $say;
                $_SESSION['updated1'] = "Updated Successfully!";
                
            } 
        // update all inputs except image

        
        
    }
?>