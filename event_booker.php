<?php
error_reporting(E_ALL & E_NOTICE);
//Database connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = '/*Your DB NAME*/';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($conn); 
 

$name = mysqli_real_escape_string($conn, $_POST['name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$status = mysqli_real_escape_string($conn, $_POST['status']);


$daily_limit = mysqli_query($conn, "select * from client_eventbookings where client_phone='$phone'");

if (mysqli_num_rows($daily_limit) > 200){

    echo json_encode(array("statusCode"=>202));
}
else{


    $duplicate_entry = mysqli_query($conn, "select * from client_eventbookings where client_phone='$phone'");

        if (mysqli_num_rows($duplicate_entry)>0)
        {
            echo json_encode(array("statusCode"=>201));
        }
        else{
            $sql = "INSERT INTO `client_eventbookings` (`client_name`, `client_phone`, `client_status`) VALUES ('$name','$phone','$status')";
            if(mysqli_query($conn, $sql)){
                echo json_encode(array("statusCode"=>200));
            }
            else {
                echo json_encode(array("statusCode"=>201));
            }
        }


}



mysqli_close($conn);
?>
 