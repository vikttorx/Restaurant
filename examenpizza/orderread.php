
<?php



include 'db.php';

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit();
}


$sql = 'SELECT * FROM order_item';
$statement = $con->prepare($sql);
$statement->execute();
$order_item = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>All Orders</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Reservering</th>
                    <th>Product</th>


                </tr>
                <?php foreach($order_item as $order_item): ?>
                    <tr>
                        <td><?= $order_item->id; ?></td>
                        <td><?= $order_item->reservering_id; ?></td>
                        <td><?= $order_item->product_id; ?></td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <a class="nav-link" href="ordercreate.php">Create a Order</a>
<?php require 'footer.php'; ?>