<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	
    $room_id = $del_id;

    $connect = getDbInstance();
    $query ="DELETE FROM `room` WHERE `RoomID` = $del_id";
    $result = mysqli_query($connect, $query);
    
    if ($result) 
    {
        $_SESSION['info'] = "room deleted successfully!";
        header('location: rooms.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete room";
    	header('location: rooms.php');
        exit;

    }
    
}