<?php

    setcookie("username",true,time()-3600);
    setcookie("login",true,time()-3600);
    header("location:deneme.php");
?>