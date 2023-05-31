<?php include('partial/header.php'); ?>
<br><br><br><br><br>

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

    .button {
    display: inline-block;
    padding: 15px 25px;
    font-size: 24px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: #fff;
    background-color: #4CAF50;
    border: none;
    border-radius: 15px;
    box-shadow: 0 9px #999;
    }

    .button:hover {background-color: #3e8e41}

    .button:active {
    background-color: #3e8e41;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
    }

    /* carousel */
        /* .profile
        {
            border-radius:50%;
        } */

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
        height: 100px;
        width: 100px;
        outline: black;
        /* background-size: 100%, 100%;
        border-radius: 50%;
        border: 1px solid black; */
        background-image: none;
        }

        .carousel-control-next-icon:after
        {
        content: '>';
        font-size: 100px;
        color: #702963;
        }

        .carousel-control-prev-icon:after {
        content: '<';
        font-size: 100px;
        color: #702963;
        }
    /* carousel */
    
    label {
    display:block;
}

</style>

<div style="margin-left:10%">
    <?php

        if(isset($_SESSION['wrong']))
        {
            echo $_SESSION['wrong'];
            unset($_SESSION['wrong']);
        } 
    ?>
</div>


<!-- <div class="center">
    <form action="fetchdata.php" method="post">
        <label for="code">Barcode</label>
        <input type="text" name="fetchcode" placeholder="Enter Barcode"  required>
        <input type="submit" value="fetch" name="fetchdata" class="smbtn">   
    </form>
</div> -->
<br><br><br><br><br>
<br>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="100000">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <form action="fetchdata.php" method="post">
                        <label for="code">Barcode</label>
                        <input type="text" name="fetchcode" placeholder="Enter Barcode"  required>
                        <input type="submit" value="fetch" name="fetchdata" class="smbtn">
                        <br><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div style="float:left;margin-right:20px;">
                        <!-- <label for="name">Name</label>
                        <input id="name" type="text" value="" name="name"> -->
                        <label for="stages">Educational Stages</label>
                        <select name="stages" id="getstages" onchange="getStages()" required>
                            <option disabled selected value="Select Stages">Select Stages</option>
                            <option value="5">Kinder</option>
                            <option value="2">Elementary</option>
                            <option value="1">HighSchool</option>
                            <option value="3">SHS</option>
                        </select>
                        <!-- <input type="button" value="fetch" name="fetchdata" class="smbtn" onclick="getStages()"> -->
                    </div>

                    
                </div>
                <!-- <div class="col-md-12 d-flex justify-content-center">
                    <div id="showstages"></div>       
                </div> -->
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
            </div>
        </div>
        <br><br><br>
    </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- <div id="try"></div> -->


<br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>
<br>

<script>

// getstage.addEventListener('click',function()
// {

// })

    function getStages() {
        let gtstg = document.getElementById('getstages').value
        // document.getElementById('showstages').innerHTML = gtstg

        if (gtstg == "") {
            document.getElementById("showstages").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("showstages").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET", "updata2.php?stages=" + gtstg);
            xmlhttp.send();
        }
    }
</script>

<?php include('partial/footer.php'); ?>

