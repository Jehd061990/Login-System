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
            padding: 5px 12px;
            font-size: 10px;
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
    </style>
</head>
<body>
    <?php
        // if(isset($_SESSION['mybarcode']))
        // {
        //     $adminpass = $_SESSION['mybarcode'];

        //     $myid = "SELECT * FROM admin_tbl WHERE barcode = '$adminpass'";
        //     $myidconn = mysqli_query($conn,$myid);
        //     $myidnum = mysqli_num_rows($myidconn);
        //     if($myidnum > 0)
        //     {
        //         while($myidfetch = mysqli_fetch_assoc($myidconn))
        //         {
        //             $admincode = $myidfetch['patron_id'];
        //         }
        //     }
        //     else
        //     {
        //         header('location:'.SITEURL.'smad/loginsila.php');
        //     }
        //     // $admincode = 1;

        // }

        // if($adminpass == "")
        // {
        //     header('location:'.SITEURL.'smad/loginsila.php');
        // }

        if(isset($_SESSION['it_id']))
        {
            $it_id = $_SESSION['it_id'];
        }
        if($it_id == "")
        {
            header('location:'.SITEURL.'smad/loginform.php');
        }

        if(isset($_SESSION['it_un']))
        {
            $it_un = $_SESSION['it_un'];
        }
        if(isset($_SESSION['it_pw']))
        {
            $it_pw = $_SESSION['it_pw'];
        }
        if(isset($_SESSION['it_greetings']))
        {
            $it_greetings = $_SESSION['it_greetings'];
            unset($_SESSION['it_greetings']);
        }
        else
        {
            $it_greetings = "";
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
                        <a class="nav-link" href="it_patron.php" style="color:#70a1ff">Patron</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" style="color:#70a1ff">Logout</a>
                    </li>
                </ul>
            </div>
            
        </div>
        <nav class="navbar navbar-dark bg-dark d-flex bd-highlight mb-3">
            <img src="img/smadlogo.png" alt="smad logo" width="50px" height="50px" style="margin-right:30px">
            <div style="color:#70a1ff">SMAD</div>
            <div class="ml-auto p-2" style="font-size:20px; color:white"><?php echo $it_greetings.$it_un; ?></div>
            <button class="navbar-toggler ml-auto p-2 bd-highlight" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>