<?php 
    include('config/constants.php');

    $patron_id = $_REQUEST['patron_id'];
    // $newgroup_id = $_REQUEST['group_id'];
    // $dep_name = $_REQUEST['dep_name'];
    
    
    $show_dep_lists = "SELECT * FROM department_list_tbl WHERE patron_id = $patron_id ORDER BY date DESC";
    $show_dep_lists_conn = mysqli_query($conn,$show_dep_lists);
    $show_dep_lists_num = mysqli_num_rows($show_dep_lists_conn);
    if($show_dep_lists_num>0)
    {
        while($listdep_fetch=mysqli_fetch_assoc($show_dep_lists_conn))
        {
            $department_id = $listdep_fetch['id'];
            $department_list = $listdep_fetch['department_name'];
            ?>
                <table>
                    <tr>
                        <td><?php echo $department_list; ?></td>
                        <td><input type="button" value="-" name="deldep_btn" onclick="delList('<?php echo $department_id; ?>')"></td>
                    </tr>
                </table>
            <?php
        }
    }
    else
    {
        echo "Add Department Name";
    }
?>

<!-- <div id="del_successful"></div> -->

