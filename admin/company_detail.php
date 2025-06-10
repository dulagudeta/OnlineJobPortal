<?php include 'header.php'; ?>
<div class="company-header">
    <?php
    $company_id = $_GET['company_id'];

    $sql = "SELECT 
    u.id AS user_id,
    u.name AS company_name,
    u.email AS company_email,
    c.logo AS company_logo,
    c.contact,
    c.location,
    c.industry,
    c.website,
    c.description,
    c.created_at AS company_created_at,
    c.updated_at AS company_updated_at,
    u.created_at AS user_created_at
FROM users u
INNER JOIN company c ON u.id = c.company_id
WHERE u.id = '$company_id'";

    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $company_name = $row['company_name'];
            $company_email = $row['company_email'];
            $company_logo = $row['company_logo'];
            $company_contact = $row['contact'];
            $company_location = $row['location'];
            $company_industry = $row['industry'];
            $company_website = $row['website'];
            $company_description = $row['description'];
            $company_created_at = $row['company_created_at'];
            $company_updated_at = $row['company_updated_at'];
        }
    }
    ?>
    <img src="../uploads/images/<?php echo $company_logo; ?>" alt="Goh Engineering Logo" class="company-logo">
    <div class="company-info">
        <h1><?php echo $company_name; ?></h1>
        <p class="industry"><?php echo $company_industry; ?></p>
        <p class="location"><i class="fas fa-map-marker-alt"></i> <?php echo $company_location; ?></p>
    </div>
</div>

<div class="company-details">
    <div class="detail-section">
        <h2>About Us</h2>
        <p><?php echo $company_description; ?></p>
    </div>

    <div class="detail-section contact-info">
        <h2>Contact Information</h2>
        <div class="contact-item">
            <i class="fas fa-envelope"></i>
            <span><?php echo $company_email; ?></span>
        </div>
        <div class="contact-item">
            <i class="fas fa-phone"></i>
            <span><?php echo $company_contact; ?></span>
        </div>
        <div class="contact-item">
            <i class="fas fa-globe"></i>
            <span><a href="<?php echo $company_website?>" target="_blank"><?php echo $company_website?></a></span>
        </div>
        <div class="contact-item">
            <i class="fas fa-map-marker-alt"></i>
            <span>123 Tech Park, Hawassa, Ethiopia</span>
        </div>
    </div>

    <?php
    $sql = "SELECT 
    j.id AS job_id,
    j.title AS job_title,
    j.description AS job_description,
    j.location AS job_location,
    j.created_at AS job_created_at
    FROM jobs j
    WHERE j.company_id = '$company_id'";

    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $job_id = $row['job_id'];
            $job_title = $row['job_title'];
            $job_description = $row['job_description'];
            $job_location = $row['job_location'];
            $job_created_at = $row['job_created_at'];
        }
    }
    ?>
</div>

<?php include 'footer.php'; ?>