<?php
include 'db.php';

// Insert Customer
if (isset($_POST['add_customer'])) {
    $title = $_POST['title'];
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $contact_number = trim($_POST['contact_number']);
    $district = trim($_POST['district']);
    $errors = [];

    if (empty($first_name) || empty($last_name) || empty($contact_number) || empty($district)) {
        $errors[] = "All fields are required.";
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $first_name) || !preg_match("/^[a-zA-Z ]*$/", $last_name)) {
        $errors[] = "Only letters and white space allowed in names.";
    }

    if (!preg_match("/^[0-9]{10}$/", $contact_number)) {
        $errors[] = "Invalid contact number format.";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO customers (title, first_name, last_name, contact_number, district)
                VALUES ('$title', '$first_name', '$last_name', '$contact_number', '$district')";

        if ($conn->query($sql) === TRUE) {
            $message = "New customer created successfully";
        } else {
            $errors[] = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Fetch Customers
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

$conn->close();
?>
