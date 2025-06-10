<?php
include '../config/db.php';
include 'load_activity_logs.php';
include '../functions/time.php';
include '../functions/fetch_jobs.php';
include '../functions/fetch_companies.php';
include '../functions/fetch_candidates.php';
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
$admin_id = $_SESSION['admin_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <button class="menu-toggle">☰</button>
    <div class="overlay"></div>
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>
    <div class="sidebar">
        <a href="dashboard.php" class="<?= $current_page == 'dashboard.php' ? 'active' : '' ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="manage_candidate.php" class="<?= $current_page == 'manage_candidate.php' ? 'active' : '' ?>"><i class="fas fa-users"></i> Manage Candidates</a>
        <a href="manage_company.php" class="<?= $current_page == 'manage_company.php' ? 'active' : '' ?>"><i class="fas fa-building"></i> Manage Companies</a>
        <a href="manage_jobs.php" class="<?= $current_page == 'manage_jobs.php' ? 'active' : '' ?>"><i class="fas fa-briefcase"></i> Manage Jobs</a>
        <a href="profile.php" class="<?= $current_page == 'profile.php' ? 'active' : '' ?>"><i class="fas fa-user"></i> Profile</a>
        <a href="../auth/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>


    <div class="main">