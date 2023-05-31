<?php include('partial/header.php');?>
<br><br><br>
<style>
    .tbcenter {
        margin-left:auto; 
        margin-right:auto;
        text-align:center; 
        width: 1100px;
    }
</style>
<div class="row justify-content-center">
    <div class="col-auto">
        <table class="table-striped tbcenter">
            <tr>
                
                <!-- <th>id</th> -->
                <th>barcode</th>
                <th>name</th>
                <th>lastname</th>
                <th>grade level</th>
                <th>section</th>
                <th>image</th>
                <th>DateOfRegistration</th>
            </tr>

            <?php
                $record  = "SELECT * FROM code_tbl WHERE admin_id = '$patron_admin_id' ORDER BY date DESC";
                $record_conn = mysqli_query($conn,$record);
                $record_num = mysqli_num_rows($record_conn);

                $total_student = 0;

                if($record_num > 0 )
                {
                    
                    while($refetch =mysqli_fetch_assoc($record_conn)){
                        $reid = $refetch['id'];
                        $rebarcode = $refetch['code'];
                        $rename = $refetch['name'];
                        $relastname = $refetch['lastname'];
                        $relevel = $refetch['grade_level'];
                        $resection = $refetch['section'];
                        $reimage = $refetch['image'];
                        $reDOR = $refetch['datename'];

                        ?>
                            <tr>
                                <?php $total_student++;?>
                                <td><?php echo $rebarcode; ?></td>
                                <td><?php echo $rename; ?></td>
                                <td><?php echo $relastname; ?></td>
                                <td><?php echo $relevel; ?></td>
                                <td><?php echo $resection; ?></td>
                                <td><?php echo $reimage; ?></td>
                                <td><?php echo $reDOR; ?></td>
                            </tr>
                        <?php
                        
                    }
                    echo '<div style="text-align:center; font-family:Lucidatypewriter">Total Students:  <span style="font-size: 23px">' .$total_student++.'</span></div>';
                    echo '<br>';
                }
            ?>
        </table>
    
    </div>    
</div>

<?php include('partial/footer.php');?>