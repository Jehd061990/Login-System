<?php
    include('config/constants.php');

    // login input from loginform.php
        if(isset($_POST['patlogin']))
        {
            $patname = $_POST['patname'];
            $patpass = $_POST['patpass'];

            $patsql = "SELECT * FROM admin_tbl WHERE admin_nm = '$patname' AND admin_pw = '$patpass'";
            $patsql_conn = mysqli_query($conn, $patsql);
            $patsql_num = mysqli_num_rows($patsql_conn);

            $it = "SELECT * FROM it_tbl WHERE user_nm = '$patname' AND user_pw = '$patpass'";
            $it_conn = mysqli_query($conn, $it);
            $it_num = mysqli_num_rows($it_conn);

            if($patsql_num == 1)
            {
                while($patfetch = mysqli_fetch_assoc($patsql_conn))
                {
                    $pat_id = $patfetch['patron_id'];
                    $pat_user_id = $patfetch['id'];
                    $pat_user_nm = $patfetch['admin_nm'];
                }

                header('location:'.SITEURL.'smad/index.php');
                // $_SESSION['welcom-patron'] = "Welcome Admin";
                $_SESSION['pat_id'] = $pat_id;
                $_SESSION['pat_user_id'] = $pat_user_id;
                $_SESSION['pat_user_nm'] = $pat_user_nm;
                $_SESSION['user_greetings'] = "Welcome ";
            }
            elseif($it_num == 1)
            {
                while($itfetch = mysqli_fetch_assoc($it_conn))
                {
                    $it_id = $itfetch['id'];
                    $it_un = $itfetch['user_nm'];
                    $it_pw = $itfetch['user_pw'];
                }
                
                header('location:'.SITEURL.'smad/it_index.php');
                $_SESSION['it_id'] = $it_id;
                $_SESSION['it_un'] = $it_un;
                $_SESSION['it_pw'] = $it_pw;
                $_SESSION['it_greetings'] = "Welcome ";
            }
            else
            {
                $_SESSION['error_wrong_account'] = "Unrecognize Account, Please Use Other Account.";
                header('location:'.SITEURL.'smad/loginform.php');
            }
            
        }
    // login input from loginform.php

    // add patron user account from it_index.php
        if(isset($_POST['adduser']))
        {
            $new_nm = $_POST['newnm'];
            $new_pw = $_POST['newpw'];
            $newgroup_id = $_POST['newgroup_id'];

            $adduser = "INSERT INTO admin_tbl SET 
                patron_id = '$newgroup_id',
                admin_nm = '$new_nm',
                admin_pw = '$new_pw'";
            $adduser_conn = mysqli_query($conn,$adduser);

            if($adduser_conn ==  true)
            {
                header('location:'.SITEURL.'smad/it_patron.php');
            }
        }
    // add patron user account from it_index.php

    // delete patron user account from it_index.php
        if(isset($_POST['delPatUserAcc']))
        {
            $userpat_id = $_POST['delId'];

            $del_patuser = "DELETE FROM admin_tbl WHERE id = $userpat_id";
            $del_patuser_conn = mysqli_query($conn, $del_patuser);
            if($del_patuser_conn == true)
            {
                $_SESSION['delPatUserAccount'] = "Patron User Deleted";
                header('location:'.SITEURL.'/smad/it_patron.php');
            }
        }
    // delete patron user account from it_index.php

    // edit department group name
        if(isset($_POST['editdepgrpnmbtn']))
        {
            $dep_group_new_name = $_POST['editdepgrpnm'];
            $edit_dep_group_name = "UPDATE department_group_name_tbl SET dep_group_nm = '$dep_group_new_name'";
            $edit_dep_group_name_conn = mysqli_query($conn,$edit_dep_group_name);
            if($edit_dep_group_name_conn == true)
            {
                $_SESSION['edited_dep_name'] = "Edited Successfully.";
                header('location:'.SITEURL.'/smad/it_patron.php');

            }
        }
        
    // edit department group name
    
    // add patron group
        if(isset($_POST['addgroup_btn']))
        {
            $patron_it_id = $_POST['it_id'];
            $group_nm = $_POST['addgroup_input'];
            $addgroup = "INSERT INTO patron_tbl SET it_id = '$patron_it_id', patron_group = '$group_nm'";
            $addgroup = mysqli_query($conn,$addgroup);
            if($addgroup == true)
            {
                $_SESSION['addgroup_success'] = "Add Group Successfull";
                header('location:'.SITEURL.'/smad/it_patron.php');
            }
        }
    // add patron group
?>