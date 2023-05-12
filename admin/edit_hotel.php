<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';


// Sanitize if you want
$hotel_id = filter_input(INPUT_GET, 'hotel_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation'); 
($operation == 'edit') ? $edit = true : $edit = false;
 $connect = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    //Get hotel id form query string parameter.
    $hotel_id = filter_input(INPUT_GET, 'hotel_id', FILTER_VALIDATE_INT);

    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);
    
    // $data_to_update['updated_at'] = date('Y-m-d H:i:s');
    if($edit)
{
    $connect = getDbInstance();
    $query="UPDATE `hotel` SET`name`='".$data_to_update['name']."',`address`='".$data_to_update['address']."',`NoOfRooms`='".$data_to_update['NoOfRooms']."',`docs`='".$data_to_update['docs']."' WHERE `HotelID`=$hotel_id ";
    $result=mysqli_query($connect,$query);
    // $stat = $db->update('hotels', $data_to_update);
}

    if($result)
    {
        $_SESSION['success'] = "hotel updated successfully!";
        //Redirect to the listing page,
        header('location: hotel.php');
        //Important! Don't execute the rest put the exit/die. 
        exit();
    }
}


//If edit variable is set, we are performing the update operation.
if($edit)
{
    $queryEdit="SELECT * FROM `hotel` WHERE `HotelID`=$hotel_id";
    //Get data to pre-populate the form.
    $result=mysqli_query($connect,$queryEdit);
    $hotel =mysqli_fetch_array($result);
}
?>


<?php
    include_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Update hotel</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            //Include the common form for add and edit  
            include_once('./forms/hotel_form.php'); 
        ?>
    </form>
</div>




<?php include_once 'includes/footer.php'; ?>