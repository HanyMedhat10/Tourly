<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	// if($_SESSION['username']!='Hany'){
	// 	$_SESSION['failure'] = "You don't have permission to perform this action";
    // 	header('location: customers.php');
    //     exit;

	// }
    $customer_id = $del_id;

    $connect = getDbInstance();
    $query ="DELETE FROM `customer` WHERE `ID` = $del_id";
    $result = mysqli_query($connect, $query);
    
    if ($result) 
    {
        $_SESSION['info'] = "Customer deleted successfully!";
        header('location: customers.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete customer";
    	header('location: customers.php');
        exit;

    }
    
}