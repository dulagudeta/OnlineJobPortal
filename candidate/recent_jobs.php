<?php
include 'header.php';
$job_list = fetch_jobs($conn,$row['field']);
?>
<div id="recent-jobs-content">
    <h2 class="section-title" data-translate="recent_jobs">Recent Jobs</h2>
    <div class="card">
        <?php if (empty($job_list)) : ?>
            <p data-translate="no_jobs_found">No jobs found.</p>
        <?php else : ?>
            <?php foreach ($job_list as $job) : ?>
                <div class="job-card">
                    <h3><?php echo htmlspecialchars($job['title']); ?></h3>
                    <div class="job-meta">
                        <span data-translate="company">Company:</span> <?php echo htmlspecialchars($job['name']); ?><br>
                        <span data-translate="location">Location:</span> <?php echo htmlspecialchars($job['location']); ?><br>
                        <span data-translate="posted_date">Posted date:</span> <?php echo htmlspecialchars($job['created_at']); ?>
                    </div>
                    <p><?php echo substr(htmlspecialchars($job['description']),0,300)." ..."; ?></p>
                    <div class="job-actions">
                        <a href="#" class="btn" data-translate="view_details">View Details</a>
                        <a href="#" class="btn btn-secondary" data-translate="apply">Apply</a>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif; ?>
    </div>
</div>
<?php include 'footer.php' ?>