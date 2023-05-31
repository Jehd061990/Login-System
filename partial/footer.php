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
                        //  
                    }
                    };
                    xmlhttp.open("GET", "update_patron_un.php?q=" + str + "&r=" + admincode);
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