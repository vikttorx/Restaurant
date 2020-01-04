<?php
require 'db.php';

$pizzas = $con->prepare("SELECT * FROM pizza");
$pizzas->execute();
$pizzas = $pizzas->fetchAll(PDO::FETCH_ASSOC);

$reserveringen = $con->prepare("SELECT * FROM reservering");
$reserveringen->execute();
$reserveringen = $reserveringen->fetchAll(PDO::FETCH_ASSOC);



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
                <h2>Create a order</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success">
                        <?= $message; ?>
                    </div>
                <?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="name">reserveringen</label>
                        <select name="reservering_id">
                            <?php

                            foreach($reserveringen as $reservering)
                            {
                                echo "<option value=\"{$reservering['id']}\">{$reservering['id']} ({$reservering['naam']})</option>";
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product">producten</label>
                        <select name="product_id">
                            <?php

                            foreach($pizzas as $pizza)
                            {
                                echo "<option value=\"{$pizza['id']}\">{$pizza['name']} ({$pizza['price']})</option>";
                            }
                            
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Create a order</button>
                    </div>
                </form>
            </div>
        </div>
        <a class="nav-link" href="orderread.php">Back</a>
    </div>
<?php require 'footer.php'; ?>