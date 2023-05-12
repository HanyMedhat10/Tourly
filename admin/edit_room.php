<?php
session_start();
require_once './config/config.php';
// require_once 'includes/auth_validate.php';


// Sanitize if you want
$room_id = filter_input(INPUT_GET, 'room_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation'); 
($operation == 'edit') ? $edit = true : $edit = false;
 $connect = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    //Get room id form query string parameter.
    $room_id = filter_input(INPUT_GET, 'room_id', FILTER_VALIDATE_INT);

    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);
    
    // $data_to_update['updated_at'] = date('Y-m-d H:i:s');
    if($edit)
{
    $connect = getDbInstance();
    $query="UPDATE `room` SET`NoOfBeds`='".$data_to_update['NoOfBeds']."',`price`='".$data_to_update['price']."',`typeRoom`='".$data_to_update['typeRoom']."',`NoOfBeds`='".$data_to_update['NoOfBeds']."' WHERE `RoomID`=$room_id ";
    $result=mysqli_query($connect,$query);
    // $stat = $db->update('rooms', $data_to_update);
}

    if($result)
    {
        $_SESSION['success'] = "room updated successfully!";
        //Redirect to the listing page,
        header('location: rooms.php');
        //Important! Don't execute the rest put the exit/die. 
        exit();
    }
}


//If edit variable is set, we are performing the update operation.
if($edit)
{
    $queryEdit="SELECT * FROM `room` WHERE `RoomID`=$room_id";
    //Get data to pre-populate the form.
    $result=mysqli_query($connect,$queryEdit);
    $room =mysqli_fetch_array($result);
}
?>


<?php
    include_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Update room</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            //Include the common form for add and edit  
            include_once('./forms/room_form.php'); 
        ?>
    </form>
</div>




<?php include_once 'includes/footer.php'; ?>