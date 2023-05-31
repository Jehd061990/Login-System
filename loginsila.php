<?php include('config/constants.php');?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <title>login</title>
    <style>
        img
        {
            position: absolute;
            opacity: 0.6;
            z-index:-1;
            width:100%;
            height:105%;
        }

    </style>

  </head>
  <body style="background-color:rgba(255,0,0,0.5);">

  <img src="img/library-bg.jpg" alt="background-image" >
<form action="logincheck.php" method="post" id="myForm">
    <input type="text" id="barcode" name="admin" style="text-align:center; opacity:0" placeholder="scan you barcode" onkeyup="showHint(this.value)">
    <br>
    <!-- <input type="submit" name="confirm" value="login"> -->
</form>

    <?php
        if(isset($_SESSION['fail_to_signin']))
        {
            $texting = $_SESSION['fail_to_signin'];
            unset($_SESSION['fail_to_signin']);
        }
        else
        {
            $texting = 'Scan your admin barcode to auto log-in';
        }
    ?>

<br><br><br><br><br><br><br><br><br><br>
<div style="margin:auto; text-align:center">
    <div id="typing" style="font-size:50px; font-family:Trebuchet MS; color:black"></div>
</div>


    <script>
        // submit form
            function showHint(str) {
                if (str.length == 0) {
                    document.getElementById("myForm").submit() = false
                } else {
                    document.getElementById("myForm").submit() = true
                }
            }
        // submit form

        // focus cursor
            $(document).ready(function(){
                $("#barcode").focus();
                $('body').mousemove(function()
                {
                    $('#barcode').focus();
                })
            });
        // focus cursor

        // typing style
            var i = 0;
            var txt = '<?php echo $texting; ?>'
            var speed = 100;

            onload = function typeWriter() 
            {
                if (i < txt.length) 
                {
                    document.getElementById("typing").innerHTML += txt.charAt(i);
                    i++;
                    setTimeout(typeWriter, speed);
                }
            }
        // typing style
    </script>

    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>