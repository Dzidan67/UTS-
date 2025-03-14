<?php
$servername = "localhost:3307"; // Jika MySQL berjalan di port default (3306)
$username = "root"; // Hanya "root", tanpa @localhost
$password = "";
$database = "user_management";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "Connected successfully"; // Uncomment jika ingin melihat pesan koneksi berhasil
}
?>
