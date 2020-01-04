<?php


include 'db.php';


function createForm() {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM pizza ORDER BY pizza");
    $stmt->execute();

    $s = "<div id='container'>\n";
    $s .= "<form method='post' action=''>";
    $s .= createCustomerFields();
    while( $row = $stmt->fetch(PDO::FETCH_OBJ) ) {
        $s .= "<div class='pizzaclass'>"
            . "<h2>" . $row->pizza . "</h2>"
            . "<h3>&euro;&nbsp;" . $row->prijs . "</h3>"
            . createSelect($row->id)
            . "<br>Count: <input style='text-align: right;' 
                    value='0' type='text' name='p$row->id' size='3'>"
            . "</div> <!-- einde pizza -->";
    }
    $s .= "<br class='clearfix'><input type='submit' name='btnOrder' value='Plaats uw bestelling'>";

    $s .= "</form>";
    $s .= "</div> <!-- einde container -->";
    return $s;
}


?>
<?php echo createForm(); ?>
