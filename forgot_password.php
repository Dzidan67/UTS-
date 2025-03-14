<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(50));
        $conn->query("UPDATE users SET token='$token' WHERE email='$email'");
        echo "<script>alert('Check your email to reset password.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Email not found!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <form method="POST">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
