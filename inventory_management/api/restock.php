<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];

    $quantity = $_POST['quantity'];
    $restock_date = date('Y-m-d');

    // Update product stock
    $update_stock_sql = "UPDATE products SET quantity_in_stock = quantity_in_stock + $quantity WHERE product_id = $product_id";
    $conn->query($update_stock_sql);

    // Insert into restocking table
    $sql = "INSERT INTO restocking (product_id,  quantity, restock_date) 
          VALUES ('$product_id',  '$quantity', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Product restocked successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

