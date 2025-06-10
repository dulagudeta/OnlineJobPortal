<?php include 'header.php';

$query = "SELECT j.id AS job_id,
                j.title,
                j.location,
                j.description,
                j.salary,
                j.type,
                j.skill,
                j.deadline,
                j.created_at,
                a.application_date,
                u.name AS company_name
         FROM jobs j 
         INNER JOIN users u ON j.company_id = u.id
         INNER JOIN applicants a ON j.id = a.job_id
         WHERE a.candidate_id = '" . $candidate_id . "'
         ORDER BY j.created_at DESC";

$result = mysqli_query($conn, $query);
$job_list = [];

if (mysqli_num_rows($result) > 0) {
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
            'applied_at' => $row['application_date'],
            'name' => $row['company_name'],
        ];
    }
} else {
    $job_list = []; 
}
?>

<div id="jobs-applied-content">
    <h2 class="section-title" data-translate="jobs_applied">Jobs You Applied For</h2>
    <div class="card">
        <div class="job-card">
            <?php
            if (empty($job_list)) {
                echo "<p>No jobs applied yet.</p>";
            } else {
                foreach ($job_list as $job) {
                    echo '<h3>' . htmlspecialchars($job['title']) . '</h3>
                        <div class="job-meta">
                            <p data-translate="company">Company:   <strong>' . htmlspecialchars($job['name']) . '</strong></p><br>
                            <p data-translate="location"><i class="fas fa-map-marker-alt"></i> Location:   <strong>' . htmlspecialchars($job['location']) . '</strong></p><br>
                            <p data-translate="applied_date"><i class="fas fa-alarm-clock"></i> Applied date:  <strong>' . htmlspecialchars($job['applied_at']) . '</strong></p><br>
                        </div>
                        <p>' .substr( htmlspecialchars($job['description']),0,300) . '</p>
                        <div class="job-actions">
                            <a href="job_detail.php?job_id'.$job['id'].'" class="btn" data-translate="see_more">See More</a>
                        </div>';
                }
            }
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>
