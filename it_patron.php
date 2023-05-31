<?php include('partial/it_header.php');?>

    <style>
        /* The Modal (background) */
        .modal {
        display: none; 
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%; 
        overflow: auto; 
        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0,0.4); 
        }

        /* Modal Content/Box */
        .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 500px; 
        }

        /* The Close Button */
        .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
        }
    </style>
    <script>
        // add group
            function addGroup()
            {
                document.getElementById('addgroupinput').style.display="block"
                document.getElementById('addgroupbtn').style.display ="none"
                document.getElementById('xaddgroupbtn').style.display = "block"
                // document.getElementById('addfirst').style.display = "none"
            }
            function xAddGroup()
            {
                document.getElementById('addgroupinput').style.display="none"
                document.getElementById('addgroupbtn').style.display ="block"
                document.getElementById('xaddgroupbtn').style.display = "none"
            }
        // add group
    </script>
    
    <br><br><br>
    <!-- display all SESSION in this page -->
        <?php
            if(isset($_SESSION['delPatUserAccount']))
            {
                echo $_SESSION['delPatUserAccount'];
                unset($_SESSION['delPatUserAccount']);
            }
            if(isset($_SESSION['edited_dep_name']))
            {
                echo $_SESSION['edited_dep_name'];
                unset($_SESSION['edited_dep_name']);
            }
            if(isset($_SESSION['addgroup_success']))
            {
                echo $_SESSION['addgroup_success'];
                unset($_SESSION['addgroup_success']);
            }
        ?>
        <br>
    <!-- display all SESSION in this page-->

    <!-- group list -->
        <input type="button" value="add" onclick="addGroup()" id="addgroupbtn">
        <input type="button" value="x" onclick="xAddGroup()" style="display:none" id="xaddgroupbtn">
        <div id="addgroupinput" style="display:none">
            <form action="centralize.php" method="post">
                <input type="number" value="<?php echo $it_id;?>" name="it_id" hidden>
                <input type="text" placeholder="Enter Group Name" name="addgroup_input">
                <input type="submit" value="+" name="addgroup_btn">
            </form>
            
        </div>
        <div id="group_list"></div>
        <table>
            <tr>
                <th>group name</th>
                
            </tr>
            <?php
                $patron = "SELECT * FROM patron_tbl WHERE it_id = $it_id ";
                $patron_query = mysqli_query($conn,$patron);
                $patron_num = mysqli_num_rows($patron_query);
                if($patron_num>0)
                {
                    while($patrow = mysqli_fetch_assoc($patron_query))
                    {
                        $group_id = $patrow['id'];
                        $group_name = $patrow['patron_group'];
                        ?>
                            <tr>
                                <td><?php echo $group_name; ?></td>
                                <td><a class="smbtn" href="<?php echo SITEURL; ?>/smad/it_php.php?it_id=<?php echo $group_id; ?>&it_un=<?php echo $it_un; ?>&it_pw=<?php echo $it_pw; ?>">manage</a></td>
                            </tr>
                        <?php
                    }
                }
            ?>
        </table>
    <!-- group list -->

    <br><br>
    <div>----------------------------------------------------------------------------------------</div>
    <h4>"Manage Group"</h4>
    <br>

    <!-- dislay all settings of group after pressing manage button of group name -->
        <?php
            if(isset($_SESSION['group_id']))
            {
                $newgroup_id = $_SESSION['group_id'];
                // list of users account
                    ?>
                        <h5>Members</h5>
                        <input type="button" value="add" onclick="addUser()" id="addbtn">
                        <input type="button" value="x" onclick="closeAddUser()" id="xaddusr" style="display:none">
                        
                        
                        <div style="display:none" id="addusr">
                            <form action="centralize.php" method="post">
                                <table>
                                    <tr>
                                        <input type="number" name="newgroup_id" value="<?php echo $newgroup_id; ?>" hidden>
                                        <td><input type="text" placeholder="Enter User Name" name="newnm"></td>
                                        <td><input type="text" placeholder="Enter Password" name="newpw"></td>
                                        <td><input type="submit" value="save" name="adduser"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <table>
                            <tr>
                                <!-- <td>id</td> -->
                                <th>username</th>
                                <!-- <td>password</td> -->
                            </tr>
                    <?php
                        
                        $group = "SELECT * FROM admin_tbl WHERE patron_id = $newgroup_id";
                        $group_conn = mysqli_query($conn, $group);
                        $group_num = mysqli_num_rows($group_conn);
                        if($group_num > 0)
                        {
                            while($mem_fetch = mysqli_fetch_assoc($group_conn))
                            {
                                $mem_id = $mem_fetch['id'];
                                $mem_un = $mem_fetch['admin_nm'];
                                $mem_pw = $mem_fetch['admin_pw'];
                                
                                ?>
                                        <tr id="trow">
                                            
                                            <td><span id="newunm<?php echo $mem_id;?>"><?php echo $mem_un;?></span></td>
                                            <td>
                                                <div class="modal_button">
                                                    <button class="modal-button button_deposit smbtn" href="#myModal<?php echo $mem_id;?>">manage</button>

                                                    <!-- The Modal -->
                                                        <div id="myModal<?php echo $mem_id;?>" class="modal">

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h2 style="color: #777">Manage Patron User</h2>
                                                                    <span class="close">×</span>
                                                                </div>
                                                                <div id="saveNewUn<?php echo $mem_id;?>"></div>
                                                                <div id="saveNewPw<?php echo $mem_id;?>"></div>
                                                                <div id="brsv<?php echo $mem_id;?>"><br></div>
                                                                <div class="modal-body">
                                                                        <!-- <input type="number" id="usid" value=""> -->
                                                                        <label for="mem_un" style="font-weight:bold">username:</label>
                                                                        <div id="editun<?php echo $mem_id;?>"><span id="newuname<?php echo $mem_id;?>"><?php echo $mem_un;?></span> <input type="button" value="edit" class="smbtn" onclick="editUn('<?php echo $mem_id;?>')"></div>
                                                                        <div id="newun<?php echo $mem_id;?>" style="display:none"><input type="text" id="newusername<?php echo $mem_id;?>" placeholder="<?php echo $mem_un;?>"> <input type="button" value="save" class="smbtn" onclick="saveNewUn('<?php echo $mem_id;?>')"> <input type="button" value="x" onclick="xnewUn('<?php echo $mem_id;?>')" class="smbtn"></div>
                                                                        <br>
                                                                        <label for="mem_un" style="font-weight:bold">password:</label>
                                                                        <div id="editpw<?php echo $mem_id;?>"><div style="-webkit-text-security: disc; display:inline-block" id="newpword<?php echo $mem_id;?>"><?php echo $mem_pw;?></div>  <input type="button" value="edit" class="smbtn" onclick="editPw('<?php echo $mem_id;?>')"></div>
                                                                        <div id="newpw<?php echo $mem_id;?>" style="display:none"><input type="text" id="newpassword<?php echo $mem_id;?>" placeholder="Enter New Password"> <input type="button" value="save" class="smbtn" onclick="saveNewPw('<?php echo $mem_id;?>')"> <input type="button" value="x" onclick="xnewPw('<?php echo $mem_id;?>')" class="smbtn"></div>
                                                                        <br>
                                                                        <input type="button" value="delete" onclick="delPatronUser('<?php echo $mem_id;?>')">
                                                                        <div id="delpopup<?php echo $mem_id;?>" style="display:none">
                                                                            are you sure you want to delete this patron user account?
                                                                            <form action="centralize.php" method="post">
                                                                                <input type="number" value="<?php echo $mem_id;?>" name="delId" hidden>
                                                                                <input type="submit" value="yes" name="delPatUserAcc">
                                                                            </form>
                                                                            <input type="button" value="no" onclick="xDel('<?php echo $mem_id;?>')">
                                                                        </div>
                                                                        <!-- 
                                                                            <input type="submit" value="Delete">
                                                                        </form> -->
                                                                        
                                                                </div>
                                                            </div>

                                                        </div>
                                                    <!-- The Modal -->
                                                </div>
                                            </td>
                                        </tr>
                                    
                                <?php
                            }
                        }
                    ?>
                        </table>   
                    <?php
                // list of users account
            
                // list of departments name
                    ?>
                        <br>
                        <h5>Department lists</h5>
                    <?php

                    $get_dep_name = "SELECT * FROM department_group_name_tbl WHERE patron_id = $newgroup_id";
                    $get_dep_name_conn = mysqli_query($conn,$get_dep_name);
                    $get_dep_name_num = mysqli_num_rows($get_dep_name_conn);
                    if($get_dep_name_num > 0)
                    {
                        while($depnm_fetch = mysqli_fetch_assoc($get_dep_name_conn))
                        {
                            $departmen_name = $depnm_fetch['dep_group_nm'];
                            ?>
                                
                                <table>
                                    <tr>
                                        <td><?php echo $departmen_name; ?></td>
                                        <td><input type="button" value="edit" onclick="editDepGrpNm()" id="editdepgrpnmbtn"></td>
                                        <td><input type="button" value="x" onclick="xeditDepGrpNm()" id="xeditdepgrpname" style="display:none"></td>
                                    </tr>
                                </table>
                                <div id="editdepgrpname" style="display:none">
                                    <form action="centralize.php" method="post">
                                        <input type="text" placeholder="Edit Name" name = "editdepgrpnm">
                                        <input type="submit" value="save" name="editdepgrpnmbtn">
                                    </form>
                                </div>
                            <?php
                        }
                    }
                    
                    ?>
                        <input type="button" value="add" onclick="addDepList()" id="addlistbtn">
                        <input type="button" value="x" onclick="xaddDepList()" style="display:none" id="xlistbtn">
                        <div id="addlistinput" style="display:none">
                            <table>
                                <tr>
                                    <td><input type="text" placeholder="Enter Name" id="departmentname"></td>
                                    <td><input type="button" value="+" onclick="addLists()"></td>
                                </tr>
                            </table>
                        </div>
                    
                        <div id="department_lists"></div>

                    <?php

                    

                // list of departments name
            }
            // echo $newgroup_id;
        ?>
    <!-- dislay all settings of group after pressing manage button of group name -->

    <br><br><br>

    <script>
        
        // edit patron user name

            function editUn(edun)
            {
                document.getElementById('newun'+ edun).style.display = "block"
                document.getElementById('editun' + edun).style.display = "none"
                
            }

            function xnewUn(xnwun)
            {
                document.getElementById('newun'+ xnwun).style.display = "none"
                document.getElementById('editun'+ xnwun).style.display = "block"
            }

            function saveNewUn(usrid)
            {
                var newusername = document.getElementById('newusername'+ usrid).value
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("saveNewUn"+ usrid).innerHTML = "successfully saved new username"
                    document.getElementById("brsv"+ usrid).style.display="none"
                    document.getElementById("newuname"+ usrid).innerHTML = this.responseText;
                    document.getElementById("newunm"+ usrid).innerHTML = this.responseText;
                }
                };
                xmlhttp.open("GET", "update_patron_un.php?id=" + usrid + "&un=" + newusername);
                xmlhttp.send(); 

                document.getElementById('newun'+ usrid).style.display = "none"
                document.getElementById('editun'+ usrid).style.display = "block"

                let default_counter = 4
                let count = 4
                save_un = setInterval(function() 
                {
                    count--;

                    document.getElementById("saveNewUn"+ usrid).innerHTML = "";
                    document.getElementById("brsv"+ usrid).style.display="block"
                    // console.log(count);
                    if (count == 0)
                    {
                        clearInterval(save_un);          
                        count = default_counter; /* Reset Counter */
                    }

                }, 1000);
            }
        // edit patron user name

        // edit patron user password
            function editPw(edpw)
            {
                document.getElementById('newpw'+ edpw).style.display = "block"
                document.getElementById('editpw'+ edpw).style.display = "none" 
            }
            function xnewPw(xnwpw)
            {
                document.getElementById('newpw'+ xnwpw).style.display = "none"
                document.getElementById('editpw'+ xnwpw).style.display = "block"
            }

            function saveNewPw(pwid)
            {
                var newpassword = document.getElementById('newpassword'+ pwid).value
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("saveNewPw"+ pwid).innerHTML = "successfully saved new password"
                    document.getElementById("brsv"+ pwid).style.display="none"
                    document.getElementById("newpword"+ pwid).innerHTML = this.responseText;
                    // document.getElementById("newpw"+ pwid).innerHTML = this.responseText;
                }
                };
                xmlhttp.open("GET", "update_patron_pw.php?id=" + pwid + "&pw=" + newpassword);
                xmlhttp.send(); 

                document.getElementById('newpw'+ pwid).style.display = "none"
                document.getElementById('editpw'+ pwid).style.display = "block"

                let default_counter = 4
                let count = 4
                save_pw = setInterval(function() 
                {
                    count--;

                    document.getElementById("saveNewPw"+ pwid).innerHTML = "";
                    document.getElementById("brsv"+ pwid).style.display="block"
                    // console.log(count);
                    if (count == 0)
                    {
                        clearInterval(save_pw);          
                        count = default_counter; /* Reset Counter */
                    }

                }, 1000);
            }
        // edit patron user password

        // delete patron user account button
            function delPatronUser(delid)
            {
                document.getElementById('delpopup'+ delid).style.display = "block"
            }

            function xDel(xdelid)
            {
                document.getElementById('delpopup'+ xdelid).style.display = "none"
            }

        // delete patron user account button
        
        // add patron user account
            function addUser()
            {
                document.getElementById('addusr').style.display = "block"
                document.getElementById('addbtn').style.display = "none"
                document.getElementById('xaddusr').style.display = "block"
            }

            function closeAddUser()
            {
                document.getElementById('addusr').style.display = "none"
                document.getElementById('addbtn').style.display = "block"
                document.getElementById('xaddusr').style.display = "none"
            }
        // add patron user account

        // edit department group name
            function editDepGrpNm()
            {
                document.getElementById('editdepgrpname').style.display="block"
                document.getElementById('editdepgrpnmbtn').style.display="none"
                document.getElementById('xeditdepgrpname').style.display="block"
            }

            function xeditDepGrpNm()
            {
                document.getElementById('editdepgrpname').style.display="none"
                document.getElementById('editdepgrpnmbtn').style.display="block"
                document.getElementById('xeditdepgrpname').style.display="none"
            }
        // edit department group name

        // add department list name
            
            function addDepList()
            {
                document.getElementById('addlistinput').style.display="block"
                document.getElementById('addlistbtn').style.display ="none"
                document.getElementById('xlistbtn').style.display = "block"
                document.getElementById('addfirst').style.display = "none"
            }
            function xaddDepList()
            {
                document.getElementById('addlistinput').style.display="none"
                document.getElementById('addlistbtn').style.display ="block"
                document.getElementById('xlistbtn').style.display = "none"
                document.getElementById('addfirst').style.display = "block"
            }
            function addLists(depId)
            {
               
                let patron_id = "<?php echo $newgroup_id; ?>"
                let departmentname = document.getElementById('departmentname').value
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("department_lists").innerHTML = this.responseText;
                }
                };
                xmlhttp.open("GET", "dep_list_add.php?patron_id=" + patron_id + "&dep_name=" + departmentname);
                xmlhttp.send();

                
                // document.getElementById('editun'+ usrid).style.display = "block"

                // let default_counter = 4
                // let count = 4
                // save_un = setInterval(function() 
                // {
                //     count--;

                //     document.getElementById("saveNewUn"+ usrid).innerHTML = "";
                //     document.getElementById("brsv"+ usrid).style.display="block"
                //     // console.log(count);
                //     if (count == 0)
                //     {
                //         clearInterval(save_un);          
                //         count = default_counter; /* Reset Counter */
                //     }

                // }, 1000);
            
            }


        // add department list name
        
        // show department list names    
            function showLists()
            {
               
                let patron_id = "<?php echo $newgroup_id; ?>"
                let departmentname = document.getElementById('departmentname').value
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("department_lists").innerHTML = this.responseText;
                }
                };
                xmlhttp.open("GET", "dep_list_show.php?patron_id=" + patron_id + "&dep_name=" + departmentname);
                xmlhttp.send();
            
            }

            showLists();
        // show department list names

        // delete department name in the list
            function delList(depid)
            {
                let patron_id = "<?php echo $newgroup_id; ?>"
                // let departmentname = document.getElementById('departmentname').value
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("department_lists").innerHTML = this.responseText;
                }
                };
                xmlhttp.open("GET", "dep_list_delete.php?patron_id=" + patron_id + "&dep_id=" + depid);
                xmlhttp.send();
            }
        // delete department name in the list

        // MODAL start
            // Get the button that opens the modal
            var btn = document.querySelectorAll("button.modal-button");

            // All page modals
            var modals = document.querySelectorAll('.modal');

            // Get the <span> element that closes the modal
            var spans = document.getElementsByClassName("close");

            // When the user clicks the button, open the modal
            for (var i = 0; i < btn.length; i++) 
            {
                btn[i].onclick = function(e) 
                {
                    e.preventDefault();
                    modal = document.querySelector(e.target.getAttribute("href"));
                    modal.style.display = "block";
                }
            }

            // When the user clicks on <span> (x), close the modal
            for (var i = 0; i < spans.length; i++) 
            {
                spans[i].onclick = function() 
                {
                    for (var index in modals) 
                        {
                        if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
                        }
                }
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) 
            {
                if (event.target.classList.contains('modal')) 
                {
                    for (var index in modals) 
                    {
                        if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
                    }
                }
            }
        // MODAL end
    </script>





<?php include('partial/it_footer.php');?>