<?php
session_start();
include('config/dbcon.php');

if(!isset($_SESSION['auth']))
{
    $_SESSION['message'] = "Login To Access Dashboard";
    header("Location: ../login.php");
    exit(0);
}
else
{
    if($_SESSION["auth_role"] != "1" && $_SESSION["auth_role"] != "2")
    {
        $_SESSION['message'] = "You are not authorized as Admin";
        header("Location: ../login.php");
        exit(0);
    }
}


?>