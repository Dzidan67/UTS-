<?php
session_start();
session_destroy();
header("Location: index.php");
exit();
?>

-- verify.php
<?php
include 'config.php';
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "UPDATE users SET is_verified=1 WHERE token='$token'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Email verified! You can now log in.'); window.location='login.php';</script>";
    } else {
        echo "Error verifying email.";
    }
}
?>