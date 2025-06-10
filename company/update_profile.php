<?php
include 'header.php';
if (isset($_POST['update'])) {
    if (isset($_FILES['logo'])) {
        $target_dir = "../uploads/images/";
        $file = basename($_FILES['logo']['name']);
        $target_file = $target_dir . $file;
        if (!move_uploaded_file($_FILES['logo']['tmp_name'], $target_file)) {
            echo "Can't upload file";
        }
    }
    $location    = mysqli_real_escape_string($conn, $_POST['location']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $website     = mysqli_real_escape_string($conn, $_POST['website']);
    $phone       = mysqli_real_escape_string($conn, $_POST['contact']);
    $industry    = mysqli_real_escape_string($conn, $_POST['industry']);



    $query = "UPDATE company SET logo='$file', location='$location', description='$description', website='$website', contact='$phone', industry='$industry' WHERE company_id='$company_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $activity = "Updated company profile";
        log_activity($company_id, $activity, $conn);
        echo "<script>
            alert('Profile updated successfully');
            window.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "<script>alert('Failed to update profile');</script>";
    }
}
?>
<div id="company-profile-section">
    <form class="profile-info" method="post" action="update_profile.php" enctype="multipart/form-data">
        <h2 data-translate="edit_profile">Edit Company Profile</h2>
        <label data-translate="company_name">Company Name:</label>
        <input type="text" value="<?php echo $name; ?>" disabled>
        <label data-translate="contact_email">Contact Email:</label>
        <input type="email" value="<?php echo $email; ?>" disabled>
        <label data-translate="phone_number">Phone Number:</label>
        <input type="text" value="<?php echo $contact; ?>" name="contact">
        <label data-translate="location">Location:</label>
        <input type="text" value="<?php echo $location; ?>" name="location">
        <label data-translate="company_website">Company Website:</label>
        <input type="text" value="<?php echo $website; ?>" name="website">
        <label data-translate="industry">Industry:</label>
        <input type="text" value="<?php echo $industry; ?>" name="industry">
        <label data-translate="upload_logo">Upload Logo:</label>
        <input type="file" name="logo">
        <label data-translate="company_description">Company Description:</label>
        <textarea name="description"><?php echo $description; ?></textarea>
        <button data-translate="save_changes" name="update">Save Changes</button>
    </form>
</div>

<?php include 'footer.php'?>