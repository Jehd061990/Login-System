<?php include('config/constants.php'); ?>
<?php
    

    if(isset($_SESSION['level']))
    {
        if($_SESSION['level']=='Preschool')
        {
            $_SESSION['preschool'] = '1selected';
            header("location:".SITEURL.'smad/relay.php');
        }
        elseif($_SESSION['level']=='Kinder')
        {
            $_SESSION['Kinder'] ='s2elected';
            header("location:".SITEURL.'smad/relay.php');
        }
        elseif($_SESSION['level']=='Elementary')
        {
            $_SESSION['elementary'] ='se3lected';
            header("location:".SITEURL.'smad/relay.php');
        }
        elseif($_SESSION['level']=='Highschool')
        {
            $_SESSION['hs'] = 'select4ed';
            header("location:".SITEURL.'smad/relay.php');
        }
        elseif($_SESSION['level']=='SeniorHighschool')
        {
            $_SESSION['shs'] = 'select5ed';
            header("location:".SITEURL.'smad/relay.php');
        }
        // else
        // {
        //     echo '';
        // }
        // unset($_SESSION['level']);
    }
?>