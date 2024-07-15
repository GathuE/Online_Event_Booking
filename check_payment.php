<?php
error_reporting(E_ALL & E_NOTICE);
//Database connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = '/*Your DB NAME*/';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($conn); 
 
$phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $verified_payment = mysqli_query($conn, "select * from client_eventbookings where client_phone='$phone' and client_status='Confirmed'");

        if (mysqli_num_rows($verified_payment)>0)
        {
            echo json_encode(array("statusCode"=>200));
        }
        else
        {
            echo json_encode(array("statusCode"=>201));
        }



mysqli_close($conn);
?>
 