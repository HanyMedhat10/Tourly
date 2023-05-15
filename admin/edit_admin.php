<?php
session_start();
require_once './config/config.php';
// require_once 'includes/auth_validate.php';

//User ID for which we are performing operation
$admin_user_id = filter_input(INPUT_GET, 'admin_user_id');
$operation = filter_input(INPUT_GET, 'operation');
($operation == 'edit') ? $edit = true : $edit = false;
//Serve POST request.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// If non-super user accesses this script via url. Stop the exexution
	// if ($_SESSION['admin_type'] !== 'super') {
	// 	// show permission denied message
	// 	echo 'Permission Denied';
	// 	exit();
	// }

	// Sanitize input post if we want
	$data_to_update = filter_input_array(INPUT_POST);
	//Check whether the user name already exists ;
	$connect = getDbInstance();
	$query ="UPDATE `admin` SET `username`='".$data_to_update['username']."',`password`='".$data_to_update['password']."' WHERE `ID`=$admin_user_id";
	$result = mysqli_query($connect,$query);
	// $db->where('username', $data_to_update['username']);
	// $db->where('id', $admin_user_id, '!=');
	//print_r($data_to_update['username']);die();
	// $row = $db->getOne('admin_accounts');

	//print_r($data_to_update['username']);
	//print_r($row); die();

    if($result)
    {
        $_SESSION['success'] = "Admin updated successfully!";
        //Redirect to the listing page,
        header('location:admin_users.php');
        //Important! Don't execute the rest put the exit/die. 
        exit();
    }
}


//If edit variable is set, we are performing the update operation.
if($edit)
{
	$connect = getDbInstance();
    $queryEdit="SELECT * FROM `admin` WHERE `ID`=$admin_user_id";
    //Get data to pre-populate the form.
    $result=mysqli_query($connect,$queryEdit);
    $admin_account =mysqli_fetch_array($result);
}

//Select where clause
// $db = getDbInstance();
// $db->where('id', $admin_user_id);

// $admin_account = $db->getOne("admin");

// Set values to $row

// import header
require_once 'includes/header.php';
?>
<div id="page-wrapper">

    <div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Update User</h2>
        </div>

    </div>
    <?php include_once 'includes/flash_messages.php';?>
    <form class="well form-horizontal" action="" method="post"  id="contact_form" enctype="multipart/form-data">
        <?php include_once './forms/admin_users_form.php';?>
    </form>
</div>




<?php include_once 'includes/footer.php';?>