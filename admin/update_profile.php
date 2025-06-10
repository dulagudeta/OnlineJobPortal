<?php
include '../config/db.php';
include '../functions/activity_log.php';
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$admin_id = $_SESSION['admin_id'];
if(isset($_POST['update-profile'])){
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$sql ="UPDATE users SET name='$name', email='$email', password='$password' WHERE id='$admin_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    log_activity($admin_id, "Updated profile information", $conn);
    header("Location: dashboard.php");
} else {
    echo "Error updating profile: " . mysqli_error($conn);
}
} else {
    echo "No file uploaded or file upload error.";
    exit();
}
?>