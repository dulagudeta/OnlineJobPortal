<?php
function application($conn, $job_id, $candidate_id)
{
    $sql = "SELECT resume FROM candidates WHERE candidate_id = '$candidate_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['apply'])) {
        $job_id = $_POST['job_id'];
        $user_id = $_POST['user_id'];
        $resume = $_POST['resume'];
        $cover_letter = $_POST['cover_letter'];

        $sql = "SELECT * FROM applicants WHERE candidate_id='$user_id' AND job_id='$job_id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>
        alert('You have already applied!');
        window.location.href='dashboard.php';
        </script>";
        } else {
            $query = "INSERT INTO applicants (job_id, candidate_id, resume, cover_letter) VALUES ('$job_id', '$user_id', '$resume', '$cover_letter')";
            if (mysqli_query($conn, $query)) {
                $activity = "Application submitted.";
                log_activity($user_id, $activity, $conn);
                echo "<script>alert('Application submitted successfully!');</script>";
            } else {
                echo "<script>alert('Error submitting application. Please try again.');</script>";
            }
        }
    }
?>
    <?php
    $sql = "SELECT * FROM jobs WHERE id = '$job_id'";
    $result = mysqli_query($conn, $sql);
    $job = mysqli_fetch_assoc($result);
    ?>
    <div class="application-form">
        <form action="" method="POST" onsubmit="return showConfirmation()">
            <h3>Apply for <?php echo $job['title'] ?></h3>
            <input type="hidden" name='user_id' value="<?php echo $candidate_id ?>">
            <input type="hidden" name="job_id" value="<?php echo $job['id'] ?>">
            <input type="hidden" name="resume" value="<?php echo $row['resume'] ?>">
            <label for="cover_letter">Write a cover letter for your application</label>
            <textarea name="cover_letter" id="cover_letter" required></textarea>
            <button type="submit" name="apply">Submit Application</button>
        </form>
        <div class="confirmation" id="confirmation">Application submitted successfully!</div>
    </div>

<?php
}
?>