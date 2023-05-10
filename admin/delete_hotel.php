<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	
    $hotel_id = $del_id;

    $connect = getDbInstance();
    $query ="DELETE FROM `hotel` WHERE `HotelID` = $del_id";
    $result = mysqli_query($connect, $query);
    
    if ($result) 
    {
        $_SESSION['info'] = "Hotel deleted successfully!";
        header('location: hotel.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete hotel";
    	header('location: hotel.php');
        exit;

    }
    
}