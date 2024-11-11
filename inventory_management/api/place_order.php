<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $product_id = $_POST['product_id'];
    $quantity_ordered = $_POST['quantity_ordered'];
    $order_date = date('Y-m-d');

    // Update product stock
    $update_stock_sql = "UPDATE products SET quantity_in_stock = quantity_in_stock - $quantity_ordered WHERE product_id = $product_id";
    $conn->query($update_stock_sql);

    

    // Insert into orders table
    $sql = "INSERT INTO orders (customer_name, product_id, quantity_ordered, order_date)
            VALUES ('$customer_name', '$product_id', '$quantity_ordered', '$order_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


