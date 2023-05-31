<?php include('partial/header.php');?>
<br><br><br>

<style>
    /* @media only print 
    {
        footer, header, .sidebar 
        {
            display:none;
        }
    } */
    .tbcenter {
        margin-left:auto; 
        margin-right:auto;
    }

    /* checkbox container */
        .box{
            padding: 5px;
            width: 73px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            /* padding-: 5px; */
            
        }
    /* checkbox container */

    /* checkbox flip design */
        .tg-list {
        text-align: center;
        display: flex;
        align-items: center;
        }

        .tg-list-item {
        margin: auto;
        }



        .tgl {
        display: none;
        }
        .tgl, .tgl:after, .tgl:before, .tgl *, .tgl *:after, .tgl *:before, .tgl + .tgl-btn {
        box-sizing: border-box;
        }
        .tgl::-moz-selection, .tgl:after::-moz-selection, .tgl:before::-moz-selection, .tgl *::-moz-selection, .tgl *:after::-moz-selection, .tgl *:before::-moz-selection, .tgl + .tgl-btn::-moz-selection {
        background: none;
        }
        .tgl::selection, .tgl:after::selection, .tgl:before::selection, .tgl *::selection, .tgl *:after::selection, .tgl *:before::selection, .tgl + .tgl-btn::selection {
        background: none;
        }
        .tgl + .tgl-btn {
        outline: 0;
        display: block;
        width: 4em;
        height: 2em;
        position: relative;
        cursor: pointer;
        -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
                user-select: none;
        }
        .tgl + .tgl-btn:after, .tgl + .tgl-btn:before {
        position: relative;
        display: block;
        content: "";
        width: 50%;
        height: 100%;
        }
        .tgl + .tgl-btn:after {
        left: 0;
        }
        .tgl + .tgl-btn:before {
        display: none;
        }
        .tgl:checked + .tgl-btn:after {
        left: 50%;
        }

        .tgl-flip + .tgl-btn {
        padding: 2px;
        transition: all 0.2s ease;
        font-family: sans-serif;
        perspective: 100px;
        }
        .tgl-flip + .tgl-btn:after, .tgl-flip + .tgl-btn:before {
        display: inline-block;
        transition: all 0.4s ease;
        width: 100%;
        text-align: center;
        position: absolute;
        line-height: 2em;
        font-weight: bold;
        color: #fff;
        position: absolute;
        top: 0;
        left: 0;
        -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
        border-radius: 4px;
        }
        .tgl-flip + .tgl-btn:after {
        content: attr(data-tg-on);
        background: #5352ed;
        transform: rotateY(-180deg);
        }
        .tgl-flip + .tgl-btn:before {
        background: #FF3A19;
        content: attr(data-tg-off);
        }
        .tgl-flip + .tgl-btn:active:before {
        transform: rotateY(-20deg);
        }
        .tgl-flip:checked + .tgl-btn:before {
        transform: rotateY(180deg);
        }
        .tgl-flip:checked + .tgl-btn:after {
        transform: rotateY(0);
        left: 0;
        background: #3742fa;
        }
        .tgl-flip:checked + .tgl-btn:active:after {
        transform: rotateY(20deg);
        }
    /* checkbox flip design */

    .ul
    {
        list-style-type: none;
    }

    .ul li
    {
        display: inline;
    }

    /* attendance table selector */
        .hoverTable{
            width:100%; 
            /* border-collapse:collapse;  */
        }
        .hoverTable td{ 
            padding:7px; 
            /* border:#4e95f4 1px solid; */
        }
        /* Define the default color for all the table rows */
        .hoverTable tr{
            background: #b8d1f3;
        }
        /* Define the hover highlight color for the table row */
        .hoverTable tr:hover {
            background-color: #4682B4;
        }

        .tabler:nth-child(even) {
            background-color: #f2f2f2;
        }
    /* attendance table selector */

    input[type=checkbox]{
	height: 0;
	width: 0;
	visibility: hidden;
    }

    label {
        cursor: pointer;
        text-indent: -9999px;
        width: 60px;
        height: 30px;
        background: #A020F0;
        display: block;
        border-radius: 30px;
        position: relative;
    }

    label:after {
        content: '';
        position: absolute;
        top: 3px;
        left: 5px;
        width: 25px;
        height: 25px;
        background: #fff;
        border-radius: 25px;
        transition: 0.3s;
    }

    input:checked + label {
        background: #F0009C;
    }

    input:checked + label:after {
        left: calc(100% - 5px);
        transform: translateX(-100%);
    }

    label:active:after {
        width: 60px;
    }

    // centering
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
</style>
<br>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-2">
            <div class="md-form md-outline input-with-post-icon datepicker">
                <input placeholder="Select date" type="date" id="fdate" class="form-control" required>
                
            </div>
        </div>
        <div class="col-md-auto">
            To
        </div>
        <div class="col col-lg-2">
            <div class="md-form md-outline input-with-post-icon datepicker">
                <input placeholder="Select date" type="date" id="ldate" class="form-control" required>       
            </div>
        </div>
    </div>
        <br>
    <!-- checkbox styled -->
        <!-- <div style="text-align:center; font-weight: bold;"><label for="flip">Show Attendance? -->
        <!-- <div class="box">
            <input type="checkbox" class="tgl tgl-flip" id="cb5" onclick="myFunction()" hidden>
            <label class="tgl-btn" data-tg-off="by level" data-tg-on="bysection" for="cb5"></label> 
        </div>
        </label></div> -->
                                                        
        <!-- <label for="login">login</label>
        <input type="checkbox" value="login" id="lin"> -->
    <!-- checkbox styled -->
    
