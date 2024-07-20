<?php
include 'db.php';

// Insert Item
if (isset($_POST['add_item'])) {
    $item_code = trim($_POST['item_code']);
    $item_name = trim($_POST['item_name']);
    $item_category = trim($_POST['item_category']);
    $item_sub_category = trim($_POST['item_sub_category']);
    $quantity = intval(trim($_POST['quantity']));
    $unit_price = floatval(trim($_POST['unit_price']));
    $errors = [];

    if (empty($item_code) || empty($item_name) || empty($item_category) || empty($item_sub_category) || $quantity <= 0 || $unit_price <= 0) {
        $errors[] = "All fields are required and must be valid.";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO items (item_code, item_name, item_category, item_sub_category, quantity, unit_price)
                VALUES ('$item_code', '$item_name', '$item_category', '$item_sub_category', '$quantity', '$unit_price')";

        if ($conn->query($sql) === TRUE) {
            $message = "New item created successfully";
        } else {
            $errors[] = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Fetch Items
$sql = "SELECT * FROM items";
$result = $conn->query($sql);

$conn->close();
?>
