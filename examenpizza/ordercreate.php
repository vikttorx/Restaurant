<?php
require 'db.php';
$message = '';
if (isset ($_POST['reservering_id'])  && isset($_POST['product_id'])  ) {
    $reservering_id = $_POST['reservering_id'];
    $product_id   = $_POST['product_id'];

    $sql = 'INSERT INTO order_item(reservering_id, product_id) VALUES(:reservering_id, :product_id)';
    $statement = $con->prepare($sql);
    if ($statement->execute([':reservering_id' => $reservering_id, ':product_id' => $product_id ])) {
        $message = 'data inserted successfully';
    }
}
?>
<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Create a pizza</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success">
                        <?= $message; ?>
                    </div>
                <?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="name">reservering_id</label>
                        <input type="text" name="reservering_id" id="reservering_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">product_id</label>
                        <input type="product_id" name="product_id" id="product_id" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Create a pizza</button>
                    </div>
                </form>
            </div>
        </div>
        <a class="nav-link" href="orderread.php">Back</a>
    </div>
<?php require 'footer.php'; ?>