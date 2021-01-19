<?php

if(time() - $_SESSION['timestamp'] > 10) { //subtract new timestamp from the old one
    echo"<script>alert('15 Minutes over!');</script>";
    unset($_SESSION['agent'], $_SESSION['password'], $_SESSION['timestamp']);
    $_SESSION['loggedin'] = false;
    header("Location: ../Index.php"); //redirect to index.php
    exit;
} else {
    $_SESSION['timestamp'] = time(); //set new timestamp
}

?>