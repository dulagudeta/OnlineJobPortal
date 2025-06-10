<?php
include '../config/db.php';
include 'fetch_jobs.php';
include '../functions/activity_log.php';
session_start();
if (!isset($_SESSION['company_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
$company_id = $_SESSION['company_id'];

$sql = "SELECT * FROM users INNER JOIN company ON users.id=company.company_id WHERE company.company_id='$company_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $location = $row['location'];
    $description = $row['description'];
    $website = $row['website'];
    $contact = $row['contact'];
    $logo = $row['logo'];
    $email = $row['email'];
    $industry = $row['industry'];
} else {
    echo "No data found for the company.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../public/css/company.css">
    <link rel="stylesheet" href="../public/css/applicants.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
</head>

<body>
    <button class="menu-toggle">☰</button>
    <div class="overlay"></div>

    <div class="language-selector1">
        <button class="language-btn active" data-lang="en">English</button>
        <button class="language-btn" data-lang="om">Afaan Oromoo</button>
        <button class="language-btn" data-lang="am">አማርኛ</button>
    </div>

    <div class="sidebar">
        <div class="company-info">
            <?php
            echo '
            <img src="../uploads/images/' . $logo . '" alt="Company Logo">
            <h2>' . $name . '</h2>';
            ?>
        </div>
        <a href="dashboard.php" onclick="showDashboard()" data-translate="home">Home</a>
        <a href="update_profile.php" onclick="showCompanyProfile()" data-translate="company_profile">Company Profile</a>
        <a href="post_job.php" onclick="showJobForm()" data-translate="post_job">Post New Job</a>
        <a href="../auth/logout.php" class="logout" onclick="logout()" data-translate="logout">Logout</a>
    </div>

    <div class="main">