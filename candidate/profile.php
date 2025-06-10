<?php
include 'header.php';

$query = "SELECT u.name, u.email, c.phone, c.country, c.address, c.field, c.experience, c.education, c.gender, c.summary, c.profile_picture, c.resume 
FROM candidates c 
INNER JOIN users u ON c.candidate_id = u.id 
WHERE c.candidate_id = $candidate_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    $name = htmlspecialchars($user['name']);
    $email = htmlspecialchars($user['email']);
    $phone = htmlspecialchars($user['phone']);
    $country = htmlspecialchars($user['country']);
    $address = htmlspecialchars($user['address']);
    $field = htmlspecialchars($user['field']);
    $experience = htmlspecialchars($user['experience']);
    $education = htmlspecialchars($user['education']);
    $gender = htmlspecialchars($user['gender']);
    $summary = htmlspecialchars($user['summary']);
    $profile_picture = htmlspecialchars($user['profile_picture']);
    $resume = htmlspecialchars($user['resume']);
} else {
    die("Error: Candidate data not found.");
}
?>

<div id="profile-content">
    <h2 class="section-title" data-translate="update_profile">Update Your Profile</h2>
    <form class="card profile-form" method="post" action="update_profile.php" enctype="multipart/form-data">
        <div class="profile-picture-container">
            <img src="../uploads/images/<?php echo $profile_picture; ?>" alt="Profile Picture" class="profile-picture" id="profile-display">
            <div class="file-upload">
                <input type="file" id="profile-picture-upload" name="profile_picture" accept="image/*" onchange="previewProfilePicture(this)">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label data-translate="full_name">Full name:</label>
                <input type="text" name="full_name" value="<?php echo $name; ?>" required>
            </div>
            <div class="form-group">
                <label data-translate="email">Email:</label>
                <input type="email" name="email" value="<?php echo $email; ?>" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label data-translate="phone">Phone:</label>
                <input type="tel" name="phone" value="<?php echo $phone; ?>" required>
            </div>
            <div class="form-group">
                <label data-translate="country">Country:</label>
                <select name="country">
                    <option value="Ethiopia" <?php echo ($country === 'Ethiopia') ? 'selected' : ''; ?>>Ethiopia</option>
                    <option value="Kenya" <?php echo ($country === 'Kenya') ? 'selected' : ''; ?>>Kenya</option>
                    <option value="Other" <?php echo ($country === 'Other') ? 'selected' : ''; ?>>Other</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label data-translate="address">Address:</label>
            <input type="text" name="address" value="<?php echo $address; ?>">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label data-translate="field">Field:</label>
                <input type="text" name="field" value="<?php echo $field; ?>">
            </div>
            <div class="form-group">
                <label data-translate="experience">Years of Experience:</label>
                <select name="experience">
                    <option value="0-2 years" <?php echo ($experience === '0-2 years') ? 'selected' : ''; ?>>0-2 years</option>
                    <option value="3-5 years" <?php echo ($experience === '3-5 years') ? 'selected' : ''; ?>>3-5 years</option>
                    <option value="5+ years" <?php echo ($experience === '5+ years') ? 'selected' : ''; ?>>5+ years</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label data-translate="education">Highest Education:</label>
            <select name="education">
                <option value="High School" <?php echo ($education === 'High School') ? 'selected' : ''; ?>>High School</option>
                <option value="Bachelor's Degree" <?php echo ($education === 'Bachelor\'s Degree') ? 'selected' : ''; ?>>Bachelor's Degree</option>
                <option value="Master's Degree" <?php echo ($education === 'Master\'s Degree') ? 'selected' : ''; ?>>Master's Degree</option>
                <option value="PhD" <?php echo ($education === 'PhD') ? 'selected' : ''; ?>>PhD</option>
            </select>
        </div>

        <div class="form-group">
            <div class="radio-group">
                <label data-translate="gender">Gender:</label><br>
                <input type="radio" id="male" name="gender" value="male" <?php echo ($gender === 'male') ? 'checked' : ''; ?>>
                <label for="male" data-translate="male">Male</label>
                <input type="radio" id="female" name="gender" value="female" <?php echo ($gender === 'female') ? 'checked' : ''; ?>>
                <label for="female" data-translate="female">Female</label>
            </div>
        </div>

        <div class="form-group">
            <label data-translate="description">Professional Summary:</label>
            <textarea name="summary"><?php echo $summary; ?></textarea>
        </div>
        <div class="form-group">
            <label data-translate="resume">Current Resume:</label>
            <?php if (!empty($resume)): ?>
                <a href="../uploads/resumes/<?php echo $resume; ?>" target="_blank">View Current Resume</a>
            <?php endif; ?>
            <input type="file" name="resume">
        </div>

        <button class="btn" name="update-profile" data-translate="save_profile" type="submit">Save Profile</button>
    </form>
</div>

<?php include 'footer.php' ?>