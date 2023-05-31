<?php include('partial/header.php');?>        
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

<br><br><br><br>
    <div>
        <?php

            if(isset($_SESSION['success']))
            {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }

            if(isset($_SESSION['duplicate']))
            {
                echo $_SESSION['duplicate'];
                unset($_SESSION['duplicate']);
            }

        ?>
    </div>
<div class="center">

    <form action="register.php" method="post" enctype="multipart/form-data">
        <input type="number" name="patron_admin_id" value="<?php echo $patron_admin_id;?>" hidden>
        <input type="number" name="patron_user_id" value="<?php echo $patron_user_id;?>" hidden>
        <br>
        
        <label for="level">Grade Level</label>
            <select id="bylevel" name="level" style="margin-left: 10px" required>
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
            <select id="bysection" name="section" style="margin-left: 40px" required>
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
        <label for="code">Barcode</label>
        <input type="text" name="code" placeholder="Enter Barcode" style="margin-left: 35px" required><br><br>
        <label for="name">First Name</label>
        <input type="text" name="name" placeholder="Enter 1st/2nd Name" style="margin-left: 17px" required><br><br>
        <label for="lastname">Last Name</label>
        <input type="text" name="lname" placeholder="Enter Last Name" style="margin-left: 17px" required><br><br>

        <br>
            <div class="center">
                <div class="form-input">
                    <div class="preview">
                        <img id="file-ip-1-preview">
                    </div>

                    <label for="file-ip-1">Upload Image</label>
                    <input type="file" name="image" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
                    
                </div>
            </div>
        <br><br>
        <div style="text-align:center;"><input type="submit" name="register" class="button"></div>

    </form>
</div>

<br><br><br><br><br><br><br><br>
<script>
    // image preview
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    // image preview
</script>


<?php include('partial/footer.php');?>