<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $travel_date = $_POST['travel_date'];
    $num_tickets = $_POST['num_tickets'];
    $total_price = $num_tickets * 100; // Harga contoh per tiket
    $user_id = $_SESSION['user_id'];
    
    $sql = "INSERT INTO bookings (user_id, destination, travel_date, num_tickets, total_price) VALUES ('$user_id', '$destination', '$travel_date', '$num_tickets', '$total_price')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Tiket berhasil dipesan!'); window.location='view_bookings.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pesan Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Pesan Tiket Liburan</h2>
        <form method="POST" class="w-50 mx-auto">
            <div class="mb-3">
                <label class="form-label">Tujuan:</label>
                <input type="text" name="destination" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Keberangkatan:</label>
                <input type="date" name="travel_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Tiket:</label>
                <input type="number" name="num_tickets" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Pesan</button>
        </form>
    </div>
</body>
</html>