<?php
session_start();
require_once './config/config.php';
// require_once './includes/auth_validate.php';


//serve POST method, After successful insert, redirect to customers.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_store = array_filter($_POST);

    //Insert timestamp
    //$data_to_store['created_at'] = date('Y-m-d H:i:s');
    $connect = getDbInstance();
    $query = "INSERT INTO `room_customer`(`RoomID`, `CustomerID`, `checkIn`, `checkOut`) VALUES ('".$data_to_store['RoomID']."','".$data_to_store['CustomerID']."','".$data_to_store['checkIn']."','".$data_to_store['checkOut']."')";
    $result = mysqli_query($connect,$query);
    // $last_id = $db->insert('customers', $data_to_store);

    if($result)
    {
    	$_SESSION['success'] = "Booking added successfully!";
    	header('location: booking.php');
    	exit();
    }
    else
    {
        // echo 'insert failed: ' . $db->getLastError();
        exit();
    }
}

//We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;

require_once 'includes/header.php'; 
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Add Booking</h2>
        </div>
        
</div>
    <form class="form" action="" method="post"  id="contact_form" enctype="multipart/form-data">
       <?php  include_once('./forms/booking_from.php'); ?>
    </form>
</div>


<!-- <script type="text/javascript">
$(document).ready(function(){
   $("#customer_form").validate({
       rules: {
            username: {
                required: true,
                minlength: 3
            },
        }
    });
});
</script> -->

<?php include_once 'includes/footer.php'; ?>