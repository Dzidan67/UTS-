<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM bookings WHERE id='$id' AND user_id='{$_SESSION['user_id']}'";
    $result = $conn->query($query);
    $booking = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $travel_date = $_POST['travel_date'];
    $num_tickets = $_POST['num_tickets'];
    $total_price = $num_tickets * 100;
    
    $update_sql = "UPDATE bookings SET destination='$destination', travel_date='$travel_date', num_tickets='$num_tickets', total_price='$total_price' WHERE id='$id' AND user_id='{$_SESSION['user_id']}'";
    
    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Pesanan berhasil diperbarui!'); window.location='view_bookings.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Pesanan Tiket</h2>
        <form method="POST" class="w-50 mx-auto">
            <div class="mb-3">
                <label class="form-label">Tujuan:</label>
                <input type="text" name="destination" class="form-control" value="<?php echo $booking['destination']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Keberangkatan:</label>
                <input type="date" name="travel_date" class="form-control" value="<?php echo $booking['travel_date']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Tiket:</label>
                <input type="number" name="num_tickets" class="form-control" value="<?php echo $booking['num_tickets']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
