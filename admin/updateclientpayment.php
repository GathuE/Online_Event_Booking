<?php
error_reporting (E_ALL ^ E_NOTICE);
include 'classes/pdo_db.php';
if(isset($_GET['id']))
{
    $userid = $_GET['id'];
    $sql2= "SELECT * FROM client_eventbookings where client_phone=:userid and client_status='Confirmed' ";
    $query= $conn -> prepare($sql2);
    $query->bindParam(':userid',$userid,PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
        if($query -> rowCount() > 0)
            {
                header("Location: eventbookings?error= Client's Payment already Verified!!");
            } 
        else{

            $sql = "UPDATE client_eventbookings set client_status = 'Confirmed' WHERE client_phone=:userid";
            $query = $conn->prepare($sql);
            $query->bindParam(':userid',$userid,PDO::PARAM_STR);
            $query->execute();
            header("Location: eventbookings?success= Client's Payment Verified !!");
        }
}
