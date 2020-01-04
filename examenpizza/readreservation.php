
<?php



include 'db.php';

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit();
}


$sql = 'SELECT * FROM reservering';
$statement = $con->prepare($sql);
$statement->execute();
$reserveringen = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>All people</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Personen</th>
                    <th>Datum / tijd</th>
                    <th>Naam</th>
                    <th>Telefoon</th>
                    <th>Tafel </th>
                    <th>Action</th>
                </tr>
                <?php foreach($reserveringen as $reservering): ?>
                    <tr>
                        <td><?= $reservering->id; ?></td>
                        <td><?= $reservering->personen; ?></td>
                        <td><?= $reservering->datumtijd; ?></td>
                        <td><?= $reservering->naam; ?></td>
                        <td><?= $reservering->telefoon; ?></td>
                        <td><?= $reservering->tafel_id; ?></td>
                        <td>

                            <a onclick="return confirm('Are you sure you want to delete this entry?')" href="pizzadelete.php?id=<?= $reservering->id ?>" class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <a class="nav-link" href="createreservation.php">Create a reservation</a>

<?php require 'footer.php'; ?>