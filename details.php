<?php
    include('config/constants.php');

    date_default_timezone_set('Asia/Manila');
    $datename = date('Y-F-d');
    $time = date('h:i:s a');
    $m2 = date('Y-m-d H:i:s');

    $newtimestamp = strtotime('+ 1 minute');
    $m1 = date('Y-m-d H:i:s', $newtimestamp);

    $q = $_REQUEST["q"];
    $adminid = $_REQUEST["r"];
?>

<div style="max-width: 100%;">
    <div class="row no-gutters justify-content-md-center">
        <?php
            
            $codecheck = "SELECT * FROM code_tbl WHERE code='$q'";

            $checking = mysqli_query($conn,$codecheck);

            $codedetails = mysqli_num_rows($checking);

            if($codedetails==1)
            {      
            //   echo "got one!";
                
                while($row_details=mysqli_fetch_assoc($checking))
                {
                    $id = $row_details['id'];
                    $name = $row_details['name'];
                    $lastname = $row_details['lastname'];
                    $grdlevel = $row_details['level'];
                    $log_time = $row_details['log_time'];
                    $log_interval = $row_details['log_interval'];
                    $status = $row_details['status'];
                    
                    if($status == NULL)
                    {
                        // echo "yes its null";
                        $login_stat = "UPDATE code_tbl SET log_time = '$time', log_interval = '$m1', datename = '$datename' , status = 'Logged In' WHERE code = '$q'";
                        mysqli_query($conn,$login_stat) or die(mysqli_error());

                        $attn = "INSERT INTO attn_tbl SET code_id = '$id', admin_id = '$adminid', name = '$name', lastname = '$lastname', level = '$grdlevel', time = '$time', datename = '$datename', status = 'Logged In'";
                        $attn_proceed = mysqli_query($conn,$attn) or die(mysqli_error());

                        $fetch_sql = "SELECT * FROM code_tbl WHERE code='$q'";
                        $fetch_que = mysqli_query($conn,$fetch_sql);
                        $fetch_count = mysqli_num_rows($fetch_que);
                        if($fetch_count==1)
                        {      

                            while($row_fetch=mysqli_fetch_assoc($fetch_que))
                            {
                                $fetch_image = $row_fetch['image'];
                                $fetch_name = $row_fetch['name'];
                                $fetch_lastname = $row_fetch['lastname'];
                                $fetch_level = $row_fetch['level'];
                                $fetch_status = $row_fetch['status'];
                                $fetch_logtime = $row_fetch['log_time'];
                                $fetch_datename = $row_fetch['datename'];

                                ?>
                                    <meta http-equiv="Refresh" content="5; url='<?php SITEURL;?>sila.php'" />
                                    <div class="col-lg-6">
                                        <img src="img/<?php echo $fetch_image; ?>" alt="student profile pic" width = "370px" height = "420px" style ="margin-left:30px">
                                    </div>
                                    <div class="col-lg-6" style="text-align:center">                                               
                                        <div class="card-body justify-content-center outline1">
                                            <!-- <div class="greetbg"></div>
                                            <div class="datebg"></div>
                                            <div class="statbg"></div> -->
                                            <h1 class="card-title" style="color:#205E61">Welcome!</h1>
                                            <div style="font-size: 50px; font-family: Arial Black"><?php echo $fetch_name; echo "  "; echo $fetch_lastname;?></div>
                                                
                                                <div style="font-size: 40px; font-family: Arial Black"><?php echo $fetch_level; ?></div>
                                                <br>
                                                <div style="color: #fff44f; font-size: 40px; font-family: Arial Black"><?php echo $fetch_status; echo "  "; ?></h3><h3><?php echo $fetch_logtime;?></div>
                                        </div>
                                    </div>
                                <?php

                            }
                        }
                        
                    }

                    if($log_interval >= $m2)
                    {
                        ?>
                            <div class="col-lg-6">
                                <img src="img/blank.png" alt="student profile pic" width = "370px" height = "420px" style ="margin-left:30px">
                            </div>

                            <div class="col-lg-6" style="text-align:center">
                                <div class="card-body justify-content-center">
                                    <h3 class="card-title" style="color:#205E61">Wait for 1 minute interval</h3>
                                </div>
                            </div>
                        <?php
                    }
                    else
                    {
                        if($status == 'Logged In')
                        {
                            // echo "no its not null";
                            $logout_stat = "UPDATE code_tbl SET log_time = '$time', log_interval = '$m1', datename = '$datename' , status = 'Logged Out' WHERE code = '$q'";
                            mysqli_query($conn,$logout_stat) or die(mysqli_error());

                            $attn = "INSERT INTO attn_tbl SET code_id = '$id', admin_id = '$adminid', name = '$name', lastname = '$lastname', level = '$grdlevel', time = '$time', datename = '$datename' , status = 'Logged Out'";
                            $attn_proceed = mysqli_query($conn,$attn) or die(mysqli_error());

                            

                            $fetch_sql = "SELECT * FROM code_tbl WHERE code='$q'";
                            $fetch_que = mysqli_query($conn,$fetch_sql);
                            $fetch_count = mysqli_num_rows($fetch_que);
                            if($fetch_count==1)
                            {      

                                while($row_fetch=mysqli_fetch_assoc($fetch_que))
                                {
                                    $fetch_image = $row_fetch['image'];
                                    $fetch_name = $row_fetch['name'];
                                    $fetch_lastname = $row_fetch['lastname'];
                                    $fetch_level = $row_fetch['level'];
                                    $fetch_status = $row_fetch['status'];
                                    $fetch_logtime = $row_fetch['log_time'];
                                    $fetch_datename = $row_fetch['datename'];

                                    ?>
                                        <meta http-equiv="Refresh" content="5; url='<?php SITEURL;?>sila.php'" />
                                        <div class="col-lg-6">
                                            <img src="img/<?php echo $fetch_image; ?>" alt="student profile pic" width = "370px" height = "420px" style ="margin-left:30px">
                                        </div>
                                        <div class="col-lg-6" style="text-align:center">                                               
                                            <div class="card-body justify-content-center outline1">
                                                <!-- <div class="greetbg"></div>
                                                <div class="datebg"></div>
                                                <div class="statbg"></div> -->
                                                <h1 class="card-title" style="color: #205E61">Thank you for coming! <img src="img/smiley-removebg-preview.png" alt="smiley" style="height:50px; width:50px;"></h1>
                                                <!-- <h2></h2> -->
                                                <div style="font-size: 50px; font-family: Arial Black"><?php echo $fetch_name; echo "  "; echo $fetch_lastname;?></div>
                                                
                                                <div style="font-size: 40px; font-family: Arial Black"><?php echo $fetch_level; ?></div>
                                                <br>
                                                <div style="color: #fff44f; font-size: 40px; font-family: Arial Black"><?php echo $fetch_status; echo "  "; ?></h3><h3><?php echo $fetch_logtime;?></div>
                                            </div>
                                        </div>
                                    <?php

                                }
                            }
                        }

                        if($status == 'Logged Out')
                        {
                            $login_stat = "UPDATE code_tbl SET log_time = '$time', log_interval = '$m1', datename = '$datename' , status = 'Logged In' WHERE code = '$q'";
                            mysqli_query($conn,$login_stat) or die(mysqli_error());

                            $attn = "INSERT INTO attn_tbl SET code_id = '$id', admin_id = '$adminid', name = '$name', lastname = '$lastname', level = '$grdlevel', time = '$time', datename = '$datename', status = 'Logged In'";
                            $attn_proceed = mysqli_query($conn,$attn) or die(mysqli_error());

                            

                            $fetch_sql = "SELECT * FROM code_tbl WHERE code='$q'";
                            $fetch_que = mysqli_query($conn,$fetch_sql);
                            $fetch_count = mysqli_num_rows($fetch_que);
                            if($fetch_count==1)
                            {      

                                while($row_fetch=mysqli_fetch_assoc($fetch_que))
                                {
                                    $fetch_image = $row_fetch['image'];
                                    $fetch_name = $row_fetch['name'];
                                    $fetch_lastname = $row_fetch['lastname'];
                                    $fetch_level = $row_fetch['level'];
                                    $fetch_status = $row_fetch['status'];
                                    $fetch_logtime = $row_fetch['log_time'];
                                    $fetch_datename = $row_fetch['datename'];

                                    ?>
                                        <meta http-equiv="Refresh" content="5; url='<?php SITEURL;?>sila.php'" />
                                        <div class="col-lg-6">
                                            <img src="img/<?php echo $fetch_image; ?>" alt="student profile pic" width = "370px" height = "420px" style ="margin-left:30px">
                                        </div>
                                        <div class="col-lg-6" style="text-align:center">                                               
                                            <div class="card-body justify-content-center outline1">
                                                <!-- <div class="greetbg"></div>
                                                <div class="datebg"></div>
                                                <div class="statbg"></div> -->
                                                <h1 class="card-title" style="color:#205E61">Welcome!</h1>
                                                <div style="font-size: 50px; font-family: Arial Black"><?php echo $fetch_name; echo "  "; echo $fetch_lastname;?></div>
                                                
                                                <div style="font-size: 40px; font-family: Arial Black"><?php echo $fetch_level; ?></div>
                                                <br>
                                                <div style="color: #fff44f; font-size: 40px; font-family: Arial Black"><?php echo $fetch_status; echo "  "; ?></h3><h3><?php echo $fetch_logtime;?></div>
                                            </div>
                                        </div>
                                    <?php

                                }
                            }
                        }
                    }        
                }
                // echo $id;
                // echo $name;
                // $attn = "INSERT INTO attn_tbl SET code_id = '$id', name = '$name', time = '$time', datename = '$datename'";
                // $attn_proceed = mysqli_query($conn,$attn) or die(mysqli_error());

                
            }
            else
            {
                ?>
                    <meta http-equiv="Refresh" content="5; url='<?php SITEURL;?>sila.php'" />
                    <div class="col-lg-6">
                        <img src="img/blank.png" alt="student profile pic" width = "370px" height = "420px" style ="margin-left:30px">
                    </div>

                    <div class="col-lg-6" style="text-align:center">
                        <div class="card-body justify-content-center">
                            <h1 class="card-title" style="color:#2ed573">Unregistered Student</h1>
                        </div>
                    </div>
                <?php
            }
            
        ?>
        
    </div>
</div>


<!-- <div style="max-width: 100%;">
    <div class="row no-gutters justify-content-md-center">
        <div class="col-lg-6">
            <img src="img/2.jpg" alt="student profile pic" width = "400px" height = "500px" style ="margin-left:30px">
        </div>

        <div class="col-lg-6" style="text-align:center">
            <div class="card-body justify-content-center"> -->
                <!-- <h1 class="card-title" style="color:#2ed573">Welcome</h1>
                <h2>Mazer Ezeiah Jandoc</h2>
                <br><br><br><br><br>
                <h3>Logged In 03:20:00 pm</h3>
                <h3>2022-December-29</h3> -->
            <!-- </div>
        </div>
    </div>
</div> -->

