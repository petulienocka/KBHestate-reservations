<?php
session_start();
if($_GET['la']){
    $_SESSION['la'] = $_GET['la'];
    header('Location:'.$_SERVER['PHP_SELF']);
    exit();
}

switch($_SESSION['la']){
     case "en":
        require('lang/en.php');
    break;
    case "dk":
        require('lang/dk.php');
    break;
    default:
        require('lang/en.php');
    }
?>