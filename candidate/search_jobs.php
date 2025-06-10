<?php
include 'header.php';
$job_list = [];
$search = '';
$head='Your search results for';
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search-keyword']);

    $sql = "SELECT 
                j.id AS job_id,
                j.title,
                j.location,
                j.description,
                j.salary,
                j.type,
                j.skill,
                j.deadline,
                u.name AS company_name,
                u.email AS company_email,
                c.logo AS company_logo
            FROM jobs j
            INNER JOIN users u ON j.company_id = u.id
            INNER JOIN company c ON u.id = c.company_id
            WHERE j.status = 'approved'
              AND (j.title LIKE '%$search%' OR j.location LIKE '%$search%')
            ORDER BY j.created_at DESC";

    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $job_list[] = [
                'id' => $row['job_id'],
                'title' => $row['title'],
                'location' => $row['location'],
                'description' => $row['description'],
                'salary' => $row['salary'],
                'type' => $row['type'],
                'skill' => $row['skill'],
                'deadline' => $row['deadline'],
                'name' => $row['company_name'],
                'email' => $row['company_email'],
                'logo' => $row['company_logo'],
            ];
        }
    }
}

if (empty($job_list)) {
    $job_list = array();
    $head='No search results found for';
}
?>
<div id="search-jobs-content">
    <?php include 'search.php' ?>
    <h2 class="section-title" > <?php echo $head." ". $search ?></h2>
    <div class="job-list">
        <?php if (empty($job_list)) : ?>
            <p data-translate="no_jobs_found">No jobs found.</p>
        <?php else : ?>
            <?php foreach ($job_list as $job) : ?>
                <div class="card">
                    <div class="job-card">
                        <h3><?php echo htmlspecialchars($job['title']); ?></h3>
                        <div class="job-meta">
                            <span data-translate="company">Company:</span> <?php echo htmlspecialchars($job['name']); ?><br>
                            <span data-translate="location">Location:</span> <?php echo htmlspecialchars($job['location']); ?>
                        </div>
                        <div class="job-actions">
                            <a href="#" class="btn" data-translate="see_more">See More</a>
                            <a href="#" class="btn btn-secondary" data-translate="apply">Apply</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>
<?php include 'footer.php'; ?>