<?php
session_start();
require_once './config/config.php';
// require_once 'includes/auth_validate.php';


// Sanitize if you want
$booking_id = filter_input(INPUT_GET, 'booking_id', FILTER_VALIDATE_INT);
$_id = filter_input(INPUT_GET, '_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation'); 
($operation == 'edit') ? $edit = true : $edit = false;
 $connect = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    //Get booking id form query string parameter.
    $booking_id = filter_input(INPUT_GET, 'booking_id', FILTER_VALIDATE_INT);

    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);
    
    // $data_to_update['updated_at'] = date('Y-m-d H:i:s');
    if($edit)
{
    $connect = getDbInstance();
    $query = "UPDATE `room_customer` SET `RoomID`='".$data_to_update['RoomID']."',`CustomerID`='".$data_to_update['CustomerID']."',`checkIn`='".$data_to_update['checkIn']."',`checkOut`='".$data_to_update['checkOut']." WHERE `CustomerID`=$_id AND `RoomID`=$booking_id'";
    $result=mysqli_query($connect,$query);
    // $stat = $db->update('bookings', $data_to_update);
}

    if($result)
    {
        $_SESSION['success'] = "booking updated successfully!";
        //Redirect to the listing page,
        header('location: booking.php');
        //Important! Don't execute the rest put the exit/die. 
        exit();
    }
}


//If edit variable is set, we are performing the update operation.
if($edit)
{
    $queryEdit="SELECT * FROM `room_customer` WHERE `CustomerID`=$booking_id";
    //Get data to pre-populate the form.
    $result=mysqli_query($connect,$queryEdit);
    $booking =mysqli_fetch_array($result);
}
?>


<?php
    include_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Update Booking</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            //Include the common form for add and edit  
            include_once('./forms/booking_from.php'); 
        ?>
    </form>
</div>




<?php include_once 'includes/footer.php'; ?>