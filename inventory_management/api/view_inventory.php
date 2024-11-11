<?php
include 'db.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Product ID</th><th>Name</th><th>Description</th><th>Price</th><th>Quantity In Stock</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["product_id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["description"] . "</td><td>" . $row["price"] . "</td><td>" . $row["quantity_in_stock"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>