</div>
<ul class="ul" style="margin-right: 30px; text-align:center;">
    <li><input class="smbtn" type="button" value="main" onclick="mainBtn()"></li>
    <li><input class="smbtn" type="button" value="sort" onclick="sortBtn()"></li>
    <li><input class="smbtn" type="button" value="search" onclick="searchBtn()"></li>
</ul>


<!-- <div style="text-align:center; display:none" id="sortinput">
    <div>sort by grade level:</div>
    <select id="level" name="level" class="justify-content-center" required>
        <option disabled selected value="">Select Grade Level</option>
        <option>JHS 7 Chastity</option>
        <option>JHS 7 Courage</option>
        <option>JHS 7 Faith</option>
        <option>JHS 7 Fortitude</option>
        <option>JHS 8 Generosity</option>
        <option>JHS 8 Honesty</option>
        <option>JHS 8 Hope</option>
        <option>JHS 8 Humility</option>
        <option>JHS 8 Integrity</option>
        <option>JHS 9 Joy</option>
        <option>JHS 9 Justice</option>
        <option>JHS 9 Loyalty</option>
        <option>JHS 9 Modesty</option>
        <option>JHS 10 Patience</option>
        <option>JHS 10 Peace</option>
        <option>JHS 10 Piety</option>
        <option>JHS 10 Service</option>
        <option>JHS 10 Simplicity</option>
    </select>
</div> -->

<div style="text-align:center; display:none" id="searchinput">
    <div>Enter firstname or lastname:</div>
    <input type="text" placeholder="firstname or lastname" style="text-align:center" id="fandlname">
</div>
<br>
    
<div style="display:none; text-align:center" id="sortinput">
    <div class="d-flex justify-content-center">
        <input type="checkbox" id="sortswitch" onclick="clickBox()">
        <label for="sortswitch">Toggle</label>

        <div style="margin-left: 10px">
            <select id="bylevel" style="text-align:center;" >
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

        <div style="margin-left: 10px">
            <select id="bysection" style="display:none">
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

<br>
<div class="d-flex justify-content-center">
    <input type="submit" value="submit" class="button" onclick="showBySearch()" id="searchsubmit" style="display:none">
    <input type="submit" value="submit" class="button" onclick="showByGradeLevel()" id="levelsubmit" style="display:none">
    <input type="submit" value="submit" class="button" onclick="showByGradeSection()" id="sectionsubmit" style="display:none">
    <input type="submit" value="submit" class="button" onclick="showBydate()" id="mainsubmit">
