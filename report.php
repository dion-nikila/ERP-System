<?php
include 'db.php';

// Invoice Report
if (isset($_POST['invoice_report'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    if (strtotime($start_date) > strtotime($end_date)) {
        $errors[] = "Start date cannot be greater than end date.";
    }

    if (empty($errors)) {
        $sql = "SELECT * FROM invoices WHERE date BETWEEN '$start_date' AND '$end_date'";
        $result = $conn->query($sql);
    }
}

// Invoice Item Report
if (isset($_POST['invoice_item_report'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    if (strtotime($start_date) > strtotime($end_date)) {
        $errors[] = "Start date cannot be greater than end date.";
    }

    if (empty($errors)) {
        $sql = "SELECT * FROM invoice_items WHERE date BETWEEN '$start_date' AND '$end_date'";
        $result = $conn->query($sql);
    }
}

// Item Report
$sql = "SELECT * FROM items";
$result = $conn->query($sql);

$conn->close();
?>
