<?php
if(isset($_GET['keyVerification'])) {
    $keyVerification = $_GET['keyVerification'];

    $con = new mysqli('localhost', 'root', 'WebDev19', 'KBHestate');

    $verification = $con->query("SELECT verified, keyVerification FROM clients WHERE verified = 0 AND keyVerification = '$keyVerification' LIMIT 1");

    if($verification->num_rows == 1) {
        $update = $con->query("UPDATE clients SET verified = 1 WHERE keyVerification = '$keyVerification' LIMIT 1");

        if($update) {
            echo "VERIFIED!";
        } else{
            echo $con->error;
        }
    }else {
        echo "Invalid Account";
    }

} else {
    die ("Try again");
}
?>