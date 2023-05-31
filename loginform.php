<?php include('config/constants.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Patron User</title>

    <style>
      * {
        box-sizing: border-box;
      }

      /* body {
        margin: 0;
        font-family: Arial;
        font-size: 17px;
      } */

      #myVideo {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%; 
        min-height: 100%;
        z-index: -1;
      }

      .content {
        position: fixed;
        bottom: 30%;
        background:rgb(37, 150, 190, 0.9);
        color: #f1f1f1;
        width: 400px;
        padding: 20px;
        margin-left: auto;
        margin-right: auto;
        border-radius: 25px;
        box-shadow: 0 0 15px 9px #00000096;
      }

      .carou-tent {
        position: fixed;
        bottom: 30%;
        background:rgb(37, 150, 190, 0.9);
        color: #f1f1f1;
        width: 100%;
        padding: 20px;
        margin-left: auto;
        margin-right: auto;
        border-radius: 25px;
        box-shadow: 0 0 15px 9px #00000096;
      }

      #myBtn {
        width: 200px;
        font-size: 18px;
        padding: 10px;
        border: none;
        background: #000;
        color: #fff;
        cursor: pointer;
      }

      #myBtn:hover {
        background: #ddd;
        color: black;
      }

      /* login button */
        .smbtn {
            display: inline-block;
            padding: 8px 30px;
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

        h4
        {
          color:black;
          font-family: "Trickster";
        }

        .myinput
        {
          height: 50px;
          width: 80%;
          border: 1px solid black;
          border-radius: 4px;

        }
      /* login button */
    </style>
  </head>
  <body>
    <?php
      if(isset($_SESSION['failmanage']))
      {
        echo "<div style='color:red; font-size: 20px'>".$_SESSION['failmanage']."</div>";
        unset($_SESSION['failmanage']);
      }
      if(isset($_SESSION['error_wrong_account']))
      {
        echo "<div style='color:red; font-size: 20px'>".$_SESSION['error_wrong_account']."</div>";
        unset($_SESSION['error_wrong_account']);
      }
    ?>


    <video autoplay muted loop id="myVideo">
      <source src="video/Intro Video.mp4" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>
    
    <form action="centralize.php" method="post">
      <div class="d-flex justify-content-center">
        <div class="content">
          <div style="text-align: center">
            <!-- <h1>Library Patrons' Attendance</h1> -->
            <h4>Library Patrons' Attendance</h4>
            <br><br>
            <input type="text" placeholder="Enter User Name" class="myinput" name="patname" style="text-align: center">
            <br><br><br>
            <input type="password" placeholder="Enter Password" class="myinput" name="patpass" style="text-align: center">
            <br><br><br>
            <div style="width: 50%">
              <input type="submit" value="Login" class="smbtn" name="patlogin">
            </div>
          </div>
          <br><br>
        </div>
      </div>
    </form>
    
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
