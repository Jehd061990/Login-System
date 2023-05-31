<?php
    include('config/constants.php');

    $fdate = $_REQUEST["fdate"];
    $m3 = $_REQUEST["ldate"];
    // $fdate = '01/05/2023';
    // $ldate = '01/07/2023 23:59:59';
    $adminid = $_REQUEST["r"];
    
    $c1 = strtotime($m3);
    $newtimeM3 = strtotime('+23 hours + 59 minutes + 59 seconds',$c1);
    $ldate = date('Y-m-d H:i:s', $newtimeM3);
    // $ldate = date('d-m-Y H:i:s', $newtimeM3);
    $lastdate = date('Y-m-d', $newtimeM3);

    if($fdate=="")
    {
        echo '<br>';
        echo '<br>';
        echo '<span style="font-size: 23px; color: red">Please select specific starting day</span>';
        echo '<br>';
    }

    if($m3=="")
    {
        echo '<br>';
        echo '<span style="font-size: 23px; color: red">Please select specific end day</span>';
    }

    // echo $fdate;
    // echo '<br>';
    // echo $ldate;
    
    // main button
        if(isset($_REQUEST['dateonly']))
        {
            
            // $attncheck = "SELECT * FROM attn_tbl WHERE status='Logged In' AND date BETWEEN '$fdate' AND '$ldate' ORDER BY datename DESC";
            $attncheck = "SELECT COUNT(code_id) AS countstudents, id, name, lastname, grade_level, section, status, time ,datename FROM attn_tbl WHERE status='Logged In' AND admin_id = '$adminid' AND date BETWEEN '$fdate' AND '$ldate' GROUP BY code_id ORDER BY datename DESC ";
            $attnconn = mysqli_query($conn,$attncheck);
            $attncount = mysqli_num_rows($attnconn);
            $attn = 0;

            // $attend_total = "SELECT * FROM attn_tbl WHERE admin_id = '$adminid' AND date BETWEEN '$fdate' AND '$ldate' GROUP BY name ";
            $attend_total = "SELECT * FROM attn_tbl WHERE status='Logged In' AND admin_id = '$adminid' AND date BETWEEN '$fdate' AND '$ldate' GROUP BY code_id ORDER BY datename DESC";
            $attend_total_conn = mysqli_query($conn,$attend_total);
            $attend_total_num = mysqli_num_rows($attend_total_conn);
            
            $total_attn = 0;
            if($attend_total_num>0)
            {
                ?>
                    <table>
                        <!-- <tr>
                            <th>code id</th>
                            <th>name</th>
                            <th>lastname</th>
                            <th>status</th>
                        </tr> -->
                        <?php
                            while($attend_total_row = mysqli_fetch_assoc($attend_total_conn))
                            {
                                $count_code_id = $attend_total_row['code_id'];
                                $count_name = $attend_total_row['name'];
                                $count_lastname = $attend_total_row['lastname'];
                                $count_status = $attend_total_row['status'];
                                ?>
                                    <tr>
                                        <!-- <?php echo $total_attn++; ?> -->
                                        <!-- <td><?php echo $count_code_id; ?></td>
                                        <td><?php echo $count_name; ?></td>
                                        <td><?php echo $count_lastname; ?></td>
                                        <td><?php echo $count_status; ?></td>
                                    </tr> -->
                                <?php
                            }
                                $total_id = $total_attn++;
                        ?>

                    </table>
                <?php
            }

            if($attncount>0)
            {
                ?>
                    <table class="hoverTable" style="width: 720px;" >
                        <tr style="text-align:left">
                            <!-- <th scope="col">id</th> -->
                            <th scope="col">name</th>
                            <th scope="col">last name</th>
                            <th scope="col">grade level</th>
                            <th scope="col">section</th>
                            <th scope="col" style="text-align:center">no. of times</th>
                        </tr>
                        <?php  
                    
                            while($row_attn=mysqli_fetch_assoc($attnconn))
                            {
                                $id = $row_attn['id'];
                                
                                $name = $row_attn['name'];
                                $lname = $row_attn['lastname'];
                                $level = $row_attn['grade_level'];
                                $section = $row_attn['section'];
                                // $time = $row_attn['time'];
                                // $datename = $row_attn['datename'];
                                $qty = $row_attn['countstudents'];
                                ?>
                                    <tr class="tabler" style="text-align:left" onclick="onRow('<?php echo $id; ?>')">
                                        <!-- <td><?php echo $attn++; ?></td> -->
                                        
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $lname; ?></td>
                                        <td><?php echo $level; ?></td>
                                        <td><?php echo $section; ?></td>
                                        <td  style="text-align:center"><?php echo $qty; ?></td>
                                        <!-- <td><input type="button" value="view" onclick="onRow('<?php echo $id; ?>')"></td>  -->
                                    </tr>
                                <?php
                            }
                            echo '<div style="text-align:left; font-family:Lucidatypewriter">Total Attendance:  <span style="font-size: 20px">' .$attn++.'</span></div>';
                            echo '<div style="text-align:left; font-family:Lucidatypewriter">from  <span style="font-size: 16px">' .$fdate.'</span> to <span style="font-size: 16px">' .$lastdate.'</span> </div>';
                            echo '<br>';
                        ?>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align:center; font-size: 18px;"><?php echo 'Total: '.$total_id.' times'; ?></td>
                        </tr>
                    </table>
                <?php
            }
            else
            {
                echo '<br><br><br>';
                echo '<span style="font-size: 23px; color: red" class="d-flex justify-content-center">You entered an unregistered firstname and lastname</span>';
                // echo '<br>';
                echo '<span style="font-size: 23px; color: red" class="d-flex justify-content-center">or</span>';
                // echo '<br>';
                echo '<span style="font-size: 23px; color: red" class="d-flex justify-content-center">No record for this day you selected.</span>';
            }

            
        }
    // main button

    // level button
        if(isset($_REQUEST['sort']))
        {
            // $level = 'JHS 7 Chastity';
            $level = $_REQUEST['level'];
            // $attncheck = "SELECT DISTINCT name, datename FROM attn_tbl WHERE status='Logged In' AND date BETWEEN '$fdate' AND '$ldate' ORDER BY datename DESC";
            $attncheck = "SELECT COUNT(code_id) AS countstudents, id, name, lastname, grade_level, section, status, time ,datename FROM attn_tbl WHERE status='Logged In' AND admin_id = '$adminid' AND grade_level = '$level' AND date BETWEEN '$fdate' AND '$ldate' GROUP BY code_id ORDER BY datename DESC ";
            // $attncheck = "SELECT COUNT(code_id) AS countstudents, name, lastname, level, status, time ,datename FROM attn_tbl WHERE level = '$level'";
            $attnconn = mysqli_query($conn,$attncheck);
            $attncount = mysqli_num_rows($attnconn);
            $attn = 0;

            $attend_total = "SELECT * FROM attn_tbl WHERE status='Logged In' AND admin_id = '$adminid' AND grade_level = '$level' AND date BETWEEN '$fdate' AND '$ldate' ORDER BY datename DESC";
            $attend_total_conn = mysqli_query($conn,$attend_total);
            $attend_total_num = mysqli_num_rows($attend_total_conn);
            $total_attn = 0;
            
            if($attend_total_num>0)
            {
                ?>
                    <table>
                        <!-- <tr>
                            <th>code id</th>
                            <th>name</th>
                            <th>lastname</th>
                            <th>status</th>
                        </tr> -->
                        <?php
                            while($attend_total_row = mysqli_fetch_assoc($attend_total_conn))
                            {
                                $count_code_id = $attend_total_row['code_id'];
                                $count_name = $attend_total_row['name'];
                                $count_lastname = $attend_total_row['lastname'];
                                $count_status = $attend_total_row['status'];
                                ?>
                                    <tr>
                                        <!-- <?php echo $total_attn++; ?> -->
                                        <!-- <td><?php echo $count_code_id; ?></td>
                                        <td><?php echo $count_name; ?></td>
                                        <td><?php echo $count_lastname; ?></td>
                                        <td><?php echo $count_status; ?></td>
                                    </tr> -->
                                <?php
                            }
                                $total_id = $total_attn++;
                        ?>

                    </table>
                <?php
            }

            if($attncount>0)
            {
                ?>
                    <table class="hoverTable" style="width: 710px;" >
                        <tr style="text-align:left">
                            <th scope="col">name</th>
                            <th scope="col">last name</th>
                            <th scope="col">grade level</th>
                            <th scope="col">section</th>
                            <th scope="col" style="text-align:center">no. of times</th>
                        </tr>
                        <?php 
                
                            while($row_attn=mysqli_fetch_assoc($attnconn))
                            {
                                $id = $row_attn['id'];
                                
                                $name = $row_attn['name'];
                                $lname = $row_attn['lastname'];
                                $level = $row_attn['grade_level'];
                                $section = $row_attn['section'];
                                // $time = $row_attn['time'];
                                // $datename = $row_attn['datename'];
                                $qty = $row_attn['countstudents'];
                                ?>
                                    <tr class="tabler" style="text-align:left" onclick="onRow('<?php echo $id; ?>')">
                                        <!-- <td><?php echo $attn++; ?></td> -->
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $lname; ?></td>
                                        <td><?php echo $level; ?></td>
                                        <td><?php echo $section; ?></td>
                                        <td style="text-align:center"><?php echo $qty; ?></td> 
                                    </tr>
                                    
                                <?php
                            }

                            echo '<div style="text-align:left; font-family:Lucidatypewriter">Total Attendance:  <span style="font-size: 20px">' .$attn++.'</span></div>';
                            echo '<div style="text-align:left; font-family:Lucidatypewriter">from  <span style="font-size: 16px">' .$fdate.'</span> to <span style="font-size: 16px">' .$lastdate.'</span> </div>';
                            echo '<br>';
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align:center; font-size: 18px;"><?php echo 'Total: '.$total_id.' times'; ?></td>
                        </tr>

                    </table>
                <?php

            }
            else
            {
                echo '<br><br><br>';
                echo '<span style="font-size: 23px; color: red" class="d-flex justify-content-center">You entered an unregistered firstname and lastname</span>';
                // echo '<br>';
                echo '<span style="font-size: 23px; color: red" class="d-flex justify-content-center">or</span>';
                // echo '<br>';
                echo '<span style="font-size: 23px; color: red" class="d-flex justify-content-center">No record for this day you selected.</span>';
            }
            
        }
    // level button

    // section button
        if(isset($_REQUEST['sec']))
        {
            $section = $_REQUEST['section'];

            $sectioncheck = "SELECT COUNT(code_id) AS countstudents, id, name, lastname, grade_level, section, status, time ,datename FROM attn_tbl WHERE status='Logged In' AND admin_id = '$adminid' AND section = '$section' AND date BETWEEN '$fdate' AND '$ldate' GROUP BY code_id ORDER BY datename DESC ";
            $sectioncheck_conn = mysqli_query($conn,$sectioncheck);
            $sectioncheck_num = mysqli_num_rows($sectioncheck_conn);
            $sectionattn = 0;

            $section_total = "SELECT * FROM attn_tbl WHERE status='Logged In' AND admin_id = '$adminid' AND section = '$section' AND date BETWEEN '$fdate' AND '$ldate' ORDER BY datename DESC";
            $section_total_conn = mysqli_query($conn,$section_total);
            $section_total_num = mysqli_num_rows($section_total_conn);
            $section_attn = 0;
            
            

            if($section_total_num>0)
            {
                ?>
                    <table>
                        <!-- <tr>
                            <th>code id</th>
                            <th>name</th>
                            <th>lastname</th>
                            <th>status</th>
                        </tr> -->
                        <?php
                            while($attend_total_row = mysqli_fetch_assoc($section_total_conn))
                            {
                                $count_code_id = $attend_total_row['code_id'];
                                $count_name = $attend_total_row['name'];
                                $count_lastname = $attend_total_row['lastname'];
                                $count_status = $attend_total_row['status'];
                                ?>
                                    <tr>
                                        <!-- <?php echo $total_attn++; ?> -->
                                        <!-- <td><?php echo $count_code_id; ?></td>
                                        <td><?php echo $count_name; ?></td>
                                        <td><?php echo $count_lastname; ?></td>
                                        <td><?php echo $count_status; ?></td>
                                    </tr> -->
                                <?php
                            }
                                $total_id = $total_attn++;
                        ?>

                    </table>
                <?php
            }
            
            if($sectioncheck_num>0)
            {
                ?>
                    <table class="hoverTable" style="width: 710px;" >
                        <tr style="text-align:left">
                            <th scope="col">name</th>
                            <th scope="col">last name</th>
                            <th scope="col">grade level</th>
                            <th scope="col">section</th>
                            <th scope="col" style="text-align:center">no. of times</th>
                        </tr>
                        <?php 
                
                            while($row_attn=mysqli_fetch_assoc($sectioncheck_conn))
                            {
                                $id = $row_attn['id'];
                                
                                $name = $row_attn['name'];
                                $lname = $row_attn['lastname'];
                                $level = $row_attn['grade_level'];
                                $section = $row_attn['section'];
                                // $time = $row_attn['time'];
                                // $datename = $row_attn['datename'];
                                $qty = $row_attn['countstudents'];
                                ?>
                                    <tr class="tabler" style="text-align:left" onclick="onRow('<?php echo $id; ?>')">
                                        <!-- <td><?php echo $sectionattn++; ?></td> -->
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $lname; ?></td>
                                        <td><?php echo $level; ?></td>
                                        <td><?php echo $section; ?></td>
                                        <td style="text-align:center"><?php echo $qty; ?></td> 
                                    </tr>
                                    
                                <?php
                            }

                            echo '<div style="text-align:left; font-family:Lucidatypewriter">Total Attendance:  <span style="font-size: 20px">' .$sectionattn++.'</span></div>';
                            echo '<div style="text-align:left; font-family:Lucidatypewriter">from  <span style="font-size: 16px">' .$fdate.'</span> to <span style="font-size: 16px">' .$lastdate.'</span> </div>';
                            echo '<br>';
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align:center; font-size: 18px;"><?php echo 'Total: '.$total_id.' times'; ?></td>
                        </tr>

                    </table>
                <?php

            }
            else
            {
                echo '<br><br><br>';
                echo '<span style="font-size: 23px; color: red" class="d-flex justify-content-center">You entered an unregistered firstname and lastname</span>';
                // echo '<br>';
                echo '<span style="font-size: 23px; color: red" class="d-flex justify-content-center">or</span>';
                // echo '<br>';
                echo '<span style="font-size: 23px; color: red" class="d-flex justify-content-center">No record for this day you selected.</span>';
            }
        }
    // section button

    // search button
        if(isset($_REQUEST['search']))
        {
            // $level = 'JHS 7 Chastity';
            $fandlname = $_REQUEST['fandlname'];
            
            if($fandlname=="")
            {
                echo '<br><br><br>';
                echo '<span style="font-size: 23px; color: red">Please enter firstname and lastname first.</span>';
            }
            else
            {
                // $lastname = 'Jandoc';
                
                // $attncheck = "SELECT DISTINCT name, datename FROM attn_tbl WHERE status='Logged In' AND date BETWEEN '$fdate' AND '$ldate' ORDER BY datename DESC";
                // $attncheck = "SELECT COUNT(code_id) AS countstudents, name, lastname, level, status, time ,datename FROM attn_tbl WHERE status='Logged In' AND admin_id = '$adminid' AND name = '$fandlname' AND date BETWEEN '$fdate' AND '$ldate' GROUP BY code_id ORDER BY datename DESC ";
                $attncheck = "SELECT * FROM attn_tbl WHERE name='$fandlname' AND date BETWEEN '$fdate' AND '$ldate' ORDER BY datename DESC";
                $attnconn = mysqli_query($conn,$attncheck);
                $attncount = mysqli_num_rows($attnconn);

                $attnlname = "SELECT * FROM attn_tbl WHERE lastname='$fandlname' AND date BETWEEN '$fdate' AND '$ldate' ORDER BY datename DESC";
                $attnlname_conn = mysqli_query($conn,$attnlname);
                $attnlname_num= mysqli_num_rows($attnlname_conn);

                if($attncount>0)
                {      
                    ?>
                        <table class="table-striped" style="text-align:center; width: 700px;" >
                            <tr>
                                <th scope="col">name</th>
                                <th scope="col">last name</th>
                                <th scope="col">grade level</th>
                                <th scope="col">status</th>
                                <th scope="col">time</th>
                                <th scope="col">date</th>
                            </tr>
                            <?php
                                while($row_attn=mysqli_fetch_assoc($attnconn))
                                { 
                                    $name = $row_attn['name'];
                                    $lname = $row_attn['lastname'];
                                    $level = $row_attn['level'];
                                    $status = $row_attn['status'];
                                    $time = $row_attn['time'];
                                    $datename = $row_attn['datename'];
                                    ?>
                                        <tr>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $lname; ?></td>
                                            <td><?php echo $level; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td><?php echo $time; ?></td>
                                            <td><?php echo $datename; ?></td>
                                        </tr>
                                        
                                    <?php
                                }

                                echo '<div style="text-align:left; font-family:Lucidatypewriter">from  <span style="font-size: 16px">' .$fdate.'</span> to <span style="font-size: 16px">' .$lastdate.'</span> </div>';
                                echo '<br>';
                            ?>
                            
                        </table>
                    <?php
                }
                else if($attnlname_num>0)
                {      
                    ?>
                        <table class="table-striped" style="text-align:center; width: 700px;" >
                            <tr>
                                <th scope="col">name</th>
                                <th scope="col">last name</th>
                                <th scope="col">grade level</th>
                                <th scope="col">status</th>
                                <th scope="col">time</th>
                                <th scope="col">date</th>
                            </tr>
                            <?php
                                while($row_attn=mysqli_fetch_assoc($attnlname_conn))
                                { 
                                    $name = $row_attn['name'];
                                    $lname = $row_attn['lastname'];
                                    $level = $row_attn['level'];
                                    $status = $row_attn['status'];
                                    $time = $row_attn['time'];
                                    $datename = $row_attn['datename'];
                                    ?>
                                        <tr>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $lname; ?></td>
                                            <td><?php echo $level; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td><?php echo $time; ?></td>
                                            <td><?php echo $datename; ?></td>
                                        </tr>
                                        
                                    <?php
                                }

                                // echo '<div style="text-align:center; font-family:Lucidatypewriter">Total Attendance:  <span style="font-size: 23px">' .$attn++.'</span></div>';
                                echo '<div style="text-align:left; font-family:Lucidatypewriter">from  <span style="font-size: 16px">' .$fdate.'</span> to <span style="font-size: 16px">' .$lastdate.'</span> </div>';
                                echo '<br>';
                            ?>
                        </table>
                    <?php
                }
                else
                {
                    echo '<br><br><br>';
                    echo '<span style="font-size: 23px; color: red" class="d-flex justify-content-center">You entered an unregistered firstname and lastname</span>';
                    // echo '<br>';
                    echo '<span style="font-size: 23px; color: red" class="d-flex justify-content-center">or</span>';
                    // echo '<br>';
                    echo '<span style="font-size: 23px; color: red" class="d-flex justify-content-center">No record for this day you selected.</span>';
                }
            }
        }
    // search button

    // click result table row
        if(isset($_REQUEST['clickid']))
        {
            // $level = 'JHS 7 Chastity';
            $row = $_REQUEST['row'];
            
            // echo $row;

            $idsearch = "SELECT * FROM attn_tbl WHERE id=$row";
            $idsearch_conn = mysqli_query($conn,$idsearch);
            $idsearch_num = mysqli_num_rows($idsearch_conn);
            if($idsearch_num==1)
            {  
                while($idsearch_row = mysqli_fetch_assoc($idsearch_conn))
                {
                    $newcode_id = $idsearch_row['code_id'];
                }
            }

            $gotid = "SELECT * FROM attn_tbl WHERE code_id = $newcode_id AND date BETWEEN '$fdate' AND '$ldate' ORDER BY datename DESC";
            $gotid_conn = mysqli_query($conn,$gotid);
            $gotid_num = mysqli_num_rows($gotid_conn);

            if($gotid_num>0)
            {
                ?>
                    <table class="table-striped" style="margin-right:30px;width: 710px;" >
                        <tr style="text-align:left">
                            <th scope="col">name</th>
                            <th scope="col">last name</th>
                            <th scope="col">grade level</th>
                            <th scope="col">section</th>
                            <th scope="col">status</th>
                            <th scope="col">time</th>
                            <th scope="col" style="text-align:center">date</th>
                        </tr>
                        <?php
                            while($gotid_row = mysqli_fetch_assoc($gotid_conn))
                            {
                                $firstname = $gotid_row['name'];
                                $lastname = $gotid_row['lastname'];
                                $gradelevel = $gotid_row['level'];
                                $section = $gotid_row['section'];
                                $status = $gotid_row['status'];
                                $time = $gotid_row['time'];
                                $date = $gotid_row['datename'];
                                
                                ?>
                                    <tr style="text-align:left">
                                        <td><?php echo $firstname; ?></td>
                                        <td><?php echo $lastname; ?></td>
                                        <td><?php echo $gradelevel; ?></td>
                                        <td><?php echo $section; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td><?php echo $time; ?></td>
                                        <td style="text-align:center"><?php echo $date; ?></td>
                                    </tr>
                                    
                                <?php
                            }
                            echo '<div style="text-align:left; font-family:Lucidatypewriter">from  <span style="font-size: 16px">' .$fdate.'</span> to <span style="font-size: 16px">' .$lastdate.'</span> </div>';
                            echo '<br>';
                        ?>
                    </table>
                <?php
            }
        }
    // click result table row
?>
    
<br>



    

        