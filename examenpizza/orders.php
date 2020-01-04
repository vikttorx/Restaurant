<?php

include 'db.php';

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit();
}


$sql = 'SELECT * FROM order_item
 JOIN pizza ON order_item.product_id = pizza.id

ORDER BY reservering_id';
$statement = $con->prepare($sql);
$statement->execute();
$order_item = $statement->fetchAll(PDO::FETCH_OBJ);


?>
<style>
    .container1{

        height:100px;
        margin: auto;
        margin-top:0px;
        width: 50%;
        padding: 10px;
    }




</style>



<?php require 'header.php'; ?>

<div class="container1">
    <div class="rooms">

        <table class="table ">
            <tr>

                <th>Reservation</th>
                <th>Product</th>
                <th>Price</th>

 <?php foreach($order_item as $order_item): ?>




        </tr>
            <tr>

        <td><?= $order_item->reservering_id; ?></td>
        <td><?= $order_item->name; ?></td>
        <td>&#8364;<?= $order_item->price; ?></td>


        </tr>

    <?php endforeach; ?>


        </table>
    </div>

</div>






