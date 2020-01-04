<?php
require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['price']) && isset($_POST['description'])  && isset($_POST['type']) ) {
    $name = $_POST['name'];
    $price   = $_POST['price'];
    $description   = $_POST['description'];
    $type   = $_POST['type'];
    $sql = 'INSERT INTO pizza(name, price, description, type) VALUES(:name, :price, :description, :type)';
    $statement = $con->prepare($sql);
    if ($statement->execute([':name' => $name, ':price' => $price , ':description' => $description , ':type' => $type])) {
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
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="price" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="type" name="type" id="type" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="description" name="description" id="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Create a pizza</button>
                    </div>
                </form>
            </div>
        </div>
        <a class="nav-link" href="pizzaread.php">Back</a>
    </div>
<?php require 'footer.php'; ?>