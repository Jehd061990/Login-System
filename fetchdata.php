<?php include('partial/header.php'); ?>
<br><br><br>
<!-- <meta http-equiv="Refresh" content="7000; url='<?php SITEURL;?>update.php'" /> -->

<style>
            .center {
                height:100%;
                display:flex;
                align-items:center;
                justify-content:center;

            }
            .form-input {
                width:350px;
                padding:20px;
                background:#fff;
                box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
                            3px 3px 7px rgba(94, 104, 121, 0.377);
            }

            .form-input img {
                width:100%;
                display:none;
                margin-bottom:30px;
            }

            .form-input input {
                display:none;
            }

            .form-input label {
                display:block;
                width:45%;
                height:45px;
                margin-left: 25%;
                line-height:50px;
                text-align:center;
                background:#1172c2;
                color:#fff;
                font-size:11px;
                font-family:"Open Sans",sans-serif;
                text-transform:Uppercase;
                font-weight:600;
                border-radius:5px;
                cursor:pointer;
            }


</style>

<?php

    
    if(isset($_SESSION['updata']))
    {
        $got_code = $_SESSION['updata'];

        $getData = "SELECT * FROM code_tbl WHERE code ='$got_code' AND patron_id = $patron_admin_id";
        $getData_conn = mysqli_query($conn,$getData);
        $getData_count = mysqli_num_rows($getData_conn);

        if($getData_count > 0)
        {
            while($getData_fetch = mysqli_fetch_assoc($getData_conn))
            {
                $getData_name = $getData_fetch['name'];
                $getData_lastname = $getData_fetch['lastname'];
                $getData_level = $getData_fetch['grade_level'];
                $getData_section = $getData_fetch['section'];
                $getData_image = $getData_fetch['image'];
            }
        }
    }
    


    if(isset($_POST['fetchdata']))
    {
        
        $got_code = $_POST['fetchcode'];
        
        $getData = "SELECT * FROM code_tbl WHERE code ='$got_code'";
        $getData_conn = mysqli_query($conn,$getData);
        $getData_count = mysqli_num_rows($getData_conn);

        if($getData_count > 0)
        {
            while($getData_fetch = mysqli_fetch_assoc($getData_conn))
            {
                $getData_name = $getData_fetch['name'];
                $getData_lastname = $getData_fetch['lastname'];
                $getData_level = $getData_fetch['grade_level'];
                $getData_section = $getData_fetch['section'];
                $getData_image = $getData_fetch['image'];
            }
        }
        else
        {
            $_SESSION['wrong'] = "wrong barcode!";
            header("location:".SITEURL.'smad/update.php');
              ?>
                 <meta http-equiv="Refresh" content="0; url='<?php SITEURL;?>update.php'" />
              <?php
        }   
    }

?>
<br>
<div style="margin-left:10%">
    <?php
    if(isset($_SESSION['updated1']))
        {
            echo $_SESSION['updated1'];
            unset($_SESSION['updated1']);
        }
    ?>
</div>
<br>

<div class="center">
    <form action="">
        <label for="mycode">Barcode </label>
        <input type="text" id="mycode" disabled>
        <a href="update.php" class="smbtn">close</a>
    </form>
    
</div>
<br>
<div class="center">
    <form action="updata.php" method="post" enctype="multipart/form-data">
        
        <input type="text" name="code" placeholder="Enter Barcode" value="<?php echo $got_code;?>" hidden>
        <input type="text" name="patron_user_id" placeholder="user id" value="<?php echo $patron_user_id;?>" hidden>
        <input type="text" name="patron_admin_id" placeholder="patron id" value="<?php echo $patron_admin_id;?>" hidden>
        <br>
    
        <label for="name">First Name</label>
        <input type="text" name="name" placeholder="Enter 1st/2nd Name" value="<?php echo $getData_name; ?>" required><br><br>
        <label for="lastname">Last Name</label>
        <input type="text" name="lname" placeholder="Enter Last Name" value="<?php echo $getData_lastname;?>" required><br><br>
        <!-- <label for="level">Grade Level</label>
            <select id="level" name="level" class="justify-content-center">
                <option disabled selected value="">Select Grade Level</option>
                <option>JHS 7 Chastity</option>
                <option>JHS 7 Courage</option>
                <option>JHS 7 Faith</option>
                <option>JHS 7 Fortitude</option>
                <option>JHS 8 Generosity</option>
                <option>JHS 8 Honesty</option>
                <option>JHS 8 Hope</option>
                <option>JHS 8 Humility</option>
                <option>JHS 8 Integrity</option>
                <option>JHS 9 Joy</option>
                <option>JHS 9 Justice</option>
                <option>JHS 9 Loyalty</option>
                <option>JHS 9 Modesty</option>
                <option>JHS 10 Patience</option>
                <option>JHS 10 Peace</option>
                <option>JHS 10 Piety</option>
                <option>JHS 10 Service</option>
                <option>JHS 10 Simplicity</option>
            </select> -->
        <label for="level">Grade Level</label>
            <select id="level" name="level" style="margin-left: 10px" required>
                <option disabled selected value="">Select Grade Level</option>
                <?php
                 
                    $deplist = "SELECT * FROM department_list_tbl WHERE patron_id = $patron_admin_id";
                    $deplist_conn = mysqli_query($conn, $deplist);
                    $deplist_num = mysqli_num_rows($deplist_conn);
                    if($deplist_num>0)
                    {
                        while($deplist_row = mysqli_fetch_assoc($deplist_conn))
                        {
                            $department_name = $deplist_row['department_name'];
                        
                            ?>
                                <option><?php echo $department_name;?></option>
                            <?php
                        }
                        
                    }
                    
                ?>
            </select>
        <br>
        <label for="section">Section</label>
            <select id="section" name="section" style="margin-left: 40px" required>
                <option disabled selected value="">Select Section</option>
                <?php
                    $profid = "SELECT * FROM profession_list_tbl WHERE patron_id = $patron_admin_id";
                    $profid_conn = mysqli_query($conn,$profid);
                    $profid_num = mysqli_num_rows($profid_conn);
                    if($profid_num>0)
                    {
                        while($profid_row = mysqli_fetch_assoc($profid_conn))
                        {
                            $profession_name = $profid_row['profession_name'];
                            ?>
                                <option><?php echo $profession_name; ?></option>
                            <?php
                            
                        }
                    }
                ?>
            </select>

        <br>
        <img id="image" alt="student picture" style="width:350px; height: 430px">
        
        <div class="form-input">
            <div class="preview">
                <img id="file-ip-2-preview">
            </div>

            <label for="file-ip-1">Replace Image</label>
            <input type="file" name="image" id="file-ip-1" accept="image/*" onchange="showImg(event);">
            
        </div>
        <!-- <input type="file" name="image"> -->

        <br><br>
        <div class="center"><input type="submit" name="updata" class="button" value="Update"></div> 
    </form>
</div>


<script>
    document.getElementById('mycode').value = "<?php echo $got_code;?>"
    document.getElementById('level').value = "<?php echo $getData_level; ?>"
    document.getElementById('section').value = "<?php echo $getData_section; ?>"
    document.getElementById('image').src = "img/<?php echo $getData_image; ?>"

    // image preview
        function showImg(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-2-preview");
                preview.src = src;
                preview.style.display = "block";

                document.getElementById('image').style.display = "none"
            }
        }
    // image preview


    // go back to update.php if refreshed
        // if ( window.history.replaceState ) {
        // window.history.replaceState( null, null, '<?php SITEURL;?>update.php' );
        // }
    // go back to update.php if refreshed

</script>
<br><br>


<?php include('partial/footer.php'); ?>