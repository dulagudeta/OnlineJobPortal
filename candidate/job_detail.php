<?php
include 'header.php';
include 'application.php';
if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];
}

$sql = "SELECT 
            j.id AS job_id,
            j.title,
            j.location,
            j.description,
            j.salary,
            j.type,
            j.skill,
            j.deadline,
            j.created_at,
            u.name AS company_name,
            u.email AS company_email,
            c.logo AS company_logo
        FROM jobs j
        INNER JOIN users u ON j.company_id = u.id
        INNER JOIN company c ON u.id = c.company_id
        WHERE j.id = $job_id";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$id=htmlspecialchars($row['job_id']);
$job_title = htmlspecialchars($row['title']);
$job_location = htmlspecialchars($row['location']);
$job_description = nl2br(htmlspecialchars($row['description']));
$job_salary = htmlspecialchars($row['salary']);
$job_type = htmlspecialchars($row['type']);
$job_skills = explode(',', $row['skill']);
$job_deadline = date('F j, Y', strtotime($row['deadline']));
$job_created_at = date('F j, Y', strtotime($row['created_at']));
$company_name = htmlspecialchars($row['company_name']);
$company_email = htmlspecialchars($row['company_email']);
$company_logo = htmlspecialchars($row['company_logo']);
$company_logo = !empty($company_logo) ? $company_logo : 'https://via.placeholder.com/60x60?text=' . urlencode(substr($company_name, 0, 3));
?>

<div class="job-header">
    <h1 class="job-title"><?= $job_title ?></h1>

    <div class="company-info">
        <img src="<?= $company_logo ?>" alt="<?= $company_name ?> Logo" class="company-logo">
        <div>
            <h3><?= $company_name ?></h3>
            <p><i class="fas fa-map-marker-alt"></i> <?= $job_location ?></p>
        </div>
    </div>
</div>

<div class="job-meta">
    <div class="meta-item">
        <span class="meta-label">Employment Type</span>
        <span><?= $job_type ?></span>
    </div>
    <div class="meta-item">
        <span class="meta-label">Salary Range</span>
        <span><?= $job_salary ?></span>
    </div>
    <div class="meta-item">
        <span class="meta-label">Application Deadline</span>
        <span><?= $job_deadline ?></span>
    </div>
    <div class="meta-item">
        <span class="meta-label">Posted Date</span>
        <span><?= $job_created_at ?></span>
    </div>
    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="meta-item">
            <span class="meta-label">Status</span>
            <span style="color: #e67e22; font-weight: 500;">Under Review</span>
        </div>
    <?php endif; ?>
</div>

<div class="detail-section">
    <h2>Job Description</h2>
    <p><?= $job_description ?></p>
</div>

<div class="detail-section">
    <h2>Required Skills & Qualifications</h2>

    <h3>Technical Skills:</h3>
    <div class="skills-list">
        <?php foreach ($job_skills as $skill): ?>
            <span class="skill-tag"><?= trim(htmlspecialchars($skill)) ?></span>
        <?php endforeach; ?>
    </div>
</div>

<div class="job-actions">
    <a href="#?<?php $id;?>" class="btn btn-secondary" data-translate="apply" id="apply">Apply</a>
    <?php application($conn,$id,$candidate_id); ?>
</div>
<?php include 'footer.php'; ?>