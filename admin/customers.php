<?php
session_start();
require_once 'config/config.php';

// Costumers class
require_once BASE_PATH . '/lib/Costumers/Costumers.php';
$costumers = new Costumers();

// Get Input data from query string
$search_string = filter_input(INPUT_GET, 'search_string');
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');

// Per page limit for pagination.
$pageLimit = 15;

// Get current page.
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
    $page = 1;
}

// If filter types are not selected we show latest added data first
if (!$filter_col) {
    $filter_col = 'ID';
}
if (!$order_by) {
    $order_by = 'Desc';
}
function paginationLinks($current_page, $total_pages, $base_url)
{

    if ($total_pages <= 1) {
        return false;
    }
}
//Get DB instance. i.e instance of MYSQLiDB Library
$connect = getDbInstance();
$query = 'SELECT `ID`, `username`, `email`, `phone`, `NoOfGuest` FROM `customer`  ';
$result = mysqli_query($connect, $query);
//Start building query according to input parameters.
// If search string
if ($search_string) {
    // search string name
    $searchQ = "SELECT `ID`, `username`, `email`, `phone`, `NoOfGuest` FROM `customer` WHERE `username` LIKE '$search_string%'";
    $result = mysqli_query($connect, $searchQ);

    // $db->orwhere('l_name', '%' . $search_string . '%', 'like');
}

// If order by option selected
if ($order_by) {
    $orderQ = "SELECT `ID`, `username`, `email`, `phone`, `NoOfGuest` FROM `customer` ORDER BY $filter_col $order_by";
    $result = mysqli_query($connect, $orderQ);
}

// Set pagination limit
// $db->pageLimit = $pagelimit;

// Get result of the query.
$noRows = mysqli_num_rows($result);
$rows = $result;
$total_pages = $noRows / $pageLimit;

include BASE_PATH . '/includes/header.php';
?>
<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Customers</h1>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
                <a href="add_customer.php?operation=create" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add new</a>
            </div>
        </div>
    </div>
    <?php include BASE_PATH . '/includes/flash_messages.php'; ?>

    <!-- Filters -->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search">Search</label>
            <input type="text" class="form-control" id="input_search" name="search_string">
            <label for="input_order">Order By</label>
            <select name="filter_col" class="form-control">
                <?php
                foreach ($costumers->setOrderingValues() as $opt_value => $opt_name) : ($order_by === $opt_value) ? $selected = 'selected' : $selected = '';
                    echo ' <option value="' . $opt_value . '" ' . $selected . '>' . $opt_name . '</option>';
                endforeach;
                ?>
            </select>
            <select name="order_by" class="form-control" id="input_order">
                <option value="Asc" <?php
                                    if ($order_by == 'Asc') {
                                        echo 'selected';
                                    }
                                    ?>>Asc</option>
                <option value="Desc" <?php
                                        if ($order_by == 'Desc') {
                                            echo 'selected';
                                        }
                                        ?>>Desc</option>
            </select>
            <input type="submit" value="Go" class="btn btn-primary">
        </form>
    </div>
    <hr>
    <div id="export-section">
        <a href="export_customers.php"><button class="btn btn-sm btn-primary">Export to CSV <i class="glyphicon glyphicon-export"></i></button></a>
    </div>
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="45%">Name</th>
                <th width="20%">Email</th>
                <th width="20%">Phone</th>
                <th width="10%">NO Of Guest</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['NoOfGuest']; ?></td>
                    <td>
                        <a href="edit_customer.php?customer_id=<?php echo $row['ID']; ?>&operation=edit"
                         class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="#" class="btn btn-danger delete_btn" data-toggle="modal"
                         data-target="#confirm-delete-<?php echo $row['ID']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                <div class="modal fade" id="confirm-delete-<?php echo $row['ID']; ?>" role="dialog">
                    <div class="modal-dialog">
                        <form action="delete_customer.php" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Confirm</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="del_id" id="del_id" value="<?php echo $row['ID']; ?>">
                                    <p>Are you sure you want to delete this row?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default pull-left">Yes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- //Delete Confirmation Modal -->
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- //Table -->

    <!-- Pagination -->
    <div class="text-center">
        <?php echo paginationLinks($page, $total_pages, 'customers.php'); ?>
    </div>
    <!-- //Pagination -->
</div>
<!-- //Main container -->
<?php include BASE_PATH . '/includes/footer.php'; ?>