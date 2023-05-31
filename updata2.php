

<?php include('config/constants.php'); 

$patron_admin_id = $_REQUEST['stages'];

// echo

// $stage = "SELECT * FROM patron_tbl WHERE patron_group = '$stages'";
// $stage_conn = mysqli_query($conn,$stage);
// $stage_num = mysqli_num_rows($stage_conn);
// if($stage_num>0)
// {
//     while($stage_row = mysqli_fetch_assoc($stage_conn))
//     {
//         $patron_admin_id = $stage_row['id'];
//     }
// }

?>

<div class="col-md-12 d-flex justify-content-center">
    <label for="level">Grade Level</label>
        <select id="level" name="level" style="margin-left: 30px" required>
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
</div>
<div class="w-100"></div>
<div class="w-100"></div>
<div class="w-100"></div>
<div class="w-100"></div>
<div class="col-md-12 d-flex justify-content-center">      
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
</div>