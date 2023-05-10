<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
$del_id2 = filter_input(INPUT_POST, 'del_id2');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	
    $booking_id = $del_id;

    $connect = getDbInstance();
    $query ="DELETE FROM `room_customer` WHERE `CustomerID` = $del_id2 And`RoomID`=$del_id ";
    $result = mysqli_query($connect, $query);
    
    if ($result) 
    {
        $_SESSION['info'] = "Booking deleted successfully!";
        header('location: booking.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete booking";
    	header('location: booking.php');
        exit;

    }
    
}