<?php
include '../config/db.php';
include 'fetch_jobs.php';
include '../functions/activity_log.php';

session_start();
if (!isset($_SESSION['candidate_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
$candidate_id = $_SESSION['candidate_id'];
$sql="SELECT u.name,c.profile_picture,c.field FROM users u INNER JOIN candidates c ON u.id=c.candidate_id WHERE u.id='$candidate_id'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Dashboard</title>
    <link rel="stylesheet" href="../public/css/candidate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        <div class="user-info">
            <img src="../uploads/images/<?php echo $row['profile_picture'] ?>" alt="User Profile" id="profile-pic">
            <h2 id="user-name"><?php echo $row['name'] ?></h2>
        </div>
        <?php $currentPage = basename($_SERVER['PHP_SELF'], ".php"); ?>
        <a href="dashboard.php" class="<?= $currentPage == 'dashboard' ? 'active' : '' ?>" data-translate="dashboard">Dashboard</a>
        <a href="applied_jobs.php" class="<?= $currentPage == 'applied_jobs' ? 'active' : '' ?>" data-translate="jobs_applied">Jobs Applied</a>
        <a href="recent_jobs.php" class="<?= $currentPage == 'recent_jobs' ? 'active' : '' ?>" data-translate="recent_jobs">Recent Jobs</a>
        <a href="view_company.php" class="<?= $currentPage == 'view_company' ? 'active' : '' ?>" data-translate="view_companies">View Companies</a>
        <a href="profile.php" class="<?= $currentPage == 'profile' ? 'active' : '' ?>" data-translate="profile">Profile</a>
        <a href="../auth/logout.php" class="logout" onclick="logout()" data-translate="logout">Logout</a>
    </div>

    <div class="main">