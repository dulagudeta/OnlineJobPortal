<?php
include 'header.php';

$is_verified = false;
$parts = explode('@', $email);
$domain = strtolower($parts[1]);
$domain_name = preg_replace('/^www\./', '', $website);

if ($domain == $domain_name) {
    $is_verified = true;
}
if (isset($_POST['post-job'])) {
    $title            = mysqli_real_escape_string($conn, $_POST['job_title']);
    $location         = mysqli_real_escape_string($conn, $_POST['location']);
    $description      = mysqli_real_escape_string($conn, $_POST['description']);
    $salary           = mysqli_real_escape_string($conn, $_POST['salary']);
    $employment_type  = mysqli_real_escape_string($conn, $_POST['employment_type']);
    $skill            = mysqli_real_escape_string($conn, $_POST['skill']);
    $deadline         = mysqli_real_escape_string($conn, $_POST['deadline']);
    if ($deadline < date('Y-m-d')) {
        $status = 'rejected';
    } elseif ($is_verified == false || substr($description, 0, 50) || preg_match('/https?:\/\/[^\s]+/', $description)) {
        $status = 'pending';
    } else {
        $status = 'approved';
    }
    $query = "INSERT INTO jobs (title,location,description,salary,type,skill,deadline,company_id,status) VALUES ('$title','$location','$description','$salary','$employment_type','$skill','$deadline','$company_id','$status')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $activity = "Posted a job with title: $title";
        log_activity($company_id, $activity, $conn);
        echo "<script>
            alert('Job posted successfully');
            window.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "<script>alert('Failed to post job');</script>";
    }
}
?>

<div id="form-container">
    <form method="post" action="post_job.php" enctype="multipart/form-data">
        <h2 data-translate="post_job">Post a New Job</h2>
        <label data-translate="job_title">Job Title:</label>
        <input type="text" placeholder="e.g., Software Developer" name="job_title">
        <label data-translate="location">Location:</label>
        <input type="text" placeholder="e.g., Addis Ababa" name="location">
        <label data-translate="salary">Salary:</label>
        <input type="text" placeholder="e.g., 15000" name="salary">
        <label data-translate="employment_type">Employment Type:</label>
        <select name="employment_type" required>
            <option value="">-- Select Employment Type --</option>
            <option data-translate="full_time" value="full-time">Full-time</option>
            <option data-translate="part_time" value="part-time">Part-time</option>
            <option data-translate="freelance" value="freelance">Freelance</option>
        </select>
        <label data-translate="required_skills">Required Skills:</label>
        <input type="text" placeholder="e.g., Python, JavaScript" name="skill">
        <label data-translate="job_description">Job Description:</label>
        <div id="quill-editor" style="height: 300px;"></div>
        <input type="hidden" name="description" id="job-description">
        <label data-translate="application_deadline">Application Deadline:</label>
        <input type="date" name="deadline">
        <button data-translate="post_job_btn" name="post-job">Post Job</button>
    </form>
</div>
<script>
    var quill = new Quill('#quill-editor', {
        theme: 'snow',
        placeholder: 'e.g., Looking for a skilled developer...',
        modules: {
            toolbar: [
                [{
                    header: [1, 2, 3, false]
                }],
                ['bold', 'italic', 'underline'],
                [{
                    list: 'ordered'
                }, {
                    list: 'bullet'
                }],
                ['link', 'code-block'],
                ['clean']
            ]
        }
    });

    document.querySelector('form').addEventListener('submit', function() {
        var html = quill.root.innerHTML;
        document.getElementById('job-description').value = html;
    });
</script>
<?php include 'footer.php'; ?>