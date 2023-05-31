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
                        while($gotid_row = mysqli_fetch_assoc($gotid_conn))
                        {
                            $firstname = $gotid_row['name'];
                            $lastname = $gotid_row['lastname'];
                            $gradelevel = $gotid_row['level'];
                            $status = $gotid_row['status'];
                            $time = $gotid_row['time'];
                            $date = $gotid_row['datename'];
                            
                            ?>
                                <tr>
                                    <td><?php echo $firstname; ?></td>
                                    <td><?php echo $lastname; ?></td>
                                    <td><?php echo $gradelevel; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td><?php echo $time; ?></td>
                                    <td><?php echo $date; ?></td>
                                </tr>
                                
                            <?php
                        }
                    ?>
                </table>
            <?php
        }
    }
?>

        