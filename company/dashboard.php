<?php
include 'header.php';
include '../functions/delete_row.php';
?>

<h1 data-translate="welcome">Welcome to Your Dashboard</h1>
<div id="dashboard-content">
    <div class="section">
        <div class="card">
            <h2 data-translate="company_profile">Company Profile</h2>
            <p data-translate="profile_desc">Update your company information and manage your profile.</p>
            <a href="profile.php" data-translate="view_profile" class="view-applicants">View Profile</a>
        </div>
        <div class="card">
            <h2 data-translate="post_job">Post New Job</h2>
            <p data-translate="post_job_desc">Create and manage job listings to attract candidates.</p>
            <a href="post_job.php" data-translate="post-job_btn" class="view-applicants">Post Job</a>
        </div>
    </div>
    <div id="jobs-posted">
        <h2 data-translate="posted_jobs">Previously Posted Jobs</h2>
        <div class="job-card">
            <?php
            $job_list = fetch_jobs($conn, $company_id);
            foreach ($job_list as $job) {
                echo '<span>' . $job['title'] . ' - ' . $job['location'] . '</span>
                        <div>
                            <a href="view_applicants.php?job_id=' . $job['id'] . '" data-translate="view_applicants" class="view-applicants">View Applicants</a>
                            <a href="?job_id=' . $job['id'] . '&confirm=true" data-translate="delete-job" class="view-applicants" onclick="return confirm(\'Are you sure you want to delete this job?\')">Delete</a>
                        </div>';
                if (isset($_GET['job_id']) && isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
                    delete_job($conn, $job['id'], $company_id);
                    header("Location: " . str_replace("&confirm=true", "", $_SERVER['REQUEST_URI']));
                    exit();
                }
            }
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>