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
<style>
    .container1{

        height:100px;
        margin: auto;
        margin-top:0px;
        width: 50%;
        padding: 10px;
    }
    .rooms{
        height:40px;
        margin: auto;
        margin-top:30px;
        width: 760px;
        padding: 10px;
        background-color:lightblue;
        box-shadow: 0px 6px 5px gray;
    }


</style>






 <?php foreach($order_item as $order_item): ?>
<div class="container1">
    <div class="rooms">
        <td><?= $order_item->id; ?></td>
        <td><?= $order_item->reservering_id; ?></td>
        <td><?= $order_item->product_id; ?></td>
    </div>

</div>
    <?php endforeach; ?>


<a class="nav-link" href="home.php">Back</a>






