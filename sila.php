<?php include('config/constants.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
    crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.thetimenow.com/ttn-embed.min.js"></script>

    <style>
        .button {
            display: inline-block;
            padding: 8px 20px;
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

        .print {
            display: inline-block;
            padding: 4px 14px;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #5352ed;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        
        }

        .print:hover {background-color: #3742fa}

        .print:active {
            background-color: #3742fa;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        .smbtn {
            display: inline-block;
            padding: 8px 16px;
            font-size: 15px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #3c6382;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }

        .smbtn:hover {background-color: #0a3d62}

        .smbtn:active {
            background-color: #0a3d62;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        .footer 
        {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            /* background-color: red;
            color: white; */
            text-align: center;
        }

        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%; 
            min-height: 100%;
            z-index: -1;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_SESSION['mybarcode']))
        {
            $adminpass = $_SESSION['mybarcode'];

            $myid = "SELECT * FROM admin_tbl WHERE barcode = '$adminpass'";
            $myidconn = mysqli_query($conn,$myid);
            $myidnum = mysqli_num_rows($myidconn);
            if($myidnum > 0)
            {
                while($myidfetch = mysqli_fetch_assoc($myidconn))
                {
                    $admincode = $myidfetch['patron_id'];
                }
            }
            else
            {
                header('location:'.SITEURL.'smad/loginsila.php');
            }
            // $admincode = 1;

        }

        if($adminpass == "")
        {
            header('location:'.SITEURL.'smad/loginsila.php');
        }
    ?>

    <div class="fixed-top">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
                <h5 class="text-white h4">SILA</h5>
                <span class="text-muted">Students In Library Attendance</span>
                <!-- <a href="report.php">report</a> -->
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" style="color:#70a1ff">Logout</a>
                    </li>
                </ul>
            </div>
            
        </div>
        <nav class="navbar navbar-dark bg-dark d-flex bd-highlight mb-3">
            <img src="img/smadlogo.png" alt="smad logo" width="50px" height="50px" style="margin-right:30px">
            <div style="color:#70a1ff">STELLA MARIS ACADEMY OF DAVAO - Junior High School Library</div>
            <button class="navbar-toggler ml-auto p-2 bd-highlight" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
  
    <style>
        .img
        {
            position: absolute;
            opacity: 0.7;
            z-index:-1;
            width:100%;
            height:120%;
        }

        .silabg 
        {
            padding: auto;
            /* background-color: #C9A0FF; */
            background-repeat: no-repeat;
            background-size: 100%;
            width: auto;
            /* position: absolute; */
            /* background-color:rgba(201, 160, 255,0.6); */
        }

                
        .statbg {
            width: 300px;
            height: 140px;
            background: #e1e6e1;
            transform: skew(-30deg);
            position: absolute;
            z-index:-1;
            bottom:28px;
            right:19%;
        }

        .datebg {
            width: 300px;
            height: 140px;
            background: #e1e6e1;
            transform: skew(-30deg);
            position: absolute;
            z-index:-1;
            bottom:150px;
            right:24%;
        }

        .greetbg {
            width: 500px;
            height: 140px;
            background: #e1e6e1;
            transform: skew(-30deg);
            position: absolute;
            z-index:-1;
            bottom:270px;
            right:8%;
        }

        .detail
        {
            color:#FFF8DC;
        }
        
        .outline1{
            color: white;
            font-size: 40px;
            -webkit-text-stroke: 1px #23430C;
            text-shadow: -1px 1px 2px #23430C,
                        1px 1px 2px #23430C,
                        1px -1px 0 #23430C,
                        -1px -1px 0 #23430C;
        }
        /* .outline2{
            color: white;
            font-size: 100px;
            -webkit-text-stroke: 5px #E21F03;
        } */
    </style>
    <div id="vid-bg">
        <video autoplay muted loop id="myVideo">
            <source src="video/Intro Video.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </div>
    
    <meta http-equiv="Refresh" content="400; url='<?php SITEURL;?>sila.php'" />
    <div id="scan-bg" style="display:none">
        <img class="img" src="img_system/studentspatron.jpg" alt="background-image" >
        <div class="silabg"></div>  
    </div>
    
        <br>
        <input type="text" id="rfidcard" name="rfidcard" onkeyup="showHint(this.value)">
        <br>
        
        <br>
        <div id="dateandtime" style="text-align:center" class="outline1"></div>
        <!-- <div id="dateandtime" style="text-align:center" class="outline2"></div> -->

        <!-- <img src="img/1.jpg" alt=""> -->
        <div class="container">
            
            <span id="txtHint"></span>

            <div id="style" style="max-width: 100%;">
                <div id="row" class="row no-gutters justify-content-md-center">
                    
                        <div id="imgcol" class="col-lg-6">
                            <img id="img" src="img/blank.png" alt="student profile pic" width = "370px" height = "420" style ="margin-left:30px">
                        </div>

                        <div class="col-lg-6" style="text-align:center; font-family: Arial Black;">
                            <div class="card-body justify-content-center">
                                <h1 class="card-title outline1">SCAN YOUR ID</h1>
                                <h2 class="card-title outline1">on the scanner</h2>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
        
        <!-- <input type="text"> -->
       <br> <br><br><br><br>
        
    <!-- </div> -->

    <?php
        date_default_timezone_set('Asia/Manila');
        $datename = date('Y-F-d h:i:s a');
        $time = date('h:i:s a');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
        crossorigin="anonymous">
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" 
        crossorigin="anonymous">
    </script>
    
    <script>
        // Insert and Fetch Data
            let default_counter = 5
            let count = 5
            var admincode = 1

            function showHint(str) {
                if (str.length == 0) {
                    // document.getElementById("txtHint").innerHTML = "";
                    // return;
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                        document.getElementById("vid-bg").style.display = "none";
                        document.getElementById("scan-bg").style.display = "block";
                    }
                    };
                    xmlhttp.open("GET", "neutral.php?q=" + str, true);
                    xmlhttp.send();

                    document.getElementById("style").style.display = "none";
                    document.getElementById("raw").style.display = "none";
                    document.getElementById("imgcol").style.display = "none";
                    document.getElementById("img").style.display = "none";
                    document.getElementById("uncol").style.display = "none";
                    document.getElementById("uncard").style.display = "none";
                    document.getElementById("h1").style.display = "none";
                    document.getElementById("h2").style.display = "none";

                    // clearInterval(my_countdown);
                } else {
                    var admincode = '<?php echo $admincode; ?>'
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;

                        document.getElementById("style").style.display = "none";
                        document.getElementById("raw").style.display = "none";
                        document.getElementById("imgcol").style.display = "none";
                        document.getElementById("img").style.display = "none";
                        document.getElementById("uncol").style.display = "none";
                        document.getElementById("uncard").style.display = "none";
                        document.getElementById("h1").style.display = "none";
                        document.getElementById("h2").style.display = "none";
                        document.getElementById("vid-bg").style.display = "none";
                        document.getElementById("scan-bg").style.display = "block";
                        //  
                    }
                    };
                    xmlhttp.open("GET", "details.php?q=" + str + "&r=" + admincode);
                    xmlhttp.send();

                    
                    
                }

                
            }
        // Insert and Fetch Data

        // Auto Clear and Focus RFID Input
            $(document).ready(function(){
                $("#rfidcard").focus();
                $('body').mousemove(function()
                {
                    $('#rfidcard').focus();
                })

                $("#rfidcard").keyup(function()
                {
                    if($(this).val().length >=8)
                    {
                        $(this).val("");
                    }
                });
            });
        // Auto Clear and Focus RFID Input

        // Date and Time
            function showTime() 
            {
                mytime=setInterval(function()
                {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("dateandtime").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "servertime.php");
                    xmlhttp.send();
                }, 1000);
                

            }

            // function startTime(){
            //     var refresh=1000; // Refresh rate in milli seconds
            //     mytime=setTimeout('showTime();',refresh)
            // }

            showTime()
        // Date and Time
    
    </script>

    <div class="container-fluid bg-dark footer">
        <h6 style="color:#70a1ff">Property of Stella Maris Academy of Davao</h6>
        <div style="color:#f1f2f6">All RIGHTS RESERVED</div>
    </div>

</body>
</html>