</div>
    <br>
<div style="text-align:center; display: none;" id="print"><input type="submit" class="print" value="Print" onclick="printIt()"></div>

<!-- <form action="">
  <label for="fname">First name:</label>
  <input type="text" id="fname" name="fname" onkeyup="showBydate(this.value)">
</form> -->
<br>
<div class="row justify-content-center" id="printTable">
    <div class="col-auto">

        <span id="bydate"></span>
        <!-- <span id="sort"></span> -->
        
        <div style="width:100%;height:0;padding-bottom:96%;position:relative;" id="gif"><iframe src="https://giphy.com/embed/d1GpZTVp2eV7gQk8" width="380" height="361" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div>
        <!-- <iframe src="https://giphy.com/embed/d1GpZTVp2eV7gQk8" width="380" height="361" frameBorder="0" class="giphy-embed" allowFullScreen></iframe> -->
    </div>
</div>

<script>
    // open improvize print
        function printIt(printThis) {
            var css = '<style>' +
                            'th, td {' +
                                'padding: 8px;' +
                                // 'text-align: right;' +
                                'border: 1px solid #ddd;' +
                            '}' +

                            'table {' +
                                'border-collapse: collapse;' +
                            '}' +
                        '</style>'
            
            var divToPrint=document.getElementById("printTable")
            // var printme = css + divToPrint.outerHTML
            var win = window.open();
            self.focus();
            win.document.open();
            win.document.write(css)
            // win.document.write('<h1 style="text-align:center; background-color: #ff6b81;">Student'+"'"+'s Attendance</h1>');
            win.document.write('<div style="text-align:center"><img src="img/smadlogo.png" alt="smad logo" width="50px" height="50px"></div>')
            win.document.write('<div style="text-align:center">Stella Maris Academy of Davao</div><br>')
            win.document.write('<div style="margin-left:8px">' + divToPrint.outerHTML + '</div>');
            // win.document.write(printme)
            win.document.close();
            win.print();
            win.close();
        }
    // open improvize print

    // Data Picker Initialization
        // $('.datepicker').datepicker({
        // inline: true
        // });
    // Data Picker Initialization

    // fetch data log
        function showBydate() 
        {
            let admincode = '<?php echo $patron_admin_id; ?>'
            let fdate = document.getElementById("fdate").value;
            let ldate = document.getElementById("ldate").value;
            // let loginbox = document.getElementById("cb5");
            let dateonly = 'dateonly'

            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200) 
                {
                    document.getElementById("bydate").innerHTML = this.responseText;
                    document.getElementById("gif").style.display = "none";
                    document.getElementById("print").style.display = "block";
                }
            };
            xmlhttp.open("GET", "attendance.php?fdate=" + fdate + "&ldate=" + ldate + "&r=" + admincode + "&dateonly=" + dateonly);
            xmlhttp.send();
            
        }
        function showByGradeLevel()
        {
            let admincode = '<?php echo $patron_admin_id; ?>'
            let fdate = document.getElementById("fdate").value;
            let ldate = document.getElementById("ldate").value;
            let level = document.getElementById("bylevel").value;
            let section = document.getElementById("bysection").value;
            // let loginbox = document.getElementById("cb5");
            let sort = 'sort'

            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200) 
                {
                    document.getElementById("bydate").innerHTML = this.responseText;
                    document.getElementById("gif").style.display = "none";
                    document.getElementById("print").style.display = "block";
                }
            };
            xmlhttp.open("GET", "attendance.php?fdate=" + fdate + "&ldate=" + ldate + "&r=" + admincode + "&level=" + level + "&sort=" + sort);
            xmlhttp.send();
        }
        function showByGradeSection()
        {
            let admincode = '<?php echo $patron_admin_id; ?>'
            let fdate = document.getElementById("fdate").value;
            let ldate = document.getElementById("ldate").value;
            let section = document.getElementById("bysection").value;
            // let loginbox = document.getElementById("cb5");
            let sec = 'sec'

            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200) 
                {
                    document.getElementById("bydate").innerHTML = this.responseText;
                    document.getElementById("gif").style.display = "none";
                    document.getElementById("print").style.display = "block";
                }
            };
            xmlhttp.open("GET", "attendance.php?fdate=" + fdate + "&ldate=" + ldate + "&r=" + admincode + "&section="+ section + "&sec=" + sec);
            xmlhttp.send();
        }

        function showBySearch()
        {
            let admincode = '<?php echo $patron_admin_id; ?>'
            let fdate = document.getElementById("fdate").value;
            let ldate = document.getElementById("ldate").value;
            let fandlname = document.getElementById("fandlname").value;
            // let loginbox = document.getElementById("cb5");
            let search = 'search'

            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200) 
                {
                    document.getElementById("bydate").innerHTML = this.responseText;
                    document.getElementById("gif").style.display = "none";
                    document.getElementById("print").style.display = "block";
                }
            };
            xmlhttp.open("GET", "attendance.php?fdate=" + fdate + "&ldate=" + ldate + "&r=" + admincode + "&fandlname=" + fandlname + "&search=" + search);
            xmlhttp.send();
        }
    // fetch data log

    // main, sort and search button
        function sortBtn()
        {
            document.getElementById('mainsubmit').style.display = "none"
            document.getElementById('searchinput').style.display = "none"
            document.getElementById('searchsubmit').style.display = "none"
            document.getElementById('sortinput').style.display = "block"
            document.getElementById('levelsubmit').style.display = "block"
            // document.getElementById('sectionsubmit').style.display = "none"
            // document.getElementById('bylevel').style.display = "block"
        }
        function searchBtn()
        {
            document.getElementById('mainsubmit').style.display = "none"
            document.getElementById('searchinput').style.display = "block"
            document.getElementById('searchsubmit').style.display = "block"
            document.getElementById('sortinput').style.display = "none"
            document.getElementById('levelsubmit').style.display = "none"
            document.getElementById('sectionsubmit').style.display = "none"
        }
        function mainBtn()
        {
            document.getElementById('mainsubmit').style.display = "block"
            document.getElementById('searchinput').style.display = "none"
            document.getElementById('searchsubmit').style.display = "none"
            document.getElementById('sortinput').style.display = "none"
            document.getElementById('levelsubmit').style.display = "none"
            document.getElementById('sectionsubmit').style.display = "none"
        }
    // main, sort and search button
    
    // when click table row
        function onRow(rowID) 
        {

            let admincode = '<?php echo $patron_admin_id; ?>'
            let fdate = document.getElementById("fdate").value;
            let ldate = document.getElementById("ldate").value;
            let clickid = 'clickid'
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200) 
                {
                    document.getElementById("bydate").innerHTML = this.responseText;
                    document.getElementById("gif").style.display = "none";
                    document.getElementById("print").style.display = "block";
                }
            };
            // xmlhttp.open("GET", "search_id.php?fdate=" + fdate + "&ldate=" + ldate + "&r=" + admincode + "&row=" + row + "&id=" + id);
            xmlhttp.open("GET", "attendance.php?row=" + rowID + "&clickid=" + clickid + "&fdate=" + fdate + "&ldate=" + ldate + "&r=" + admincode);
            xmlhttp.send();       
        }
    // when click table row

    // check box toggle
        function clickBox() 
        {
            // Get the checkbox
            let checkBox = document.getElementById("sortswitch");
            // Get the output text
            let bylevel = document.getElementById("bylevel");
            let bysection = document.getElementById("bysection");
            
            let levelsubmit = document.getElementById("levelsubmit");
            let sectionsubmit = document.getElementById("sectionsubmit");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                bylevel.style.display = "none";
                bysection.style.display = "block"
                levelsubmit.style.display = "none"
                sectionsubmit.style.display = "block"
            } else {
                bylevel.style.display = "block";
                bysection.style.display = "none"
                levelsubmit.style.display = "block"
                sectionsubmit.style.display = "none"
            }
        }
    // check box toggle
</script>
<br>

<br><br>

<?php include('partial/footer.php');?>