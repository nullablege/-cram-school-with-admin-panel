<?php
    if(isset($_COOKIE['login']))
     header("location:admin.php");
    else{
        header("location:login.php");
    }
?>