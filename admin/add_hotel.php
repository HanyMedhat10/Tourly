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
    $query = "INSERT INTO `hotel`( `name`, `address`, `NoOfRooms`, `docs`) VALUES ('".$data_to_store['name']."','".$data_to_store['address']."','".$data_to_store['NoOfRooms']."','".$data_to_store['docs']."')";
    $result = mysqli_query($connect,$query);
    // $last_id = $db->insert('customers', $data_to_store);

    if($result)
    {
    	$_SESSION['success'] = "Hotel added successfully!";
    	header('location: hotel.php');
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
            <h2 class="page-header">Add Hotel</h2>
        </div>
        
</div>
    <form class="form" action="" method="post"  id="room_form" enctype="multipart/form-data">
       <?php  include_once('./forms/hotel_form.php'); ?>
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