<?php
session_start();
require_once './config/config.php';
// require_once 'includes/auth_validate.php';

//Only super admin is allowed to access this page
// if ($_SESSION['admin_type'] !== 'super') {
//     // show permission denied message
//     echo 'Permission Denied';
//     exit();
// }


if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	$data_to_store = filter_input_array(INPUT_POST);
    $connect = getDbInstance();
    //Check whether the user name already exists ; 
    $query="INSERT INTO `admin`( `username`, `password`) VALUES ('".$data_to_store['username']."','".$data_to_store['password']."')";
    // $connect->where('username',$data_to_store['username']);
    // $connect->get('admin');
    $result=mysqli_query($connect,$query);
    if ($result) {
        $_SESSION['success'] = "Admin user added successfully!";
        header('location: admin_users.php');
        exit();
    }
    
}

$edit = false;


require_once 'includes/header.php';
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Add User</h2>
		</div>
	</div>
	 <?php 
    include_once('includes/flash_messages.php');
    ?>
	<form class="well form-horizontal" action=" " method="post"  id="contact_form" enctype="multipart/form-data">
		<?php include_once './forms/admin_users_form.php'; ?>
	</form>
</div>




<?php include_once 'includes/footer.php'; ?>