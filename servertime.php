<?php
    date_default_timezone_set('Asia/Manila');
    $datename = date('Y-F-d');
    $time = date('h:i:s a');
    $day = date('l');

    // echo $time;
    // echo "<br>";
    // echo $datename;
?>

<div style="font-family: corbel; font-size:50px; color:blue"><?php echo $time;?></div>
<div style="font-family: corbel; font-size:20px; color:blue"><?php echo $datename;?></div>
<div style="font-family: corbel; font-size:30px; color:blue"><?php echo $day; ?></div>