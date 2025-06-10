<?php
include '../config/db.php';
include '../functions/activity_log.php';
session_start();
if (!isset($_SESSION['candidate_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
$candidate_id = $_SESSION['candidate_id'];

if (isset($_POST['update-profile'])) {
    $phone       = mysqli_real_escape_string($conn, $_POST['phone']);
    $country     = mysqli_real_escape_string($conn, $_POST['country']);
    $address     = mysqli_real_escape_string($conn, $_POST['address']);
    $field       = mysqli_real_escape_string($conn, $_POST['field']);
    $experience  = mysqli_real_escape_string($conn, $_POST['experience']);
    $education   = mysqli_real_escape_string($conn, $_POST['education']);
    $gender      = mysqli_real_escape_string($conn, $_POST['gender']);
    $summary     = mysqli_real_escape_string($conn, $_POST['summary']);
    

    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $target_dir = "../uploads/images/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);
        $profile_picture = basename($_FILES["profile_picture"]["name"]);
    } else {
        $profile_picture = null; 
    }

    if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {
        $target_dir = "../uploads/resumes/";
        $target_file = $target_dir . basename($_FILES["resume"]["name"]);
        move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file);
        $resume = basename($_FILES["resume"]["name"]);
    } else {
        $resume = null; 
    }

    $sql = "UPDATE candidates SET phone = '$phone', country = '$country',address = '$address',field = '$field',experience = '$experience',education = '$education',gender = '$gender',summary = '$summary',resume='$resume',profile_picture='$profile_picture' WHERE candidate_id = '$candidate_id'";
    if (mysqli_query($conn, $sql)) {
        $activity = "Updated profile information.";
        log_activity($candidate_id, $activity, $conn);
        echo "<script>
        alert('Profile updated successfully!');
        window.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "<script>alert('Error updating profile: " . mysqli_error($conn) . "');</script>";
    }
}
