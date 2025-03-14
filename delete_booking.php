<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM bookings WHERE id='$id' AND user_id='{$_SESSION['user_id']}'";
    
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Pesanan berhasil dihapus!'); window.location='view_bookings.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
