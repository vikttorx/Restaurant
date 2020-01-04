<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM pizza WHERE id=:id';
$statement = $con->prepare($sql);
$statement->execute([':id' => $id ]);
$pizza = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['type']) ) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $sql = 'UPDATE pizza SET name=:name, price=:price, description=:description, type=:type WHERE id=:id';
    $statement = $con->prepare($sql);
    if ($statement->execute([':name' => $name, ':price' => $price, ':description' => $description,  ':type' => $type, ':id' => $id])) {
        header("Location: pizzaread.php");
    }
}
?>
<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Update Pizza</h2>
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
                        <input value="<?= $pizza->name; ?>" type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="price" value="<?= $pizza->price; ?>" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="description" value="<?= $pizza->description; ?>" name="description" id="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="type" value="<?= $pizza->type; ?>" name="type" id="type" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Update pizza</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>